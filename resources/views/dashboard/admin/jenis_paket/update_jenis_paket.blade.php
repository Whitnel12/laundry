@extends('layouts.dashboard')

@section('dashboard-content')
<div class="pesanan-content">
  <div class="main-pesanan">
    <div class="pesanan-container">
      <div class="label-container-pesanan">
        <div class="label">Jenis Paket</div>
      </div>
      <div class="input-pesanan-container">
        <form action="/dashboard/admin/update-jenis-paket/{{ $jenis_paket->id }}" class="form-input-pesanan" method="POST">
          @csrf
          @method('PUT')

          <div class="input-berat form-input-pesanan-container"">
            <label for="">Jenis Paket</label>
            <input type="text" value="{{ $jenis_paket->nama_jenis }}" name="nama_jenis" class="input-pesanan" required>
          </div>

          <div class="input-berat form-input-pesanan-container">
            <label for="">Pengerjaan</label>
            <input type="number" value="{{ $jenis_paket->waktu_pengerjaan }}"  name="waktu_pengerjaan" class="input-pesanan" required>
          </div>

          <div class="input-harga form-input-pesanan-container">
            <label for="">Potongan Biaya</label>
            <input type="number" value="{{ $jenis_paket->potongan_harga }}"  name="potongan_harga" class="input-pesanan" required>
          </div>

          <div class="input-status form-input-pesanan-container">
            <label for="">Tambahan Biaya</label>
            <input type="number" value="{{ $jenis_paket->biaya_tambahan }}" name="biaya_tambahan" class="input-pesanan" required>
          </div>

          <div class="btn-pesanan-container">
            <a href="/dashboard/admin/jenis-paket">Kembali</a>
            <button type="submit">Perbarui</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  {{--  --}}
</div>


@endsection
