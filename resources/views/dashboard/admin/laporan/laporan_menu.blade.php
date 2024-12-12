@extends('layouts.dashboard')

@section('dashboard-content')
<div class="pesanan-content">
  <div class="main-pesanan">

    <div class="pesanan-container">
      <div class="label-container-pesanan">
        <div class="label">Laporan</div>

        <div class="container-promo">

          <form action="/dashboard/admin/filter-laporan" method="GET" class="form-filter-date-laporan">


            <div class="container-pimpinan-filter">
                <div>
                <label class="pimpinan-label-filter-date" for="start_date">Dari Tanggal:</label>
                <input type="date" id="start_date" name="start_date" class="filter-date" value="{{ request('start_date') }}">
                </div>

                <div>
                <label class="pimpinan-label-filter-date" for="end_date">Sampai Tanggal:</label>
                <input type="date" id="end_date" name="end_date" class="filter-date" value="{{ request('end_date') }}">
                </div>
            </div>


            <div>


              <select name="filter" id="filter" >
                <option value="">Semua Data</option>
                <option value="day" {{ request('filter') === 'day' ? 'selected' : '' }}>Hari Ini</option>
                <option value="month" {{ request('filter') === 'month' ? 'selected' : '' }}>Bulan Ini</option>
                <option value="year" {{ request('filter') === 'year' ? 'selected' : '' }}>Tahun Ini</option>
              </select>

            </div>
            {{-- <button class="btn-tambah-pesanan" style="border: none" type="submit">Filter</button> --}}
            <button class="btn-tambah-pesanan" type="submit" name="action" value="filter" style="border: none">Filter</button>

         <!-- Tombol Download PDF -->
          <button class="btn-tambah-pesanan" type="submit" name="action" value="download_pdf" style="border: none">Download PDF</button>
          </form>

        </div>
      </div>

      <div class="table-pesanan" style="max-height: 550px;">
        <div class="table-container">
        <table>
          <thead>
              <tr>
                  <th>Pesanan</th>
                  <th>Pelanggan</th>
                  <th>Berat</th>
                  <th>Total Harga</th>
                  <th>Status</th>
                  <th>Tanggal</th>
                  {{-- <th>Aksi</th> --}}
              </tr>
          </thead>
          <tbody>

            @foreach ($pesanans as $pesanan)


              <tr>
                <td class="nama-pesanan-table table-with-content">{{ $pesanan->paket->nama_paket }} & {{ $pesanan->paket->jenispaket->nama_jenis }}</td>
                <td class="harga-pesanan-table table-with-content">{{ $pesanan->user->name }}</td>
                <td class="harga-pesanan-table table-with-content">{{ number_format($pesanan->berat, 0, ',', '.') }}</td>

                {{-- <td class="harga-pesanan-table table-with-content">{{ $pesanan->berat }}</td> --}}
                {{-- <td class="harga-pesanan-table table-with-content">4000</td> --}}
                {{-- <td class="harga-pesanan-table table-with-content">{{ $pesanan->total_harga }}</td> --}}
                <td class="harga-pesanan-table table-with-content">Rp. {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                <td class="harga-pesanan-table table-with-content">{{ $pesanan->status_pesanan }}</td>
                <td class="harga-pesanan-table table-with-content">{{ $pesanan->created_at->format('Y-m-d')}}</td>

              </tr>
              @endforeach


          </tbody>
        </table>
        </div>
      </div>

    </div>

  </div>
</div>
@endsection
