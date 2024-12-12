<?php

use App\Http\Controllers\controller_saran_masukan;
use App\Http\Controllers\JenisPaketController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PromoController;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::middleware(['guest'])->group(function(){

    Route::get('/', function () {
        return view('landing.index');
    });

    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::post('/login-access',[MailController::class,'login_access'])->name('login-access');

    Route::get('/register', function () {
        return view('auth.register');
    });

    Route::post('/send-register-otp',[MailController::class,'sendOtp'])->name('send-otp');

    Route::post('/check-register-otp',[MailController::class,'checkOtp'])->name('check-otp');

    Route::get('/verify', function () {
        return view('auth.verify');
    })->name('verify');

});

Route::get('/home', function () {
    return redirect('/dashboard/admin/users');
});




Route::middleware(['auth'])->group(function(){

    //--------------------------PROSES LOGOUT------------------------
    Route::get('/logout', [MailController::class, 'logout']);

    //--------------------------DASHBOARD ADMIN PROFILE----------------------
    Route::get('/dashboard/admin/profile', [MailController::class, 'view_admin_profile']);
    Route::post('/dashboard/admin/add-profile',[MailController::class, 'store_admin_profile']);


    //--------------------------DASHBOARD ADMIN USER----------------------

    Route::get('/dashboard/admin/users',[MailController::class, 'getAllUser'])->middleware('userAkses:admin');
    Route::get('/dashboard/admin/list-users',[MailController::class, 'view_users_list']);

    // Route::get('/dashboard/admin/list-users', function(){
    //     return view('dashboard.admin.users_list_menu');
    // })->middleware('userAkses:admin');

    //--------------------------DASHBOARD ADMIN----------------------
    Route::get('/dashboard/admin/status', function(){
        return view('dashboard.admin.status_menu');
    })->middleware('userAkses:admin');

    // Route::get('/dashboard/admin/paket',function(){
    //     return view('dashboard.admin.paket_menu');
    // })->middleware('userAkses:admin');

    //--------------------------DASHBOARD ADMIN PESANAN----------------------
    // Route::get('/dashboard/admin/pesanan', function(){
    //     return view('dashboard.admin.pesanan_menu');
    // })->middleware('userAkses:admin');

    Route::get('/dashboard/admin/pesanan',[PesananController::class,'view_pesanan'])->middleware('userAkses:admin');
    Route::get('/dashboard/admin/input-pesanan',[PesananController::class,'view_input_pesanan']);
    Route::post('/dashboard/admin/tambah-pesanan',[PesananController::class,'tambah_pesanan']);
    Route::get('/dashboard/admin/halaman-update-pesanan/{id}',[PesananController::class,'view_update_pesanan']);
    Route::put('/dashboard/admin/update-pesanan/{id}',[PesananController::class,'update_pesanan']);
    Route::delete('/dashboard/admin/delete-pesanan/{id}',[PesananController::class,'delete_pesanan']);
    Route::get('/dashboard/admin/cari-pesanan-pelanggan',[PesananController::class,'search_pesanan_pelanggan']);
    // Route::get('/dashboard/admin/halaman-detail-pesanan/{id}',[PesananController::class,'halaman_detail_pesanan']);
    // Route::get('/dashboard/admin/halaman-detail-pesanan/pdf-generator/{id}',[PesananController::class,'pdf_generator']);



    //--------------------------DASHBOARD PAKET ADMIN----------------------
    Route::get('/dashboard/admin/paket',[PaketController::class,'view_paket']);
    Route::get('/dashboard/admin/input-paket',[PaketController::class,'view_input_paket']);
    Route::post('/dashboard/admin/tambah-paket',[PaketController::class,'tambah_paket']);
    Route::get('/dashboard/admin/halaman-update-paket/{id}',[PaketController::class,'view_update_paket']);
    Route::put('/dashboard/admin/update-paket/{id}',[PaketController::class,'update_paket']);
    Route::delete('/dashboard/admin/delete-paket/{id}',[PaketController::class,'delete_paket']);
    Route::get('/dashboard/admin/cari-paket',[PaketController::class,'search_paket']);
    Route::get('/dashboard/admin/download-paket-pdf',[PaketController::class,'download_paket_pdf']);

    //--------------------------DASHBOARD PAKET SATUAN ADMIN----------------------
    // Route::get('/dashboard/admin/paket-satuan', function(){
    //     return view('dashboard.admin.paket.satuan.paket_satuan_menu');
    // });

    //--------------------------DASHBOARD DISKON ADMIN----------------------
    // Route::get('/dashboard/admin/daftar-diskon', function(){
    //     return view('dashboard.admin.diskon.diskon_menu');
    // });
    Route::get('/dashboard/admin/daftar-diskon',[PromoController::class, 'view_promo']);
    Route::get('/dashboard/admin/input-promo',[PromoController::class, 'view_input_promo']);
    Route::post('/dashboard/admin/tambah-promo',[PromoController::class, 'tambah_promo']);
    Route::get('/dashboard/admin/halaman-update-promo/{id}',[PromoController::class, 'view_update_promo']);
    Route::put('/dashboard/admin/update-promo/{id}',[PromoController::class, 'update_promo']);
    Route::delete('/dashboard/admin/delete-promo/{id}',[PromoController::class, 'delete_promo']);
    Route::get('/dashboard/admin/cari-diskon',[PromoController::class,'search_diskon']);


    //--------------------------DASHBOARD JENIS PAKET ADMIN----------------------

    Route::get('/dashboard/admin/jenis-paket',[JenisPaketController::class, 'view_jenis_paket']);
    Route::get('/dashboard/admin/input-jenis-paket',[JenisPaketController::class, 'view_input_jenis_paket']);
    Route::post('/dashboard/admin/tambah-jenis-paket',[JenisPaketController::class, 'tambah_jenis_paket']);
    Route::get('/dashboard/admin/halaman-update-jenis-paket/{id}',[JenisPaketController::class, 'view_update_jenis_paket']);
    Route::put('/dashboard/admin/update-jenis-paket/{id}',[JenisPaketController::class, 'update_jenis_paket']);
    Route::delete('/dashboard/admin/delete-jenis-paket/{id}',[JenisPaketController::class, 'delete_jenis_paket']);
    Route::get('/dashboard/admin/download-jenis-paket-pdf',[JenisPaketController::class,'download_jenis_paket_pdf']);
    Route::get('/dashboard/admin/cari-jenis-paket',[JenisPaketController::class,'search_jenis_paket']);

    //--------------------------DASHBOARD LAPORAN ADMIN----------------------
    Route::get('/dashboard/admin/laporan',[PesananController::class,'view_laporan_pesanan']);
    Route::get('/dashboard/admin/filter-laporan',[PesananController::class,'filter_laporan']);
    Route::get('/dashboard/admin/download-laporan-pdf',[PesananController::class,'download_laporan_pdf']);



    //--------------------------DASHBOARD PELANGGAN----------------------
    // Route::get('/dashboard/pelanggan/pesanan', function(){
    //     return view('dashboard.pelanggan.status_pesanan');
    // })->middleware('userAkses:pelanggan');

    Route::get('/dashboard/pelanggan/pesanan', [PesananController::class,'pesanan_pelanggan'])->middleware('userAkses:pelanggan');
    Route::get('/dashboard/pelanggan/paket', [PaketController::class,'paket_pelanggan'])->middleware('userAkses:pelanggan');
    Route::get('/dashboard/pelanggan/cari-paket',[PaketController::class,'search_paket_pelanggan']);
    Route::delete('/dashboard/pelanggan/delete-pesanan/{id}', [PesananController::class,'delete_riwayat_pesanan'])->middleware('userAkses:pelanggan');

    Route::get('/pelanggan', function () {
        return view('home');
    })->middleware('userAkses:pelanggan');

    Route::get('/dashboard/pelanggan/riwayat', [PesananController::class,'view_riwayat_pesanan']);

    //--------------------------DASHBOARD PELANGAN SARAN DAN MASUKAN----------------------
    Route::get('/dashboard/pelanggan/saran-masukan', [controller_saran_masukan::class,'view_saran_masukan'])->middleware('userAkses:pelanggan');
    Route::post('/dashboard/pelanggan/tambah-saran-masukan', [controller_saran_masukan::class,'tambah_saran_masukan'])->middleware('userAkses:pelanggan');


    // Route::get('/dashboard/pelanggan/riwayat', function () {
    //     return view('dashboard.pelanggan.riwayat_pesanan');
    // })->middleware('userAkses:pelanggan');

     //--------------------------DASHBOARD PELANGAN PROFILE----------------------
     Route::get('/dashboard/pelanggan/profile', [MailController::class, 'view_pelanggan_profile']);
     Route::post('/dashboard/pelanggan/add-profile',[MailController::class, 'store_admin_profile']);

    //--------------------------DASHBOARD PIMPINAN----------------------

    // Route::get('/dashboard/pimpinan/laporan', function () {
    //     return view('dashboard.pimpinan.pimpinan_laporan');
    // });

    Route::get('/dashboard/pimpinan/profile', [MailController::class, 'view_pimpinan_profile']);
    Route::get('/dashboard/pimpinan/add-profile', [MailController::class, 'store_admin_profile']);
    Route::get('/dashboard/pimpinan/saran-masukan',[controller_saran_masukan::class,'view_hasil_saran_masukan']);
    Route::delete('/dashboard/pimpinan/saran-masukan/delete/{id}',[controller_saran_masukan::class,'delete_hasil_saran_masukan']);
    Route::get('/dashboard/pimpinan/laporan',[PesananController::class,'view_laporan_pimpinan_menu']);
    Route::get('/dashboard/pimpinan/filter-laporan',[PesananController::class,'filter_laporan_pimpinan']);

});
