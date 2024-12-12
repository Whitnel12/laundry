

@extends('layouts.app')

@section('title','login')

@section('content')
  <div class="login-main-container">
    <div class="login-container register-container">

      @if (session('error'))
      <div style="color: red">{{ session('error') }}</div>
      @endif

      <div class="main-login">
        <div class="title-login">Buat Akun Baru</div>
        <p>Masukkan username, email dan password yang benar</p>
        <form action="{{ route('send-otp') }}" method="POST" class="login">
          @csrf

          <div class="container-title-input">
            <label>Username</label>
            <div class="container-icon-input">
              <i class="fa-solid fa-user"></i>
              <input class="input-login" type="text" name="name" required placeholder="Masukkan nama">
            </div>
          </div>

          <div class="container-title-input">
            <label>Email</label>
            <div class="container-icon-input">
              <i class="fa-regular fa-envelope"></i>
              <input class="input-login" type="email" name="email" required placeholder="Masukkan email ">
            </div>
          </div>

          <div class="container-title-input">
            <label>Password</label>
            <div class="container-icon-input">
              <i class="fa-solid fa-lock"></i>
              <input class="input-login" type="password" name="password" required placeholder="Masukkan password ">
            </div>
          </div>

          <div class="btn-container">
            <button class="btn-login btn-auth" type="submit">Register</button>
            <button class="btn-cancel btn-auth" type="reset">Cancel</button>
          </div>
        </form>
      </div>

    </div>
    <div class="remember-auth">
      <p>sudah punya akun ?</p>
      <a href="/login">Login</a>
    </div>
  </div>
@endsection





