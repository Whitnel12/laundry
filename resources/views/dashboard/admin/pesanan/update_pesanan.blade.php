@extends('layouts.dashboard')

@section('dashboard-content')

{{-- {{ dd($pesanan->paket->total_harga_paket) }} --}}
<div class="pesanan-content">
  <div class="main-pesanan">
    <div class="pesanan-container">
      <div class="label-container-pesanan">
        <div class="label">Perbarui Pesanan</div>
      </div>
      <div class="input-pesanan-container">
        <form action="/dashboard/admin/update-pesanan/{{ $pesanan->id }}" class="form-input-pesanan" method="POST">
          @csrf
          @method("PUT")
          <div class="input-nama-pelanggan form-input-pesanan-container">
            <label for="">Pelanggan</label>
            <select name="pelanggan" id="">
              <option value="">-- Pilih Pelanggan</option>
              @foreach ($pelanggans as $pelanggan)
              <option value="{{ $pelanggan->id }}"
              {{ $pelanggan->id == $pesanan->user_id ? 'selected' : '' }}>{{ $pelanggan->name }}</option>
              @endforeach
            </select>

            @error('pelanggan')
            <div style="color: red; font-size:13px;">{{ $message }}</div>
            @enderror
          </div>

          <div class="input-nama-pesanan form-input-pesanan-container">
            <label for="">Pesanan</label>
            <select name="pesanan" id="daftar-paket">
              <option value="">-- Pilih Paket--</option>
              @foreach ($pakets as $paket)
              <option value="{{ $paket->id }}" {{ $paket->id == $pesanan->paket_id ? 'selected' : '' }} harga_paket="{{ $paket->total_harga_paket }}">{{ $paket->nama_paket }} &  {{ $paket->jenispaket->nama_jenis }}</option>
              @endforeach
            </select>

            @error('pesanan')
            <div style="color: red; font-size:13px;">{{ $message }}</div>
            @enderror
          </div>

          <div class="input-berat form-input-pesanan-container" style="display: none">
            <label for="">Harga Paket</label>
            <input type="number" id="harga-paket" name="harga_paket" class="input-pesanan" readonly>
          </div>

          <div class="input-berat form-input-pesanan-container">
            <label for="">Satuan/Kiloan</label>
            <input value="{{ $pesanan->berat }}" type="number" id="berat-paket" name="berat" class="input-pesanan">

            @error('berat')
            <div style="color: red; font-size:13px;">{{ $message }}</div>
            @enderror
          </div>

          <div class="input-harga form-input-pesanan-container">
            <label for="">Diskon</label>
            <select name="promo_id" id="promo_id">
            <option value="">Tidak Ada</option>
              @foreach ($allpromo as $promo)
              <option
              value="{{ $promo->id }}"
              nilai_diskon="{{ $promo->nilai_promo }}"
              tipe_diskon ="{{ $promo->jenis_promo }}"
              {{ $pesanan->promo_id == $promo->id ? 'selected' : '' }}
              >{{ $promo->nama_promo }}</option>
              @endforeach
            </select>

            @error('promo_id')
            <div style="color: red; font-size:13px;">{{ $message }}</div>
            @enderror
          </div>

          <div class="input-harga form-input-pesanan-container">
            <label for="">Total Harga</label>
            <input value="{{ $pesanan->total_harga }}" type="text" id="total-harga" name="total_harga" class="input-pesanan" readonly>

            @error('total_harga')
            <div style="color: red; font-size:13px;">{{ $message }}</div>
            @enderror
          </div>

          <div class="input-status form-input-pesanan-container">
            <label for="">status</label>
            <select name="status_pesanan">
              <option value="ANTRIAN" {{ $pesanan->status_pesanan === 'ANTRIAN' ? 'selected' : '' }}>Antrian</option>
              <option value="PROSES" {{ $pesanan->status_pesanan === 'PROSES' ? 'selected' : '' }}>Proses</option>
              <option value="SELESAI" {{ $pesanan->status_pesanan === 'SELESAI' ? 'selected' : '' }}>Selesai</option>
              <option value="DITERIMA" {{ $pesanan->status_pesanan === 'DITERIMA' ? 'selected' : '' }}>Diterima</option>
            </select>
            @error('status_pesanan')
            <div style="color: red; font-size:13px;">{{ $message }}</div>
            @enderror
            {{-- <input value="{{ $pesanan->status_pesanan }}" type="text" name="status_pesanan" class="input-pesanan"> --}}
          </div>

          <div class="btn-pesanan-container">
            <a href="/dashboard/admin/pesanan">Kembali</a>
            <button type="submit">Perbarui</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  {{--  --}}
</div>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const daftar_paket = document.getElementById('daftar-paket');
    const harga_paket = document.getElementById('harga-paket');
    const berat_paket = document.getElementById('berat-paket');
    const total_harga = document.getElementById('total-harga');
    const promo_select = document.getElementById('promo_id');

    const hitungTotalHarga = () => {
      const berat = parseFloat(berat_paket.value) || 0;
      const harga = parseFloat(harga_paket.value) || 0;
      const selectedPromo = promo_select.options[promo_select.selectedIndex];
      const nilai_diskon = parseFloat(selectedPromo.getAttribute('nilai_diskon')) || 0;
      const tipe_diskon = selectedPromo.getAttribute('tipe_diskon');

      console.log('test harga :', harga)

      let total = berat * harga;

      if (tipe_diskon === "nominal") {
        total -= nilai_diskon; // Diskon nominal
      } else if (tipe_diskon === "persen") {
        total -= (total * nilai_diskon) / 100; // Diskon persentase
      }

      total_harga.value = total > 0 ? total.toFixed(2) : "0.00";
    };

    daftar_paket.addEventListener('change', () => {
      const selected = daftar_paket.options[daftar_paket.selectedIndex];
      harga_paket.value = selected.getAttribute('harga_paket') || 0;
      hitungTotalHarga();
    });

    berat_paket.addEventListener('input', hitungTotalHarga);
    promo_select.addEventListener('change', hitungTotalHarga);

    // Inisialisasi harga saat pertama kali
    const inisialisasiHarga = () => {
      const selected = daftar_paket.options[daftar_paket.selectedIndex];
      harga_paket.value = selected.getAttribute('harga_paket') || 0;
      hitungTotalHarga();
    };

    inisialisasiHarga();
  });
</script>
@endsection
