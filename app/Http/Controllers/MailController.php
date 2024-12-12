<?php

namespace App\Http\Controllers;

use App\Mail\SendOtpMail;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

// kirim email ke inbox 
class MailController extends Controller
{
    
    public function sendOtp(Request $request){

        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Generate OTP dan kirim ke email
        $otp = rand(100000, 999999);
        Mail::to($request->email)->send(new SendOtpMail($otp));

        // Simpan OTP dan informasi sementara di session
        session([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password), // Enkripsi password
            'otp' => $otp,
        ]);

        return redirect('/verify')->with('success', 'OTP telah dikirim ke email Anda.');

       
    }

    
   public function checkOtp(Request $request){
       
       if($request->otp == session('otp')){
           User::create([
               'name' => session('name'),
               'email' => session('email'),
               'password' => session('password'),
               'otp' => '-',
            ]);
            
            session()->forget(['name','email','password','otp']);
            return redirect()->route('login')->with('success','Registrasi Berhasil, silahkan login');
        }else{
            return redirect()->back()->with('error','OTP yang anda masukkan salah');
        }
        
   }


   public function login_access(Request $request){
    
     $request->validate([
        'name' => 'required|string',
        'password' => 'required|string',
    ]);

    $data_login = [
        'name' => $request->name,
        'password' => $request->password,
    ];


    if (Auth::attempt($data_login)) {

        if (Auth::user()->role=='admin') {
            return redirect('/dashboard/admin/users');
        }elseif(Auth::user()->role == 'pelanggan'){
            return redirect('/dashboard/pelanggan/pesanan');
        }elseif(Auth::user()->role == 'pimpinan'){
            return redirect('/dashboard/pimpinan/laporan');
        }

    }else{
        return redirect()->back()->with('error','Username atau Password salah');
    }
   }

   public function logout(){
    Auth::logout();
    return redirect('/');
   }

   //--------------------------ADMIN USER PROFILE----------------------
   
   public function view_admin_profile(){
    return view('dashboard.admin.profile.admin_profile');
   }
   public function view_pelanggan_profile(){
    return view('dashboard.pelanggan.pelangggan_profile');
   }
   public function view_pimpinan_profile(){
    return view('dashboard.pimpinan.pimpinan_profile');
   }


    public function store_admin_profile(Request $request){

    $request->validate([
    'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    'name' => 'required|string|max:255',
    'address' => 'nullable|string|max:255',
    'phone' => 'nullable|string|max:15',
    'gender' => 'nullable',
    ]);

    $user = auth()->user();

    // Periksa apakah ada foto lama dan hapus jika ada
    if ($user->photo && file_exists(public_path($user->photo)) ) {
    // Hapus foto lama
    unlink(public_path($user->photo));
    
    }

    if(!@$request->hasFile('photo')){
        $user->photo = null;
    }

    // Simpan foto baru jika ada
    if ($request->hasFile('photo')) {
    $nm = $request->file('photo');
    $nama_file = time().rand(100,999).".".$nm->getClientOriginalName();

    // Simpan file gambar di folder public/images
    $nm->move(public_path('images'), $nama_file);
    

    // Simpan path gambar di database
    $user->photo = 'images/' . $nama_file;
    }

    // Update informasi lainnya
    $user->name = $request->input('name');
    $user->address = $request->input('address');
    $user->phone = $request->input('phone');
    $user->gender = $request->gender;
    
    $user->save(); // Simpan perubahan

    return redirect()->back()->with('success', 'Profil berhasil diperbarui!');

    }

   //--------------------------ADMIN USER PROSES----------------------
   public function getAllUser(){
    $users = User::count();
    $pesanan_antrian = Pesanan::where('status_pesanan','ANTRIAN')->count();
    $pesanan_selesai = Pesanan::where('status_pesanan','SELESAI')->count();
    $pesanan_proses = Pesanan::where('status_pesanan','PROSES')->count();
    $pesanan_diterima = Pesanan::where('status_pesanan','DITERIMA')->count();
    return view('dashboard.admin.users_menu', compact('users','pesanan_antrian','pesanan_selesai','pesanan_proses','pesanan_diterima'));
   }

   public function view_users_list(){
    $getAllUser = User::all();
    return view('dashboard.admin.users_list_menu', compact('getAllUser'));

   }

} 