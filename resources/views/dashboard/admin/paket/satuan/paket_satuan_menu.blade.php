@extends('layouts.dashboard')

@section('dashboard-content')
<div class="paket-content">
  <div class="main-paket">

    
    <div class="paket-container">
      <div class="label-container-paket">
        <div class="label">
          Paket Satuan
        </div>   
        
        <a href="/dashboard/admin/input-paket">
          <div class="btn-tambah-paket">Tambah Paket</div>
        </a>
      </div>

      <div class="table-paket">
        <table>
          <thead>
              <tr>
                  <th>Nama</th>
                  <th>Harga</th>
                  <th>Aksi</th>
              </tr>
          </thead>
          <tbody>
            
             
          </tbody>
        </table>
      </div>

      <a href="/dashboard/admin/paket" class="paket-satuan"> << paket kiloan</a>
    
    </div>
  
  </div>
</div>
@endsection