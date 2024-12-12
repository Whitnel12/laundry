<?php

namespace App\Http\Controllers;

use App\Models\Saran;
use Illuminate\Http\Request;

class controller_saran_masukan extends Controller
{
    public function view_saran_masukan(){
        return view('dashboard.pelanggan.saran_masukan');
    }

    public function tambah_saran_masukan(Request $request){
        $user = auth()->user();

        $request->validate([
            'jenis' => 'required|',
            'isi' => 'required',
        ],[
            'jenis.required' => 'silahkan pilih jenis saran',
            'isi.required' => 'silahkan masukkan saran anda'
        ]);

        $saran = new Saran();

        $saran->nama_pelanggan = $user->name;
        $saran->jenis = $request->jenis;
        $saran->isi = $request->isi;
        $saran->save();
        

        return redirect()->back()->with('success', 'Terima Kasih atas kepeduliannya!, Saran atau Masukan Anda telah terkirim!');

    }

    public function view_hasil_saran_masukan(){
        $pesans = Saran::all();

        return view('dashboard.pimpinan.pimpinan_saran_masukan',compact('pesans'));
    }

    public function delete_hasil_saran_masukan($id){
        $pesan = Saran::find($id);
        $pesan->delete();

        return redirect()->back();

    }
}