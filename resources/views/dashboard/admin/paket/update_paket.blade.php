
@extends('layouts.dashboard')

@section('dashboard-content')
<div class="pesanan-content">
  <div class="main-pesanan">
    <div class="pesanan-container">
      <div class="label-container-pesanan">
        <div class="label">Paket</div>
      </div>
      <div class="input-pesanan-container">
        <form action="/dashboard/admin/update-paket/{{ $paket->id }}" class="form-input-pesanan" method="POST">
          @csrf
          @method('PUT')

          <div class="input-berat form-input-pesanan-container" >
            <label for="">Nama Paket</label>
            <input type="text" value="{{ $paket->nama_paket }}" name="nama_paket" class="input-pesanan" required>
          </div>

          <div class="input-berat form-input-pesanan-container">
            <label for="">Harga standar</label>
            <input type="number" id="harga_standar" value="{{ $paket->harga_paket }}" name="harga_paket" class="input-pesanan" required>
          </div>

          <div class="input-harga form-input-pesanan-container">
            <label for="">Jenis Paket</label>
            <select name="jenis_paket_id" id="jenis_paket">
              <option value="" disabled selected>-- Pilih Jenis --</option>
              @foreach ($jenis_pakets as $jenis)
                  <option
                      value="{{ $jenis->id }}"
                      data-potongan="{{ $jenis->potongan_harga }}"
                      data-tambahan="{{ $jenis->biaya_tambahan }}"
                      {{ $paket->jenis_paket_id == $jenis->id ? 'selected' : '' }}>
                      {{ $jenis->nama_jenis }}
                  </option>
              @endforeach
          </select>

            {{-- <input type="text" value="{{ $paket->jenispaket->nama_jenis }}" name="jenis_paket_id" class="input-pesanan"> --}}
          </div>

          <div class="input-status form-input-pesanan-container">
            <label for="">total Harga</label>
            <input type="number" id="total_harga" value="{{ $paket->total_harga_paket }}" name="total_harga_paket" class="input-pesanan" required readonly>
          </div>

          <div class="input-status form-input-pesanan-container">
            <label for="">Tipe Paket</label>
            <select name="tipe" >
              <option value="">-- Pilih --</option>
              <option value="kiloan" {{ $paket->tipe == 'kiloan' ? 'selected' : '' }}>Kiloan</option>
              <option value="satuan" {{ $paket->tipe == 'satuan' ? 'selected' : '' }}>Satuan</option>
            </select>
            @error('tipe')
            <span style="color: red; font-size:13px">{{ $message }}</span>
            @enderror
          </div>

          <div class="btn-pesanan-container">
            <a href="/dashboard/admin/paket">Kembali</a>
            <button type="submit">Perbarui</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
const jenisPaketSelect = document.getElementById('jenis_paket');
const totalHargaInput = document.getElementById('total_harga');
const hargaStandarInput = document.getElementById('harga_standar');

// Fungsi untuk menghitung total harga
function updateTotalHarga() {
  const selectedOption = jenisPaketSelect.options[jenisPaketSelect.selectedIndex];

  // Ambil nilai potongan dan tambahan dari dataset
  const potongan = parseFloat(selectedOption.dataset.potongan) || 0;
  const tambahan = parseFloat(selectedOption.dataset.tambahan) || 0;

  // Ambil harga standar
  const hargaStandar = parseFloat(hargaStandarInput.value) || 0;

  // Hitung total harga
  const totalHarga = hargaStandar + tambahan - potongan;

  // Update total harga ke input
  totalHargaInput.value = totalHarga;

  // Debug: tampilkan informasi di konsol
  console.log('Harga Standar:', hargaStandar, 'Potongan:', potongan, 'Tambahan:', tambahan, 'Total Harga:', totalHarga);
}

// Event listener untuk perubahan pada dropdown jenis paket
jenisPaketSelect.addEventListener('change', updateTotalHarga);

// Event listener untuk perubahan pada input harga standar
hargaStandarInput.addEventListener('input', updateTotalHarga);

</script>


@endsection
