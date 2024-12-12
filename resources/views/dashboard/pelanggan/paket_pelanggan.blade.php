@extends('layouts.user_dashboard')

@section('dashboard-content')

<div class="paket-content">


    <div class="label-container-paket">
      <div class="label" style="font-size: 17px;">
        Paket Laundry
      </div>

      <div class="card-tools-paket">
        <form action="/dashboard/pelanggan/cari-paket" method="GET">
          <input class="search-paket" type="search" name="search" placeholder="cari paket">
           <button class="btn-cari-paket" type="submit">cari</button>
        </form>
      </div>
    </div>


    @foreach ($jenis_paket as $jenis)
    <div class="main-paket">

      <div class="paket-container">
        <div>{{ $jenis->nama_jenis }}</div>
        <div class="table-paket">
          <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Harga Standar</th>
                    <th>Jenis</th>
                    <th>Harga</th>
                    <th>Tipe</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($jenis->paket as $pakets)



                <tr>
                  <td class="nama-paket-table">{{ $pakets->nama_paket }}</td>
                  <td class="harga-paket-table">Rp. {{ number_format($pakets->harga_paket, 0, ',', '.') }}</td>
                  {{-- <td class="harga-paket-table">{{ $pakets->harga_paket }}</td> --}}
                  <td class="harga-paket-table">{{ $pakets->jenispaket->nama_jenis }}</td>
                  <td class="harga-paket-table">Rp. {{ number_format($pakets->total_harga_paket, 0, ',', '.') }}</td>
                  {{-- <td class="harga-paket-table">RP. {{ $pakets->total_harga_paket }}</td> --}}
                  <td class="harga-paket-table">{{ $pakets->tipe }}</td>
                </tr>

                @endforeach

              </tbody>
          </table>
        </div>

        {{-- <a href="/dashboard/admin/paket-satuan" class="paket-satuan">paket satuan >></a> --}}

      </div>
    </div>
    @endforeach
  </div>

@endsection
