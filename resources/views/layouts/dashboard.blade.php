<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
  <title>Document</title>
</head>
<body>
  <section class="dashboard">
    <div class="main-dashboard">
      <div class="item-dashboard">
        <div class="dashboard-label">
          LaundryKu
        </div>
        <div class="dashboard-item">
          <a href="/dashboard/admin/users" class="{{ Request::is('dashboard/admin/users') || Request::is('dashboard/admin/list-users') ? 'active' : 'nonactive' }}">
            <div class="users-dashboard {{ Request::is('dashboard/admin/users','dashboard/admin/list-users') ? 'active' : '' }}">
                <i class="fa-solid fa-users"></i>
            </div>
            <div class="dash-label">
                INFORMASI
            </div>
          </a>

          <a href="/dashboard/admin/jenis-paket" class="{{ Request::is('dashboard/admin/jenis-paket') || Request::is('dashboard/admin/input-jenis-paket') || Request::is('dashboard/admin/halaman-update-jenis-paket*')  ? 'active' : 'nonactive' }}">
            <div class="users-dashboard {{ Request::is('dashboard/admin/jenis-paket','dashboard/admin/input-jenis-paket','dashboard/admin/halaman-update-jenis-paket*') ? 'active' : '' }}">
                <i class="fa-solid fa-clipboard-list"></i>
            </div>
            <div class="dash-label">
                JENIS PAKET
            </div>
          </a>

          <a href="/dashboard/admin/paket" class="{{ Request::is('dashboard/admin/paket') || Request::is('dashboard/admin/input-paket') || Request::is('dashboard/admin/halaman-update-paket*') ? 'active' : 'nonactive' }}">
            <div class="users-dashboard {{ Request::is('dashboard/admin/paket','dashboard/admin/input-paket','dashboard/admin/halaman-update-paket*') ? 'active' : '' }}">
                <i class="fa-solid fa-box"></i>
            </div>
            <div class="dash-label">
                PAKET
            </div>
          </a>

          <a href="/dashboard/admin/pesanan" class="{{ Request::is('dashboard/admin/pesanan') || Request::is('dashboard/admin/daftar-diskon') || Request::is('dashboard/admin/input-pesanan') || Request::is('dashboard/admin/halaman-update-pesanan*') || Request::is('dashboard/admin/input-promo*') || Request::is('dashboard/admin/halaman-update-promo*') ? 'active' : 'nonactive' }}" >
            <div class="users-dashboard {{ Request::is('dashboard/admin/pesanan','dashboard/admin/daftar-diskon','dashboard/admin/input-pesanan','dashboard/admin/halaman-update-pesanan*','dashboard/admin/input-promo*','dashboard/admin/halaman-update-promo*') ? 'active' : '' }}">
                <i class="fa-solid fa-basket-shopping"></i>
            </div>
            <div class="dash-label">
                PESANAN
            </div>
          </a>
          <a href="/dashboard/admin/laporan"
          class="{{ Request::url() === url('/dashboard/admin/laporan') || Request::is('dashboard/admin/laporan*') ? 'active' : 'nonactive' }}">
           <div class="users-dashboard {{ Request::url() === url('/dashboard/admin/laporan') || Request::is('dashboard/admin/laporan*') ? 'active' : '' }}">
               <i class="fa-solid fa-paste"></i>
           </div>
           <div class="dash-label">
               LAPORAN
           </div>
       </a>

{{--
          <a href="/dashboard/admin/paket" class="{{ Request::is('dashboard/admin/paket') ? 'active' : '' }}">
            <div class="pack-dashboard">
              <i class="fa-solid fa-box""></i>
            </div>
          </a> --}}
          {{-- <a href="/dashboard/admin/pesanan" class="{{ Request::is('dashboard/admin/pesanan') ? 'active' : '' }}">
            <div class="shop-dashboard">
              <i class="fa-solid fa-basket-shopping"></i>
            </div>
          </a> --}}
          {{-- <a href="/dashboard/admin/laporan" class="{{ Request::is('dashboard/admin/laporan') ? 'active' : '' }}">
            <div class="information-dashboard">
              <i class="fa-solid fa-bars"></i>
            </div>
          </a> --}}

          {{-- <a href="/dashboard/pelanggan/pesanan">
            <div class="information-dashboard">
              <i class="fa-solid fa-bars"></i>
            </div>
          </a> --}}
        </div>
     </div>

     <div class="information-dashboard">
        <a href="/dashboard/admin/profile">
          <div class="dashboard-info-user">
            <div class="user-dashboard" style="">
              @if (Auth::user()->photo == null)
                <i class="fa-regular fa-user" class="user-icon-akun"></i>
              @else
                <img src="{{ asset(Auth::user()->photo) }}" alt="User Photo" style="height: 100%; width: 100%; object-fit: cover;">
              @endif
            </div>
            <p>{{ Auth::user()->name }}</p>
          </div>
        </a>

        <a href="/logout">
          <div class="dashboard-logout">
            <div><i class="fa-solid fa-power-off" style="font-size: 13px"></i></div>
            <div>Logout</div>
          </div>
        </a>
     </div>

    </div>
    @yield('dashboard-content')

  </section>
  <script src="https://kit.fontawesome.com/9e2c156ec2.js" crossorigin="anonymous"></script>

</body>
</html>
