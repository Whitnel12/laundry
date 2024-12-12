@extends('layouts.app')

@section('title','login')

@section('content')
  <div class="login-main-container">
    <div class="login-container">




      <div class="main-login">
        @if (session('success'))
        <div class="register-success" style="color: green">{{ session('success') }}</div>
        @endif
        <div class="title-login">Selamat Datang Kembali</div>
        <p>Masukkan username dan password anda yang terdaftar</p>
        <form action="/login-access" method="POST" class="login">
          @csrf

          <div class="container-input-auth">
            <div class="container-title-input">
              <label>Username</label>
              <div class="container-icon-input">
                <i class="fa-solid fa-user"></i>
                <input class="input-login" type="text" name="name" required placeholder="Masukkan nama">
              </div>
            </div>

            <div class="container-title-input">
              <label>Password</label>
              <div class="container-icon-input">
                <i class="fa-solid fa-lock"></i>
                <input class="input-login" type="password" name="password" required placeholder="Masukkan password ">
              </div>
            </div>
          </div>

          @if (session('error'))
          <div class="error-msg">{{ session('error') }}</div>
          @endif


          <div class="btn-container">
            <button class="btn-login btn-auth" type="submit">Login</button>
            <button class="btn-cancel btn-auth" type="reset">Cancel</button>
          </div>
        </form>
      </div>

    </div>
    <div class="remember-auth">
      <p>belum punya akun ?</p>
      <a href="/register">register</a>
    </div>
  </div>
@endsection


