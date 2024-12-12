@extends('layouts.pimpinan_dashboard')

@section('pimpinan_dashboard-content')
<div class="pesanan-content pimpinan-saran-content">
  <div class="main-pesanan main-saran-masukan-pimpinan">
    
    <div class="pesanan-container pimpinan-laporan-container">
      <div class="label-container-pesanan">
        <div class="label">Saran dan Masukan</div>  
      </div>

      @foreach ($pesans as $pesan)
      <div class="pesan-saran-masukan-container">
        <div class="container-label-date">
          <div class="container-label-saran">

            @if ($pesan->jenis == 'masukan')
            <label class="masukan-label">{{ $pesan->jenis }}</label>
            @else
            <label class="saran-label">{{ $pesan->jenis }}</label>
            @endif
            <div class="tanggal-masukan">{{ $pesan->created_at }}</div>
            
          </div>
          <div class="container-delete-pesan">
            <form action="/dashboard/pimpinan/saran-masukan/delete/{{ $pesan->id }}" method="POST">
              @csrf
              @method('DELETE')
              <button  style="border: none">
                <i class="fa-solid fa-circle-xmark" style="color: red; cursor: pointer;"></i>
              </button>
            </form>
          </div>

        </div>
        <p>{{ $pesan->isi }}</p>
      </div>
      @endforeach

    </div>


  
  </div>
</div>
@endsection