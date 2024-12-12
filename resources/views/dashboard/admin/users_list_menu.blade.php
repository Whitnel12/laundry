@extends('layouts.dashboard')

@section('dashboard-content')

<div class="users-list-content">
  <div class="main-users-list">
    
    <div class="users-list-container">
      <div class="label-container-users-list">
        <a href="/dashboard/admin/users">
          <div class="btn-kembali">Kembali</div>
        </a>
        <div class="label">Daftar Pengguna</div>  
      </div>

      <div class="table-users-list">
        <table>
          <thead>
              <tr>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Role Pengguna</th>
                  {{-- <th>Aksi</th> --}}
              </tr>
          </thead>
          <tbody>

            @foreach ($getAllUser as $user)
        
              <tr>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>

                  @if ($user->role == 'admin')
                  <td class="table-role-user">
                    <div class="user-role-name admin">{{ $user->role }}</div>
                  </td>   
                  @elseif ($user->role == 'pelanggan')
                  <td class="table-role-user">
                    <div class="user-role-name pelanggan">{{ $user->role }}</div>
                  </td>
                  @else
                  <td class="table-role-user">
                    <div class="user-role-name pimpinan">{{ $user->role }}</div>
                  </td>
                  @endif

                  {{-- <td>
                    <div class="table-user-action">
                      <div>
                        <i class="fa-solid fa-circle-xmark"></i>
                      </div>
                      <div>Hapus Pengguna</div>
                    </div>
                  </td> --}}
              </tr>

              @endforeach

              
              {{-- <tr>
                  <td>Budi</td>
                  <td>www.example@gmail.com</td>
                  <td class="table-role-user">
                    <div class="user-role-name pimpinan">Pimpinan</div>
                  </td>
                  <td>
                    <div class="table-user-action">
                      <div>
                        <i class="fa-solid fa-circle-xmark"></i>
                      </div>
                      <div>Hapus Pengguna</div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Citra</td>
                  <td>www.example@gmail.com</td>
                  <td class="table-role-user">
                    <div class="user-role-name pelanggan">Pelanggan</div>
                  </td>
                  <td>
                    <div class="table-user-action">
                      <div>
                        <i class="fa-solid fa-circle-xmark"></i>
                      </div>
                      <div>Hapus Pengguna</div>
                    </div>
                  </td>
              </tr> --}}
            </tbody>
        </table>
      </div>
    
    </div>
  
  </div>
</div>
@endsection