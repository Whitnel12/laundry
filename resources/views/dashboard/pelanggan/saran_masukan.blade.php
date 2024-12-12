@extends('layouts.user_dashboard')

@section('dashboard-content')

<div class="pesanan-content">
  <div class="main-pesanan">
    
    <div class="pesanan-container">
      <div class="label-container-pesanan">
        <div class="label">Saran dan Masukan</div>  
      </div>

      @if (session('success'))
      <div class="container-berhasil-kirim">
        <p>
          {{ session('success') }}
          </p>
      </div>
      @endif

      <form action="/dashboard/pelanggan/tambah-saran-masukan" method="POST">
        @csrf
        <div class="container-saran-masukan">
          <div class="container-jenis ">
            <label>Jenis</label>
            <select name="jenis" id="">
              <option value="">--Pilih Jenis--</option>
              <option value="saran">Saran</option>
              <option value="masukan">Masukan</option>
            </select>

          @if ($errors->has('jenis'))
          <div style="color: red;font-size:13px">
          {{ $errors->first('jenis') }}
          </div>
          @endif

          </div>
    
          <div class="container-jenis  container-isi-saran">
            <label >Isi saran/masukan</label>
            <textarea name="isi" id="" cols="30" rows="10" style="padding: 10px"></textarea>

          @if ($errors->has('isi'))
          <div style="color: red; font-size:13px">
          {{ $errors->first('isi') }}
          </div>
          @endif

          </div>

          <div class="container-btn-kirim-saran-masukan">
            <button type="submit">Kirim</button>
          </div>
        </div>
      </form>
    
    </div>
  
  </div>
</div>

@endsection