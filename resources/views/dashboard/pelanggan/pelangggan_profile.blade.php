@extends('layouts.user_dashboard')

@section('dashboard-content')

<div class="admin-main-profile-container">
  <div class="admin-main-profile-main">
    <div class="label-profile">Profile</div>
    <div class="main-profile">
      
      <form action="/dashboard/admin/add-profile" method="POST" enctype="multipart/form-data">
        @csrf
       

        <div class="container-info-profile">
          <div class="image-container-info-profile">
            <div class="image-profile-container">
              <img class="image-profile" src="{{ asset(auth()->user()->photo) }}" alt="">
            </div>
            <div class="container-upload-gambar">
              <input type="file" name="photo" id="photo">
            </div>
          </div>
          <div class="form-container-info-profile">
            
            <div class="label-form-profile">
              <label>Name</label>
              <input type="text" value="{{ auth()->user()->name }}" name="name" readonly>
            </div>
            <div class="label-form-profile">
              <label>Alamat</label>
              <input type="text" value="{{ auth()->user()->address }}" name="address">
            </div>
            <div class="label-form-profile">
              <label>Nomor Hp</label>
              <input type="text" value="{{ auth()->user()->phone }}" name="phone">
            </div>
            <div class="label-form-profile">
              <label>Gender</label>
              <select name="gender" id="">
                <option value="">--Pilih Jenis Kelamin--</option>
                <option value="pria" {{ auth()->user()->gender === 'pria' ? 'selected' : '' }}>Pria</option>
                <option value="wanita" {{ auth()->user()->gender === 'wanita' ? 'selected' : '' }}>Wanita</option>
              </select>
             
            </div>

            <div class="btn-container">
              <button type="submit" class="btn-ubah-profile">Edit</button>
            </div>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>

@endsection