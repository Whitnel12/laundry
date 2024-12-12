@extends('layouts.dashboard')

@section('dashboard-content')
<div class="pesanan-content">
  <div class="main-pesanan">
    <div class="pesanan-container">
      <div class="label-container-pesanan">
        <div class="label">Pesanan</div>
      </div>
      <div class="input-pesanan-container">
        <form action="/dashboard/admin/tambah-pesanan" class="form-input-pesanan" method="POST">
          @csrf
          {{-- <div class="input-nama-pelanggan form-input-pesanan-container">
            <label for="">Pelanggan</label>
            <input type="text" name="pelanggan" class="input-pesanan">
          </div> --}}
          <div class="input-nama-pelanggan form-input-pesanan-container">
            <label for="">Pelanggan</label>
            <select name="pelanggan" id="">
              <option value="">-- Pilih Pelanggan</option>
              @foreach ($pelanggans as $pelanggan)
              <option value="{{ $pelanggan->id }}">{{ $pelanggan->name }}</option>
              @endforeach
            </select>

            @error('pelanggan')
            <div style="color: red; font-size:13px;">{{ $message }}</div>
            @enderror

          </div>

          {{-- <div>
            <label for="">pilih Paket</label>
            <div>
              kiloan
            </div>
          </div> --}}


          <div class="input-nama-pesanan form-input-pesanan-container">
            <label for="">Pesanan</label>
            <select name="pesanan" id="daftar-paket">
              <option value="">-- Pilih Paket--</option>
              @foreach ($pakets as $paket)
              <option value="{{ $paket->id }}" harga_paket="{{ $paket->total_harga_paket }}">{{ $paket->nama_paket }} & {{ $paket->jenispaket->nama_jenis }}</option>
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
            <label for="">satuan/kiloan</label>
            <input type="number" id="berat-paket" name="berat" class="input-pesanan" required>

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
              >{{ $promo->nama_promo }}</option>
              @endforeach
            </select>

            @error('promo_id')
            <div style="color: red; font-size:13px;">{{ $message }}</div>
            @enderror
          </div>

          <div class="input-harga form-input-pesanan-container">
            <label for="">Total Harga</label>
            <input type="text" id="total-harga" name="total_harga" class="input-pesanan" readonly>

            @error('total_harga')
            <div style="color: red; font-size:13px;">{{ $message }}</div>
            @enderror
          </div>

          <div class="input-status form-input-pesanan-container">
            <label for="">status</label>
            <select name="status_pesanan" id="">
              <option value="ANTRIAN">Antrian</option>
              <option value="PROSES">Proses</option>
              <option value="SELESAI">Selesai</option>
              <option value="DITERIMA">Diterima</option>
            </select>

            @error('status_pesanan')
            <div style="color: red; font-size:13px;">{{ $message }}</div>
            @enderror
          </div>

          <div class="btn-pesanan-container">
            <a href="/dashboard/admin/pesanan">Kembali</a>
            <button type="submit">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  {{--  --}}
</div>

<script>
  const daftar_paket = document.getElementById('daftar-paket');
  const harga_paket = document.getElementById('harga-paket');
  const berat_paket = document.getElementById('berat-paket');
  const total_harga = document.getElementById('total-harga');
  const diskon_select = document.getElementById('promo_id');

  daftar_paket.addEventListener('change', () => {
    const daftar_pilihan = daftar_paket.options[daftar_paket.selectedIndex];
    const harga = daftar_pilihan.getAttribute('harga_paket');

    harga_paket.value = harga ? harga : "";

    hitungTotalHarga();
  })

  berat_paket.addEventListener('input', ()=> {
    hitungTotalHarga()
  })

  diskon_select.addEventListener('change', ()=> {
    hitungTotalHarga()
  })

  const hitungTotalHarga = () => {
    const berat = parseFloat(berat_paket.value);
    const harga = parseFloat(harga_paket.value);
    const selectedPromo = diskon_select.options[diskon_select.selectedIndex];
    const nilai_promo = parseFloat(selectedPromo.getAttribute('nilai_diskon'));
    const tipe_diskon = selectedPromo.getAttribute('tipe_diskon'); // tipe: 'nominal' atau 'persen'

    let total = 0;

    // Hitung total awal tanpa diskon
    if (!isNaN(berat) && !isNaN(harga)) {
      total = harga * berat;
    }

    // Terapkan diskon

    if (!isNaN(nilai_promo)) {
      if (tipe_diskon === "nominal") {
        total -= nilai_promo; // Kurangi nominal diskon
      } else if (tipe_diskon === "persen") {
        total -= (total * nilai_promo) / 100; // Kurangi diskon persentase
      }
    }else if(nilai_promo == 0) {
      total -= 0;
    }

    // Pastikan total harga tidak negatif
    total_harga.value = total > 0 ? total.toFixed(2) : "0.00";
  }
</script>
@endsection
