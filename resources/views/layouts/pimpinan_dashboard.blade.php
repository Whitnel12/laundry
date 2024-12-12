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

            <a href="/dashboard/pimpinan/laporan" class="{{ Request::is('dashboard/pimpinan/laporan') ? 'active' : 'nonactive' }}">
                <div class="users-dashboard {{ Request::is('dashboard/pimpinan/laporan') ? 'active' : '' }}">
                    <i class="fa-solid fa-rectangle-list"></i>
                </div>
                <div class="dash-label">
                    LAPORAN
                </div>
            </a>
            <a href="/dashboard/pimpinan/saran-masukan" class="{{ Request::is('dashboard/pimpinan/saran-masukan') ? 'active' : 'nonactive' }}">
                <div class="users-dashboard {{ Request::is('dashboard/pimpinan/saran-masukan') ? 'active' : '' }}">
                    <i class="fa-regular fa-message"></i>
                </div>
                <div class="dash-label">
                    LAPORAN
                </div>
            </a>

          {{-- <a href="/dashboard/pimpinan/laporan">
            <div class="information-dashboard">
              <i class="fa-solid fa-rectangle-list"></i>
            </div>
          </a>

          <a href="/dashboard/pimpinan/saran-masukan">
            <div class="information-dashboard">
              <i class="fa-regular fa-message"></i>
            </div>
          </a> --}}

        </div>
      </div>

      <div class="information-dashboard">
        <a href="/dashboard/pimpinan/profile">
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
    @yield('pimpinan_dashboard-content')

  </section>
  <script src="https://kit.fontawesome.com/9e2c156ec2.js" crossorigin="anonymous"></script>

</body>
</html>
