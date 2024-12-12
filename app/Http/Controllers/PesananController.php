<?php

namespace App\Http\Controllers;

use App\Models\Jenispaket;
use App\Models\Paket;
use App\Models\Pesanan;
use App\Models\Promo;
use App\Models\User;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade\Pdf;

// use Barryvdh\DomPDF\Facade as PDF;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PesananController extends Controller
{

    public function view_pesanan(){
        $pesanans = Pesanan::whereIn('status_pesanan',['antrian','proses','selesai'])->get();


        return view('dashboard.admin.pesanan_menu',compact('pesanans'));
    }

    public function view_input_pesanan(){
        $pakets = Paket::all();
        $pelanggans = User::where('role','pelanggan')->get();
        $allpromo = Promo::where('status','aktif')->get();

        return view('dashboard.admin.pesanan.input_pesanan',compact('pakets','pelanggans','allpromo'));
    }

    public function tambah_pesanan(Request $request ){

        $request->validate([
            'pesanan' => 'required|exists:paket,id',  // Pastikan paket_id valid dan ada di tabel paket
            'pelanggan' => 'required|exists:users,id', // Pastikan user_id valid dan ada di tabel users
            'promo_id' => 'nullable|exists:promo,id',  // Promo boleh kosong, tapi jika ada harus valid
            'berat' => 'required|numeric|min:1',        // Berat harus angka dan lebih dari 0
            'total_harga' => 'required|numeric|min:0',   // Total harga harus angka dan tidak negatif
        ], [
            // Pesan kustom untuk validasi
            'pesanan.required' => 'Paket pesanan harus dipilih',
            'pesanan.exists' => 'Paket yang dipilih tidak ada dalam daftar',
            'pelanggan.required' => 'Pelanggan harus dipilih',
            'pelanggan.exists' => 'Pelanggan yang dipilih tidak ada',
            'promo_id.exists' => 'Promo yang dipilih tidak valid',
            'berat.required' => 'Berat pesanan harus diisi',
            'berat.numeric' => 'Berat harus berupa angka',
            'berat.min' => 'Berat harus lebih dari 0',
            'total_harga.required' => 'Total harga harus diisi',
            'total_harga.numeric' => 'Total harga harus berupa angka',
            'total_harga.min' => 'Total harga tidak boleh negatif',
        ]);

        $pesanan = new Pesanan();

        $pesanan->paket_id = $request->pesanan;
        $pesanan->user_id = $request->pelanggan;
        $pesanan->promo_id = $request->promo_id;
        $pesanan->status_pesanan = $request ->status_pesanan;
        $pesanan->berat = $request->berat;
        $pesanan->total_harga = $request->total_harga;
        $pesanan->save();

        return redirect('/dashboard/admin/pesanan');
    }

    public function view_update_pesanan($id){
        $pesanan = Pesanan::find($id);
        $pakets = Paket::all();
        $pelanggans = User::where('role','pelanggan')->get();
        $allpromo = Promo::all();

        return view('dashboard.admin.pesanan.update_pesanan', compact('pesanan','pakets','pelanggans','allpromo'));
    }

    public function update_pesanan(Request $request, $id){
        $request->validate([
            'pesanan' => 'required|exists:paket,id',  // Pastikan paket_id valid dan ada di tabel paket
            'pelanggan' => 'required|exists:users,id', // Pastikan user_id valid dan ada di tabel users
            'promo_id' => 'nullable|exists:promo,id',  // Promo boleh kosong, tapi jika ada harus valid
            'berat' => 'required|numeric|min:1',        // Berat harus angka dan lebih dari 0
            'total_harga' => 'required|numeric|min:0',   // Total harga harus angka dan tidak negatif
        ], [
            // Pesan kustom untuk validasi
            'pesanan.required' => 'Paket pesanan harus dipilih',
            'pesanan.exists' => 'Paket yang dipilih tidak ada dalam daftar',
            'pelanggan.required' => 'Pelanggan harus dipilih',
            'pelanggan.exists' => 'Pelanggan yang dipilih tidak ada',
            'promo_id.exists' => 'Promo yang dipilih tidak valid',
            'berat.required' => 'Berat pesanan harus diisi',
            'berat.numeric' => 'Berat harus berupa angka',
            'berat.min' => 'Berat harus lebih dari 0',
            'total_harga.required' => 'Total harga harus diisi',
            'total_harga.numeric' => 'Total harga harus berupa angka',
            'total_harga.min' => 'Total harga tidak boleh negatif',
        ]);

        $pesanan = Pesanan::find($id);

        $pesanan->paket_id = $request->pesanan;
        $pesanan->user_id = $request->pelanggan;
        $pesanan->promo_id = $request->promo_id;
        $pesanan->status_pesanan = $request->status_pesanan;
        $pesanan->berat = $request->berat;
        $pesanan->total_harga = $request->total_harga;
        $pesanan->update();

        return redirect('/dashboard/admin/pesanan');
    }

    public function delete_pesanan($id){
        $pesanan = Pesanan::find($id);

        $pesanan->delete();

        return redirect('/dashboard/admin/pesanan');
    }

    public function view_laporan_pesanan(){
        $pesanans = Pesanan::where('status_pesanan','diterima')
        ->orderBy('updated_at', 'desc')
        ->get();

        return view('dashboard.admin.laporan.laporan_menu',compact('pesanans'));
    }

    public function search_pesanan_pelanggan(Request $request){
        $pesanans = Pesanan::with(['user', 'paket.jenispaket', 'promo'])
         ->whereHas('user', function ($query) use ($request) {
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        })->get();

        return view('dashboard.admin.pesanan_menu', compact('pesanans'));
    }

    // public function filter_laporan(Request $request){
    //     $start_date = $request->start_date;
    //     $end_date = $request->end_date;

    //     if(!$start_date || !$end_date){
    //         return 'tanggal tidak boleh kosong';
    //     }

    //     $pesanans = Pesanan::whereDate('created_at','>=',$start_date)
    //                             ->whereDate('created_at','<=',$end_date)
    //                             ->get();

    //     return view('dashboard.admin.laporan.laporan_menu',compact('pesanans'));
    // }

    public function filter_laporan(Request $request){
        $action = $request->get('action');
        $filter = $request->input('filter');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $pesananQuery = Pesanan::where('status_pesanan', 'diterima');
        // $userQuery = User::query();

        // Apply filter
        if ($filter === 'day') {
            $pesananQuery->whereDate('updated_at', Carbon::today());
            // $userQuery->whereDate('created_at', Carbon::today());
        } elseif ($filter === 'month') {
            $pesananQuery->whereMonth('updated_at', Carbon::now()->month)
                        ->whereYear('updated_at', Carbon::now()->year);
            // $userQuery->whereMonth('created_at', Carbon::now()->month)
            //         ->whereYear('created_at', Carbon::now()->year);
        } elseif ($filter === 'year') {
            $pesananQuery->whereYear('updated_at', Carbon::now()->year);
            // $userQuery->whereYear('created_at', Carbon::now()->year);
        }

        if ($startDate && $endDate) {

            $pesananQuery->whereDate('updated_at', '>=', $startDate)
                         ->whereDate('updated_at', '<=', $endDate);

            // $userQuery->whereBetween('created_at', [$startDate, $endDate]);
        }

        // Fetch data
        $pesanans = $pesananQuery->get();
        // $UserCount = $userQuery->count();
        // $PesananCount = $pesananQuery->where('status_pesanan', 'diterima')->count();
        // $IncomeValue = $pesananQuery->sum('total_harga');

        if ($action == 'download_pdf') {
            // Jika tombol "Download PDF" ditekan
            return $this->download_laporan_pdf($pesanans);
        }

        // Jika tombol "Filter" ditekan
        return view('dashboard.admin.laporan.laporan_menu', compact('pesanans'));

    }

    public function download_laporan_pdf($pesanans){
        // $pesanans = Pesanan::all();
        $pdf = Pdf::loadView('dashboard.admin.laporan.laporan_pdf',compact('pesanans'));
        $pdf->setPaper('A4','potrait');
        return $pdf->stream('pesanan.pdf');
    }

    public function halaman_detail_pesanan($id){
        $pesanan = Pesanan::find($id);

        return view('dashboard.admin.pesanan.detail_pesanan',compact('pesanan'));
    }

    public function pdf_generator($id){
        $pesanan = Pesanan::with(['user', 'promo', 'paket.jenispaket'])->findOrFail($id);

         $pdf = Pdf::loadView('dashboard.admin.pesanan.detail_pesanan', compact('pesanan'))
               ->setPaper('a4', 'portrait');

        return $pdf->download('detail_pesanan_'.$pesanan->id.'.pdf');
    }



    // -------------------------------PESANAN PELANGGAN-------------------------------


    public function pesanan_pelanggan(){
        $pesanans = Pesanan::whereIn('status_pesanan',['antrian','proses','selesai'])->get();

        return view('dashboard.pelanggan.status_pesanan', compact('pesanans'));
    }



    public function view_riwayat_pesanan(){
        // $pesanans = Pesanan::whereIn('status_pesanan',['antrian','proses','selesai','diterima'])->get();
        $pesanans = Pesanan::whereIn('status_pesanan',['diterima'])->get();

        return view('dashboard.pelanggan.riwayat_pesanan', compact('pesanans'));
    }

    public function delete_riwayat_pesanan($id){
        $pesanan = Pesanan::find($id);
        $pesanan->delete();

        return redirect('/dashboard/pelanggan/riwayat');

    }

    // -------------------------------LAPORAN PIMPINAN-------------------------------

    public function view_laporan_pimpinan_menu(){
        $UserCount = User::where('role','pelanggan')->count();
        $PesananCount = Pesanan::where('status_pesanan',['diterima'])->count();
        $IncomeValue = Pesanan::where('status_pesanan', 'diterima')->sum('total_harga');
        $pesanans = Pesanan::where('status_pesanan','diterima')->get();


        return view('dashboard.pimpinan.pimpinan_laporan',compact('UserCount','PesananCount','IncomeValue','pesanans'));
    }

    public function filter_laporan_pimpinan(Request $request){
        $action = $request->get('action');
        $filter = $request->input('filter');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $pesananQuery = Pesanan::where('status_pesanan', 'diterima');
        $userQuery = User::query();



        // Apply filter
        if ($filter === 'day') {
            $pesananQuery->whereDate('updated_at', Carbon::today());
            $userQuery->whereDate('created_at', Carbon::today());
        } elseif ($filter === 'month') {
            $pesananQuery->whereMonth('updated_at', Carbon::now()->month)
                        ->whereYear('updated_at', Carbon::now()->year);
            $userQuery->whereMonth('created_at', Carbon::now()->month)
                    ->whereYear('created_at', Carbon::now()->year);
        } elseif ($filter === 'year') {
            $pesananQuery->whereYear('updated_at', Carbon::now()->year);
            $userQuery->whereYear('created_at', Carbon::now()->year);
        }

        if ($startDate && $endDate) {

            $pesananQuery->whereDate('updated_at', '>=', $startDate)
                         ->whereDate('updated_at', '<=', $endDate);

            $userQuery->whereBetween('created_at', [$startDate, $endDate]);
        }

        // Fetch data
        $pesanans = $pesananQuery->get();
        $UserCount = $userQuery->count();
        $PesananCount = $pesananQuery->where('status_pesanan', 'diterima')->count();
        $IncomeValue = $pesananQuery->sum('total_harga');

        if ($action == 'download_pdf') {
            // Jika tombol "Download PDF" ditekan
            return $this->cetak_laporan_pimpinan($pesanans);
        }

        return view('dashboard.pimpinan.pimpinan_laporan', [
            'UserCount' => $UserCount,
            'PesananCount' => $PesananCount,
            'IncomeValue' => $IncomeValue,
            'pesanans' => $pesanans,
        ]);

    }

    public function cetak_laporan_pimpinan($pesanans){
        $pdf = Pdf::loadView('dashboard.pimpinan.pimpinan_pdf',compact('pesanans'));
        $pdf->setPaper('A4','potrait');
        return $pdf->stream('pesanan_pimpinan.pdf');
    }


}
