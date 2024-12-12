
@extends('layouts.dashboard')

@section('dashboard-content')
<div class="pesanan-content">
  <div class="main-pesanan">
    <div class="pesanan-container">
      <div class="label-container-pesanan">
        <div class="label">Paket</div>
      </div>
      <div class="input-pesanan-container">
        <form action="/dashboard/admin/tambah-paket" class="form-input-pesanan" method="POST">
          @csrf

          <div class="input-berat form-input-pesanan-container" >
            <label for="">Nama Paket</label>
            <input type="text" name="nama_paket" class="input-pesanan" value="{{ old('nama_paket') }}" required>
          </div>

          <div class="input-berat form-input-pesanan-container">
            <label for="">Harga standar</label>
            <input type="number" id="harga_standar" name="harga_paket" class="input-pesanan" value="{{ old('harga_paket') }}" required>
          </div>

          <div class="input-harga form-input-pesanan-container">
            <label for="">Jenis Paket</label>
            <select name="jenis_paket_id" id="jenis_paket">
              <option value="">-- Pilih Jenis --</option>
              @foreach ($jenis_pakets as $jpaket)
              <option
              value="{{ $jpaket->id }}"
              potongan-biaya={{ $jpaket->potongan_harga }}
              tambahan-biaya={{ $jpaket->biaya_tambahan }}
              >{{ $jpaket->nama_jenis }} </option>
              @endforeach
            </select>
          </div>

          <div class="input-status form-input-pesanan-container">
            <label for="">total Harga</label>
            <input type="number" id="total_harga" name="total_harga_paket" class="input-pesanan" required readonly>
          </div>

          <div class="input-status form-input-pesanan-container">
            <label for="">Tipe Paket</label>
            <select name="tipe" >
              <option value="">-- Pilih --</option>
              <option value="kiloan">Kiloan</option>
              <option value="satuan">Satuan</option>
            </select>
            @error('tipe')
            <span style="color: red; font-size:13px">{{ $message }}</span>
            @enderror
            {{-- <input type="text" name="tipe" class="input-pesanan"> --}}
          </div>

          <div class="btn-pesanan-container">
            <a href="/dashboard/admin/paket">Kembali</a>
            <button type="submit">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  {{--  --}}
</div>

<script>
// Pastikan ID sesuai dengan elemen HTML
const jenisPaketSelect = document.getElementById('jenis_paket');
const totalHargaInput = document.getElementById('total_harga');
const hargaStandarInput = document.getElementById('harga_standar');

// Tambahkan event listener untuk perubahan pada select
jenisPaketSelect.addEventListener('change', () => {
  // Dapatkan opsi yang dipilih
  const selectedOption = jenisPaketSelect.options[jenisPaketSelect.selectedIndex];

  const potongan = parseFloat(selectedOption.getAttribute('potongan-biaya')) || 0;
  const tambahan = parseFloat(selectedOption.getAttribute('tambahan-biaya')) || 0;

  const hargaStandar = parseFloat(hargaStandarInput.value) || 0;

  const hasilAkumulasi = tambahan - potongan;

  const totalHarga = hargaStandar + hasilAkumulasi;

  totalHargaInput.value = totalHarga;

  // Debug: tampilkan informasi pilihan di konsol
  console.log('Pilihan yang dipilih:', selectedOption);


});


</script>

@endsection
