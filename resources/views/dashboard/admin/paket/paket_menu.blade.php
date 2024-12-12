@extends('layouts.dashboard')

@section('dashboard-content')

{{-- {{ $jenis_paket }} --}}
<div class="paket-content">


  <div class="label-container-paket">
    <div class="label" style="font-size: 17px;">
      Paket Laundry
    </div>

    <div class="card-tools-paket">
      <form action="/dashboard/admin/cari-paket" method="GET">
        <input class="search-paket" type="search" name="search" placeholder="cari paket">
         <button class="btn-cari-paket" type="submit">cari</button>
      </form>

      <a href="/dashboard/admin/input-paket">
        <div class="btn-tambah-paket">Tambah Paket</div>
      </a>
      <a href="/dashboard/admin/download-paket-pdf">
        <div class="btn-tambah-paket">Cetak</div>
      </a>
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
                  <th>Aksi</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($jenis->paket as $pakets)



              <tr>
                <td class="nama-paket-table">{{ $pakets->nama_paket }}</td>
                <td class="harga-paket-table">Rp. {{ number_format($pakets->harga_paket, 0, ',', '.') }}</td>
                {{-- <td class="harga-paket-table">{{ $pakets->harga_paket }}</td> --}}
                <td class="harga-paket-table">{{ $pakets->jenispaket->nama_jenis }}</td>
                {{-- <td class="harga-paket-table">{{ $pakets->total_harga_paket }}</td> --}}
                <td class="harga-paket-table">Rp. {{ number_format($pakets->total_harga_paket, 0, ',', '.') }}</td>

                <td class="harga-paket-table">{{ $pakets->tipe }}</td>
                <td>
                  <div class="table-paket-action">

                    {{-- <a href="" class="link-edit-paket"> --}}
                      <div class="paket-action-container">
                        <a href="/dashboard/admin/halaman-update-paket/{{ $pakets->id }}" class="link-edit-paket">
                          <div>
                            <i class="fa-solid fa-gear"></i>
                          </div>

                        </a>
                      </div>
                    {{-- </a> --}}

                    <div class="paket-action-container">
                      <form action="/dashboard/admin/delete-paket/{{ $pakets->id }}" class="form-action-paket-delete" method="POST">
                        @csrf
                        @method('DELETE')
                        {{-- <div>
                          <i class="fa-solid fa-circle-xmark"></i>
                        </div> --}}
                        <button type="submit" class="btn-hapus-paket" style="background: none; border: none; padding: 0; cursor: pointer;">
                          <i class="fa-solid fa-circle-xmark"></i>
                        </button>
                        {{-- <div>Hapus Paket</div> --}}
                      </form>
                    </div>

                  </div>
                </td>
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
