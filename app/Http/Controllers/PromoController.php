<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function view_promo(){
        $promos = Promo::all();

        return view('dashboard.admin.diskon.diskon_menu',compact('promos'));
    }

    public function view_input_promo(){
        return view('dashboard.admin.diskon.input_diskon');
    }

    public function tambah_promo(Request $request){

        $request->validate([
            'nama_promo' => 'required',
            'jenis_promo' => 'required',
            'nilai_promo' => 'required',
            'status' => 'required',
        ],[
            'nama_promo.required' => 'silahkan masukan nama promo',
            'jenis_promo.required' => 'silahkan masukan jenis promo',
            'nilai_promo.required' => 'silahkan masukan nilai promo',
            'status.required' => 'silahkan masukan status   '
        ]);

        $promos = new Promo();

        $promos->nama_promo = $request->nama_promo;
        $promos->jenis_promo = $request->jenis_promo;
        $promos->nilai_promo = $request->nilai_promo;
        $promos->status = $request->status;
        $promos->save();

        return redirect('/dashboard/admin/daftar-diskon');
    }

    public function view_update_promo($id){
        $promo = Promo::find($id);
        $promos = Promo::all();

        return view('dashboard.admin.diskon.update_diskon', compact('promo'));
    }

    public function update_promo(Request $request, $id){
        $request->validate([
            'nama_promo' => 'required',
            'jenis_promo' => 'required',
            'nilai_promo' => 'required',
            'status' => 'required',
        ],[
            'nama_promo.required' => 'silahkan masukan nama promo',
            'jenis_promo.required' => 'silahkan masukan jenis promo',
            'nilai_promo.required' => 'silahkan masukan nilai promo',
            'status.required' => 'silahkan masukan status   '
        ]);


        $promo = Promo::find($id);

        $promo->nama_promo = $request->nama_promo;
        $promo->jenis_promo = $request->jenis_promo;
        $promo->nilai_promo = $request->nilai_promo;
        $promo->status = $request->status;
        $promo->update();

        return redirect('/dashboard/admin/daftar-diskon');
    }

    public function delete_promo($id){
        $promo = Promo::find($id);

        $promo->delete();
        return redirect('/dashboard/admin/daftar-diskon');

    }

    public function search_diskon(Request $request){
        $promos = Promo::query();

        if ($request->has('search')) {
            $promos->where('nama_promo', 'LIKE', '%' . $request->search . '%')
                   ->orWhere('jenis_promo', 'LIKE', '%' . $request->search . '%');
        }

        $promos = $promos->get();

        // Return ke view dengan data hasil pencarian
        return view('dashboard.admin.diskon.diskon_menu', compact('promos'));
    }
}
