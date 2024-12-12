@extends('layouts.dashboard')

@section('dashboard-content')
<div class="pesanan-content">
  <div class="main-pesanan">

    <div class="pesanan-container">
      <div class="label-container-pesanan">
        <div class="label">Jenis Paket</div>
        <div style="display: flex; gap:20px;">

          <form action="/dashboard/admin/cari-jenis-paket" method="GET">
            <input class="search-paket" type="search" name="search" placeholder="cari jenis">
             <button class="btn-cari-paket" type="submit">cari</button>
          </form>
          <a href="/dashboard/admin/input-jenis-paket">
            <div class="btn-tambah-pesanan">Tambah Jenis Paket</div>
          </a>
          <a href="/dashboard/admin/download-jenis-paket-pdf">
            <div class="btn-tambah-pesanan">Cetak</div>
          </a>
        </div>
      </div>

      <div class="table-paket" style="max-height: 450px;">
        <table>
          <thead>
              <tr>
                  <th>Paket</th>
                  <th>Pengerjaan</th>
                  <th>Potongan</th>
                  <th>Tambahan</th>
                  <th>Aksi</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($jenis_pakets as $paket)


              <tr>
                <td class="harga-pesanan-table table-with-content">{{ $paket->nama_jenis }}</td>
                <td class="harga-pesanan-table table-with-content">{{ $paket->waktu_pengerjaan }}</td>
                <td class="harga-pesanan-table table-with-content">{{ $paket->potongan_harga }}</td>
                <td class="harga-pesanan-table table-with-content">{{ $paket->biaya_tambahan }}</td>
                <td>
                  <div class="table-pesanan-action">

                    <div class="pesanan-action-container">
                      <div>
                        <a href="/dashboard/admin/halaman-update-jenis-paket/{{ $paket->id }}">
                          <i class="fa-solid fa-gear"></i>
                        </a>
                      </div>
                    </div>

                    <div class="pesanan-action-container">

                      <div>
                        <form action="/dashboard/admin/delete-jenis-paket/{{ $paket->id }}" method="POST">
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
