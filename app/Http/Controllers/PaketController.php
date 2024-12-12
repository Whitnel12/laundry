<?php

namespace App\Http\Controllers;

use App\Models\Jenispaket;
use App\Models\Paket;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PaketController extends Controller
{

    public function view_paket(){
        $pakets = Paket::all();
        $jenis_paket = Jenispaket::with('paket')->get();


        return view('dashboard.admin.paket.paket_menu', compact('pakets','jenis_paket'));
    }

    public function view_input_paket(){
        $jenis_pakets = Jenispaket::all();

        return view('dashboard.admin.input.input_paket',compact('jenis_pakets'));
    }

    public function tambah_paket(Request $request){

        $request->validate([
            'tipe' => 'required',
        ],[
            'tipe.required'=> 'Inputan tidak boleh kosong'
        ]);

        $pakets = new Paket();

        $pakets->nama_paket = $request->nama_paket;
        $pakets->harga_paket = $request->harga_paket;
        $pakets->jenis_paket_id = $request->jenis_paket_id;
        $pakets->total_harga_paket = $request->total_harga_paket;
        $pakets->tipe = $request->tipe;
        $pakets->save();

        return redirect('/dashboard/admin/paket');
    }

    public function view_update_paket($id) {


        $paket = Paket::find($id);
        $Allpakets = Paket::all();
        $jenis_pakets = Jenispaket::all();

        return view('dashboard.admin.paket.update_paket',compact('paket','jenis_pakets'));
    }

    public function update_paket(Request $request, $id){
        $request->validate([
            'tipe' => 'required',
        ],[
            'tipe.required'=> 'Inputan tidak boleh kosong'
        ]);


        $paket = Paket::find($id);

        $paket->nama_paket = $request->nama_paket;
        $paket->harga_paket = $request->harga_paket;
        $paket->jenis_paket_id = $request->jenis_paket_id;
        $paket->total_harga_paket = $request->total_harga_paket;
        $paket->tipe = $request->tipe;
        $paket->update();

        return redirect('/dashboard/admin/paket');
    }

    public function delete_paket($id) {
        $paket = Paket::find($id);
        $paket->delete();
        return redirect('/dashboard/admin/paket');
    }

    // public function search_paket(Request $request){
    //     // $jenis_paket = Jenispaket::all();

    //     if($request->has('search')){
    //         $pakets = Paket::where('nama_paket','LIKE','%'.$request->search.'%')->get();
    //     }else{
    //         $pakets = Paket::all();
    //     }

    //     return view('dashboard.admin.paket.paket_menu',compact('pakets'));
    // }


    public function search_paket(Request $request){
    $jenis_paket = Jenispaket::with(['paket' => function ($query) use ($request) {
        if ($request->has('search')) {
            $query->where('nama_paket', 'LIKE', '%' . $request->search . '%');
        }
    }])->get();

    return view('dashboard.admin.paket.paket_menu', compact('jenis_paket'));
    }

    public function search_paket_pelanggan(Request $request){
    $jenis_paket = Jenispaket::with(['paket' => function ($query) use ($request) {
        if ($request->has('search')) {
            $query->where('nama_paket', 'LIKE', '%' . $request->search . '%');
        }
    }])->get();

    return view('dashboard.pelanggan.paket_pelanggan', compact('jenis_paket'));
    }

    public function download_paket_pdf(){
        $jenis_paket = JenisPaket::with('paket.jenispaket')->get();  // Sesuaikan query
        $pdf = Pdf::loadView('dashboard.admin.paket.paket_pdf', compact('jenis_paket'))->setPaper('a4', 'landscape');

        return $pdf->download('laporan_paket_laundry.pdf');
    }

    public function paket_pelanggan(){
        $pakets = Paket::all();
        $jenis_paket = Jenispaket::with('paket')->get();

        return view('dashboard.pelanggan.paket_pelanggan', compact('pakets','jenis_paket'));
    }

}
