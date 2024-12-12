@extends('layouts.dashboard')

@section('dashboard-content')
<div class="pesanan-content">
  <div class="main-pesanan">

    <div class="pesanan-container">
      <div class="label-container-pesanan">
        <div class="label">Pesanan</div>

        <div class="container-filter-pesanan">


          <div class="container-promo">
            <a href="/dashboard/admin/halaman-detail-pesanan/pdf-generator/{{ $pesanan->id }}">
              <div class="btn-tambah-pesanan">Download Pdf</div>
            </a>
          </div>
        </div>

      </div>

      <div>Nama Pelanggan : {{ $pesanan->user->name }}</div>
      <div>Tgl Pesanan : Makassar</div>
      <div>Diskon : {{ $pesanan->promo->nama_promo }}</div>
      <div>Alamat Laundry : Makassar</div>
      <div class="table-pesanan" style="height: 10%">
        <table>
          <thead>
              <tr>
                  <th>Pesanan</th>
                  <th>Paket</th>
                  <th>harga</th>
                  <th>Berat</th>
                  <th>Total Harga</th>
              </tr>
          </thead>
          <tbody>

            {{-- <tr>
              <td>{{ $pesanan->paket->nama_paket }}</td>
              <td>{{ $pesanan->paket->jenispaket->nama_jenis }}</td>
              <td>{{ number_format($pesanan->paket->total_harga_paket, 0, ',', '.') }}</td>
              <td>{{ number_format($pesanan->berat, 0, ',', '.') }}</td>
              <td>{{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
            </tr> --}}

            <tr>
                <td>{{ $pesanan->paket->nama_paket }}</td>
                <td>{{ $pesanan->paket->jenispaket->nama_jenis }}</td>
                <td>{{ number_format($pesanan->paket->total_harga_paket, 0, ',', '.') }}</td>
                <td>{{ number_format($pesanan->berat, 2, ',', '.') }}</td> <!-- Berat menggunakan 2 desimal -->
                <td>{{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
            </tr>


          </tbody>
        </table>
      </div>

    </div>

  </div>
</div>
@endsection
