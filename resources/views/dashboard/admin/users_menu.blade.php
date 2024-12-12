@extends('layouts.dashboard')

@section('dashboard-content')

  <div class="users-content">
    <div class="main-users">
      <div class="users-sign">
        <div class="count-user">
          <a href="/dashboard/admin/list-users">
            <i class="fa-solid fa-user-group" style="color: blue; font-size:20px;"></i>
            <div class='users'>{{ $users }}</div>
          </a>
        </div>
        <div class="text">
          <div class="label-text">Selamat Datang Kembali</div>
          <p class="text-description">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facere, voluptates. Non alias, eius repellat iusto ullam magni pariatur minus nemo voluptatem tempore, voluptates aliquid officiis autem corporis ab laborum sint.</p>
        </div>
      </div>
      <div class="users-info">
        <div class="info-item">
          <div class="icon-container-user">
            <i class="fa-regular fa-clock" style="font-size: 20px; color:red;"></i>
            <div>Antrian</div>
          </div>
          <div class="number-user">
            {{ $pesanan_antrian }}
          </div>
        </div>

        <div class="info-item">
          <div class="icon-container-user">
            <i class="fa-solid fa-hourglass-half" style="font-size: 20px; color:rgb(157, 157, 0);"></i>
            <div>Proses</div>
          </div>
          <div class="number-user">
            {{ $pesanan_proses }}
          </div>
        </div>

        <div class="info-item">
          <div class="icon-container-user">
            <i class="fa-regular fa-circle-check" style="font-size: 20px; color:blue;"></i>
            <div>Selesai</div>
          </div>
          <div class="number-user">
            {{ $pesanan_selesai }}
          </div>
        </div>

        <div class="info-item">
          <div class="icon-container-user">
            <i class="fa-solid fa-hand-holding-dollar" style="font-size: 20px; color:green;"></i>
            <div>Diterima</div>
          </div>
          <div class="number-user">
            {{ $pesanan_diterima }}
          </div>
        </div>
       
      </div>
    </div>
  </div>
@endsection


