@extends('layouts.user_dashboard')

@php
$idUserLogin = auth()->id();
$lastDatas = $pesanans->where('user_id',$idUserLogin);

// dd($lastDatas);
@endphp

@section('dashboard-content')
<div class="pesanan-content">
  <div class="main-pesanan">
    
    <div class="pesanan-container">
      <div class="label-container-pesanan">
        <div class="label">Riwayat Pesanan</div>  
      </div>

      <div class="table-pesanan">
        <table>
          <thead>
            <tr>
              <th>No</th>
              <th>Pesanan</th>
              <th>Tipe</th>
              <th>kiloan/jumlah</th>
              <th>Status</th>
              <th>Total Harga</th>
              {{-- <th>Aksi</th> --}}
            </tr>
          </thead>
          <tbody>

            @foreach ($lastDatas as $pesanan)
            <tr>
              <td>{{ $loop->iteration }}.</td>
              <td>{{ $pesanan->paket->nama_paket }} & {{ $pesanan->paket->jenispaket->nama_jenis }}</td>
              <td>{{ $pesanan->paket->tipe }}</td>
              <td>{{ number_format($pesanan->berat, 0, ',', '.') }}</td>
              {{-- <td>{{ $pesanan->berat }}</td> --}}
              <td>
                @switch($pesanan->status_pesanan)
                  {{-- @case('ANTRIAN')
                    <div class="status-pesanan-pelanggan antrian">
                      {{ $pesanan->status_pesanan }}
                    </div>
                    @break
                  @case('PROSES')
                    <div class="status-pesanan-pelanggan proses">
                      {{ $pesanan->status_pesanan }}
                    </div>
                    @break
                  @case('SELESAI')
                    <div class="status-pesanan-pelanggan selesai">
                      {{ $pesanan->status_pesanan }}
                    </div>
                    @break --}}
                  @case('DITERIMA')
                    <div class="status-pesanan-pelanggan diterima">
                      {{ $pesanan->status_pesanan }}
                    </div>
                    @break
                @endswitch
              </td>
              {{-- <td>{{ $pesanan->total_harga }}</td> --}}
              <td>Rp. {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
              {{-- <td>
                <div class="table-pesanan-action">
                    
                  <div class="pesanan-action-container">
                    <div>
                      <a href="/dashboard/admin/halaman-update-pesanan/{{ $pesanan->id }}">
                        <i class="fa-solid fa-gear"></i>
                      </a>
                    </div>
                  </div> 
              
                  <div class="pesanan-action-container">
                    
                    <div>
                      <form action="/dashboard/pelanggan/delete-pesanan/{{ $pesanan->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
                          <i class="fa-solid fa-circle-xmark"></i>
                      </button>
                      </form>
                    </div>
                  </div>

                </div>
              </td> --}}
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    
    </div>
  
  </div>
</div>
@endsection