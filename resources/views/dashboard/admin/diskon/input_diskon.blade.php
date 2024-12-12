@extends('layouts.dashboard')

@section('dashboard-content')
<div class="pesanan-content">
  <div class="main-pesanan">
    <div class="pesanan-container">
      <div class="label-container-pesanan">
        <div class="label">Input Diskon</div>
      </div>
      <div class="input-pesanan-container">
        <form action="/dashboard/admin/tambah-promo" class="form-input-pesanan" method="POST">
          @csrf

          <div class="input-berat form-input-pesanan-container">
            <label for="">Nama Promo</label>
            <input type="text" name="nama_promo" class="input-pesanan" required value="{{ old('nama_promo') }}">
            @error('nama_promo')
            <div style="color: red; font-size:13px">{{ $message }}</div>
            @enderror
          </div>

          <div class="input-berat form-input-pesanan-container">
            <label for="">Jenis Promo</label>
            <select name="jenis_promo" id="">
              <option value="">-- Pilih Jenis Promo --</option>
              <option value="nominal">Nominal</option>
              <option value="persen">Persen</option>
            </select>
            @error('jenis_promo')
            <div style="color: red; font-size:13px">{{ $message }}</div>
            @enderror
          </div>

          <div class="input-harga form-input-pesanan-container">
            <label for="">Nilai Promo</label>
            <input type="number" name="nilai_promo" class="input-pesanan" required value="{{ old('nilai_promo') }}">
            @error('nilai_promo')
            <div style="color: red; font-size:13px">{{ $message }}</div>
            @enderror
          </div>

          <div class="input-status form-input-pesanan-container">
            <label for="">status</label>
            <select name="status" id="">
              <option value="">-- Pilih Status --</option>
              <option value="aktif">aktif</option>
              <option value="nonaktif">nonaktif</option>
            </select>
            @error('status')
            <div style="color: red; font-size:13px">{{ $message }}</div>
            @enderror
          </div>

          <div class="btn-pesanan-container">
            <a href="/dashboard/admin/daftar-diskon">Kembali</a>
            <button type="submit">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  {{--  --}}
</div>

@endsection
