<?php

namespace App\Http\Controllers;

use App\Models\Jenispaket;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class JenisPaketController extends Controller
{
    public function view_jenis_paket(){
        $jenis_pakets = Jenispaket::all();

        return view('dashboard.admin.jenis_paket.jenis_paket_manu',compact('jenis_pakets'));
    }

    public function view_input_jenis_paket(){


        return view('dashboard.admin.jenis_paket.input_jenis_paket');
    }

    public function tambah_jenis_paket(Request $request){
        $validatedData = $request->validate([
            'nama_jenis' => 'required|string|max:255', // Nama jenis harus ada dan berupa string
            'waktu_pengerjaan' => 'required|integer|min:1', // Waktu pengerjaan minimal 1 (misal jam)
            'potongan_harga' => 'required|nullable|numeric|min:0', // Potongan harga boleh kosong, tetapi jika diisi harus angka >= 0
            'biaya_tambahan' => 'required|nullable|numeric|min:0', // Biaya tambahan boleh kosong, tetapi jika diisi harus angka >= 0
        ], [
            'nama_jenis.required' => 'Nama jenis paket harus diisi.',
            'nama_jenis.string' => 'Nama jenis paket harus berupa teks.',
            'nama_jenis.max' => 'Nama jenis paket maksimal 255 karakter.',
            'waktu_pengerjaan.required' => 'Waktu pengerjaan harus diisi.',
            'waktu_pengerjaan.integer' => 'Waktu pengerjaan harus berupa angka.',
            'waktu_pengerjaan.min' => 'Waktu pengerjaan minimal 1.',
            'potongan_harga.numeric' => 'Potongan harga harus berupa angka.',
            'potongan_harga.required' => 'Potongan harga harus diisi.',
            'biaya_tambahan.required' => 'Potongan harga harus diisi.',
            'potongan_harga.min' => 'Potongan harga tidak boleh kurang dari 0.',
            'biaya_tambahan.numeric' => 'Biaya tambahan harus berupa angka.',
            'biaya_tambahan.min' => 'Biaya tambahan tidak boleh kurang dari 0.',
        ]);


        $jenis_paket = new Jenispaket();

        $jenis_paket->nama_jenis = $request->nama_jenis;
        $jenis_paket->waktu_pengerjaan = $request->waktu_pengerjaan;
        $jenis_paket->potongan_harga = $request->potongan_harga;
        $jenis_paket->biaya_tambahan = $request->biaya_tambahan;
        $jenis_paket->save();

        return redirect('/dashboard/admin/jenis-paket');
    }

    public function view_update_jenis_paket($id){
        $jenis_paket = Jenispaket::find($id);

        return view('dashboard.admin.jenis_paket.update_jenis_paket', compact('jenis_paket'));
    }

    public function update_jenis_paket(Request $request,$id){
        $jenis_paket = Jenispaket::find($id);

        $jenis_paket->nama_jenis = $request->nama_jenis;
        $jenis_paket->waktu_pengerjaan = $request->waktu_pengerjaan;
        $jenis_paket->potongan_harga = $request->potongan_harga;
        $jenis_paket->biaya_tambahan = $request->biaya_tambahan;
        $jenis_paket->update();

        return redirect('/dashboard/admin/jenis-paket');
    }

    public function delete_jenis_paket(Request $request,$id){
        $jenis_paket = Jenispaket::find($id);

        $jenis_paket->delete();

        return redirect('/dashboard/admin/jenis-paket');
    }

    public function download_jenis_paket_pdf(){
        // $pdf = Pdf::loadView('dashboard.admin.laporan.laporan_pdf',compact('pesanans'));
        // $pdf->setPaper('A4','potrait');
        // return $pdf->stream('pesanan.pdf');
        $jenis_pakets = Jenispaket::all();
        $pdf = Pdf::loadView('dashboard.admin.jenis_paket.jenis_paket_pdf',compact('jenis_pakets'));
         return $pdf->stream('jenisPaket.pdf');
    }

    public function search_jenis_paket(Request $request){
        $jenis_pakets= Jenispaket::query();

        if ($request->has('search')) {
            $jenis_pakets->where('nama_jenis', 'LIKE', '%' . $request->search . '%');
        }

        $jenis_pakets = $jenis_pakets->get();

        // dd($jenis_paket)

        return view('dashboard.admin.jenis_paket.jenis_paket_manu',compact('jenis_pakets'));


    }




}
