@extends('layouts.dashboard')

@section('dashboard-content')
<div class="pesanan-content">
  <div class="main-pesanan">
    
    <div class="pesanan-container">
      <div class="label-container-pesanan">
        <div class="label">Daftar Diskon</div>  

        <div class="card-tools-paket">
          <form action="/dashboard/admin/cari-diskon" method="GET">
            <input class="search-paket" type="search" name="search" placeholder="cari paket">
             <button class="btn-cari-paket" type="submit">cari</button>
          </form>
          
        </div>

        <div class="container-promo">
          <a href="/dashboard/admin/pesanan">
            <i class="fa-solid fa-backward"></i>
          </a>
          <a href="/dashboard/admin/input-promo">
            <div class="btn-tambah-pesanan">Tambah Diskon</div>
          </a>
        </div>
      </div>

      <div class="table-pesanan">
        <table>
          <thead>
              <tr>
                  <th>Nama Promo</th>
                  <th>jenis promo</th>
                  <th>Nilai Promo</th>
                  <th>status</th>
                  <th>aksi</th>
              </tr>
          </thead>
          <tbody>

            @foreach ($promos as $promo)
            <tr>
              <td>{{ $promo->nama_promo }}</td>
              <td>{{ $promo->jenis_promo }}</td>
              <td>{{ $promo->nilai_promo }}</td>
              <td>{{ $promo->status }}</td>
              <td>
                <div class="table-pesanan-action">
                    
                  <div class="pesanan-action-container">
                    <div>
                      <a href="/dashboard/admin/halaman-update-promo/{{ $promo->id }}">
                        <i class="fa-solid fa-gear"></i>
                      </a>
                    </div>
                  </div>
              
                  <div class="pesanan-action-container">
                    
                    <div>
                      <form action="/dashboard/admin/delete-promo/{{ $promo->id }}" method="POST">
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