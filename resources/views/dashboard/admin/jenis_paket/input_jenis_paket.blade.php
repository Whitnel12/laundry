@extends('layouts.dashboard')

@section('dashboard-content')
<div class="pesanan-content">
  <div class="main-pesanan">
    <div class="pesanan-container">
      <div class="label-container-pesanan">
        <div class="label">Jenis Paket</div>
      </div>
      <div class="input-pesanan-container">
        <form action="/dashboard/admin/tambah-jenis-paket" class="form-input-pesanan" method="POST">
          @csrf

          <div class="input-berat form-input-pesanan-container"">
            <label for="">Jenis Paket</label>
            <input type="text"  name="nama_jenis" class="input-pesanan" required>
            @error('nama_jenis')
            <span style="color: red; font-size:13px">{{ $message }}</span>
            @enderror
          </div>

          <div class="input-berat form-input-pesanan-container">
            <label for="">Pengerjaan</label>
            <input type="number"  name="waktu_pengerjaan" class="input-pesanan" required>
            @error('waktu_pengerjaan')
            <span style="color: red; font-size:13px">{{ $message }}</span>
            @enderror
          </div>

          <div class="input-harga form-input-pesanan-container">
            <label for="">Potongan Biaya</label>
            <input type="number"  name="potongan_harga" class="input-pesanan" required>
            @error('potongan_harga')
            <span style="color: red; font-size:13px">{{ $message }}</span>
            @enderror
          </div>

          <div class="input-status form-input-pesanan-container">
            <label for="">Tambahan Biaya</label>
            <input type="number" name="biaya_tambahan" class="input-pesanan" required>
            @error('biaya_tambahan')
            <span style="color: red; font-size:13px">{{ $message }}</span>
            @enderror
          </div>

          <div class="btn-pesanan-container">
            <a href="/dashboard/admin/jenis-paket">Kembali</a>
            <button type="submit">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  {{--  --}}
</div>


@endsection
