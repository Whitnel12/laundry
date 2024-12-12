@extends('layouts.dashboard')

@section('dashboard-content')
<div class="pesanan-content">
  <div class="main-pesanan">
    <div class="pesanan-container">
      <div class="label-container-pesanan">
        <div class="label">Input Diskon</div>
      </div>
      <div class="input-pesanan-container">
        <form action="/dashboard/admin/update-promo/{{ $promo->id }}" class="form-input-pesanan" method="POST">
          @csrf
          @method('PUT')

          <div class="input-berat form-input-pesanan-container">
            <label for="">Nama Promo</label>
            <input value="{{ $promo->nama_promo }}" type="text" name="nama_promo" class="input-pesanan" required>
            @error('nama_promo')
            <div style="color: red; font-size:13px">{{ $message }}</div>
            @enderror
          </div>

          <div class="input-berat form-input-pesanan-container">
            <label for="">Jenis Promo</label>
            <select name="jenis_promo" id="">
              <option value="">-- Pilih Jenis Promo --</option>
              <option value="nominal" {{ $promo->jenis_promo == 'nominal' ? 'selected' : '' }}>nominal</option>
              <option value="persen" {{ $promo->jenis_promo == 'persen' ? 'selected' : '' }}>persen</option>
            </select>
            @error('jenis_promo')
            <div style="color: red; font-size:13px">{{ $message }}</div>
            @enderror
          </div>

          <div class="input-harga form-input-pesanan-container">
            <label for="">Nilai Promo</label>
            <input value="{{ $promo->nilai_promo }}" type="decimal" name="nilai_promo" class="input-pesanan" required>
            @error('nilai_promo')
            <div style="color: red; font-size:13px">{{ $message }}</div>
            @enderror
          </div>

          <div class="input-status form-input-pesanan-container">
            <label for="">status</label>
            <select name="status" id="">
              <option value="">-- Pilih Status --</option>
              <option value="aktif" {{ $promo->status == 'aktif' ? 'selected' : '' }}>aktif</option>
              <option value="nonaktif" {{ $promo->status == 'nonaktif' ? 'selected' : '' }}>nonaktif</option>
            </select>
            @error('status')
            <div style="color: red; font-size:13px">{{ $message }}</div>
            @enderror
          </div>

          <div class="btn-pesanan-container">
            <a href="/dashboard/admin/daftar-diskon">Kembali</a>
            <button type="submit">Ubah data</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  {{--  --}}
</div>

@endsection
