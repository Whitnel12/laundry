{{-- @extends('layouts.app')

@section('title','register')

@section('content')
  <div class="login-main-container">
    <div class="login-container">
      @if (session('error'))
      <div style="color: red">{{ session('error') }}</div>
    @endif

      <div class="main-login">
        <h3>Verifikasi</h3>
        <form action="{{ route('check-otp') }}" method="POST" class="login">
          @csrf
          <label>Email</label>
          <input class="input-login" type="email" name="email" value="{{ session('email') }}" required readonly>

          <label>OTP</label>
          <input class="input-login" type="text" name="otp"  required >

          <button class="btn-login" type="submit">Verifikasi</button>
        </form>
      </div>
    </div>
  </div>
@endsection
   --}}


   @extends('layouts.app')

   @section('title','login')

   @section('content')
     <div class="login-main-container">
       <div class="login-container">

         {{-- @if (session('error'))
         <div style="color: red">{{ session('error') }}</div>
         @endif --}}


         <div class="main-login">
           <div class="title-login">Verifikasi</div>
           <p>Email verifikasi sedang dikirim silahkan cek email</p>
           <form action="{{ route('check-otp') }}" method="POST" class="login">
             @csrf

             <div class="container-title-input">
               <label>Email</label>
               <div class="container-icon-input">
                 <i class="fa-regular fa-envelope"></i>
                 <input class="input-login" type="email" name="email" value="{{ session('email') }}" required placeholder="Masukkan nama" readonly>
               </div>
             </div>

             <div class="container-title-input">
               <label>Kode OTP</label>
               <div class="container-icon-input">
                <i class="fa-solid fa-envelope-open-text"></i>
                 <input class="input-login" type="text" name="otp" placeholder="Masukkan Kode disini">
               </div>
             </div>

              @if (session('error'))
         <div class="code-verify-error" style="color: red">{{ session('error') }}</div>
         @endif

             {{-- <div class="code-verify-error">maaf kode tidak terkirim</div> --}}

             <div class="btn-container">
               <button class="btn-verifikasi btn-auth" type="submit">Verifikasi</button>
             </div>
           </form>
         </div>

       </div>
     </div>
   @endsection




