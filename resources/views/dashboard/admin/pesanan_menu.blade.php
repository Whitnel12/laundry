@extends('layouts.dashboard')

@section('dashboard-content')
<div class="pesanan-content">
  <div class="main-pesanan">

    <div class="pesanan-container">
      <div class="label-container-pesanan">
        <div class="label">Pesanan</div>
        <a href="/dashboard/admin/daftar-diskon">
          <i class="fa-solid fa-tag" style="font-size: 20px; color:green"></i>
        </a>

        {{-- <a href="{{  }}">Download pdf</a> --}}

        <div class="container-filter-pesanan">
          <div class="card-tools-paket">
            <form action="/dashboard/admin/cari-pesanan-pelanggan" method="GET">
              <input class="search-paket" type="search" name="search" placeholder="cari pelanggan">
               <button class="btn-cari-paket" type="submit">cari</button>
            </form>

          </div>

          <div class="container-promo">
            <a href="/dashboard/admin/input-pesanan">
              <div class="btn-tambah-pesanan">Tambah Pesanan</div>
            </a>
          </div>
        </div>

      </div>

      <div class="table-pesanan tabel-pesanan2" style="min-height: 500px">
        <table>
          <thead>
              <tr>
                  <th>Pelanggan</th>
                  <th>Pesanan</th>
                  <th>Berat</th>
                  {{-- <th>Harga</th> --}}
                  <th>Total Harga</th>
                  <th>Status</th>
                  <th>Promo</th>
                  <th>Aksi</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($pesanans as $pesanan)


              <tr>
                <td class="harga-pesanan-table table-with-content">{{ $pesanan->user->name }}</td>
                <td class="nama-pesanan-table table-with-content">{{ $pesanan->paket->nama_paket }} & {{ $pesanan->paket->jenispaket->nama_jenis }}</td>
                <td class="harga-pesanan-table table-with-content">{{ $pesanan->berat }}</td>
                {{-- <td class="harga-pesanan-table table-with-content">4000</td> --}}
                <td class="harga-pesanan-table table-with-content">Rp. {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                {{-- <td class="harga-pesanan-table table-with-content">{{ $pesanan->total_harga }}</td> --}}
                <td class="harga-pesanan-table table-with-content">{{ $pesanan->status_pesanan }}</td>

                @if(!$pesanan->promo_id)
                <td class="harga-pesanan-table table-with-content">Tidak Ada</td>
                @else
                <td class="harga-pesanan-table table-with-content">{{ $pesanan->promo->nama_promo}}</td>
                @endif
                <td>
                  <div class="table-pesanan-action">

                    {{-- <div class="pesanan-action-container">
                      <div>
                        <a href="/dashboard/admin/halaman-detail-pesanan/{{ $pesanan->id }}">
                          <i class="fa-solid fa-circle-info"></i>
                        </a>
                      </div>
                    </div> --}}

                    <div class="pesanan-action-container">
                      <div>
                        <a href="/dashboard/admin/halaman-update-pesanan/{{ $pesanan->id }}">
                          <i class="fa-solid fa-gear"></i>
                        </a>
                      </div>
                    </div>

                    <div class="pesanan-action-container">

                      <div>
                        <form action="/dashboard/admin/delete-pesanan/{{ $pesanan->id }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
                            <i class="fa-solid fa-circle-xmark"></i>
                        </button>
                        </form>
                      </div>
                    </div>

                  </div>
                </td>
              </tr>
              @endforeach


            </tbody>
        </table>
      </div>

    </div>

  </div>
</div>
@endsection
