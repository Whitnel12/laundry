@extends('layouts.pimpinan_dashboard')

@section('pimpinan_dashboard-content')
<div class="pesanan-content">
  <div class="main-pesanan">

    <div class="pesanan-container pimpinan-laporan-container">

      <form action="/dashboard/pimpinan/filter-laporan" method="GET" class="filter-pimpinan-laporan">

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

        <div class="container-filter-for-year">
          <div class="container-pimpinan-filter">
            <select name="filter" id="filter" >
              <option value="">Semua Data</option>
              <option value="day" {{ request('filter') === 'day' ? 'selected' : '' }}>Hari Ini</option>
              <option value="month" {{ request('filter') === 'month' ? 'selected' : '' }}>Bulan Ini</option>
              <option value="year" {{ request('filter') === 'year' ? 'selected' : '' }}>Tahun Ini</option>
            </select>
          </div>
          <button type="submit" value="filter"  name="action">Filter</button>
          <button type="submit" value="download_pdf" name="action">Download Pdf</button>
        </div>

      </form>

      <div class="pimpinan-income-container">
        <div class="pimpinan-income-first income-pimpinan">
          <div class="label-income">Total Penggguna</div>
          <div class="label-income">{{ $UserCount }}</div>
        </div>
        <div class="pimpinan-income-second income-pimpinan">
          <div class="label-income">Pesanan Tuntas</div>
          <div class="label-income">{{ $PesananCount }}</div>
        </div>
        <div class="pimpinan-income-second income-pimpinan">
          <div class="label-income">Total Pemasukan</div>
          {{-- <div class="label-income">{{ $IncomeValue }}</div> --}}
          <div class="label-income">Rp. {{ number_format($IncomeValue, 0, ',', '.') }}</div>
        </div>
      </div>

      <div class="table-pesanan">
        <table>
          <thead>
              <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Pemasukan</th>
                  <th>Pelanggan</th>
                  <th>Status</th>
              </tr>
          </thead>
          <tbody>

            @foreach ($pesanans as $pesanan )
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pesanan->updated_at->format('Y-m-d') }}</td>
                <td>Rp. {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                <td>{{ $pesanan->user->name }}</td>
                <td>{{ $pesanan->status_pesanan }}</td>
              </tr>
            @endforeach

          </tbody>
        </table>
      </div>

    </div>



  </div>
</div>
@endsection
