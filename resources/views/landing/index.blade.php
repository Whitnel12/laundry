@extends('layouts.landing-page')

@section('landing-content')
  <div class="main">
    <div class="navbar">
      <div class="item-nav nav-logo">LaundRy</div>
      <div class="item-nav nav-component">
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#layanan">Layanan</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </div>

      <div class="item-nav nav-login">
        <a href="/login">
        <div>
          Login
        </div>
      </a>
        </div>
    </div>

    <div class="main-item">
      <section id="home">
        <div class="bg-home">
          <div class="title-bg-container">
            <div class="first-title-bg">Laundry Praktis, Hidup Jadi Fantastis!</div>
            <div class="second-title-bg">Nikmati Kesegaran <br> Pakaian Seperti Baru!</div>
            <div class="btn-bg-container">
              <a href="/login">Laundry Sekarang</a>
            </div>
          </div>
        </div>
      </section>

      <section id="layanan">
        <div class="service-desk">
          <div>layanan Kami</div>
          <p>Kami Menyediakan layanan agar pakaian anda tetap nyaman dan wangi setiap saat</p>
        </div>
        <div class="container-service">
          <div class="service">
            <div class="container-img-service">
              <img width="25" height="25" src="https://img.icons8.com/pulsar-line/48/iron.png" alt="iron" />            </div>
            <div class="label-service">Bersih & Rapi</div>
            <div class="teks-service">
                Kami percaya bahwa pakaian yang sempurna berawal dari kebersihan menyeluruh dan perhatian terhadap kerapian setiap detailnya.
            </div>
          </div>
          <div class="service">
            <div class="container-img-service">
              <img width="25" height="25" src="https://img.icons8.com/pulsar-line/48/iron.png" alt="iron" />            </div>
            <div class="label-service">Cepat & Wangi</div>
            <div class="teks-service">
                Kami memahami waktu Anda berharga. Dengan layanan cepat, pakaian Anda tidak hanya bersih, tapi juga wangi memikat.
            </div>
          </div>
          <div class="service">
            <div class="container-img-service">
              <img width="25" height="25" src="https://img.icons8.com/pulsar-line/48/iron.png" alt="iron" />            </div>
            <div class="label-service">Nyaman & Terawat</div>
            <div class="teks-service">
                Dengan perawatan terbaik, pakaian Anda tetap awet, lembut, dan nyaman dipakai kapan saja.
            </div>
          </div>
        </div>
        <div class="main-priority">

          <div class="prioriy-service-container">
            <div class="priority-service">
              <div class="title-priority">Kebahagiaan pelanggan adalah prioritas kami</div>
              <div>
                Kebahagiaan pelanggan adalah prioritas kami.
Kami memastikan setiap pakaian Anda mendapatkan perawatan terbaik, dari kebersihan hingga keharuman. Layanan kami dirancang untuk memenuhi kebutuhan Anda dengan hasil yang memuaskan. Dengan dukungan tim profesional dan teknologi modern, kami siap memberikan pengalaman terbaik untuk Anda.
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="about">
        <div class="main-about">
          <div class="container-about">
            <div class="title-about">
              <div class="about">ABOUT US</div>
            </div>
            <div class="desk-about">
              <div class="desk-about-title-container">
                <div>Kami adalah penyedia layanan laundry terpercaya yang berkomitmen untuk memberikan kualitas terbaik. Dengan layanan yang cepat, bersih, dan wangi, kami hadir untuk memenuhi kebutuhan Anda akan pakaian yang nyaman dan terawat setiap saat.</div>
              </div>
              <div class="desk-about-teks-container">
                <div class="first-content">
                  <div> Kami percaya bahwa perhatian pada setiap detail adalah kunci kepuasan pelanggan.</div>
                </div>
                <div class="second-content">
                  <div> Dengan tim profesional dan teknologi modern, kami terus berinovasi untuk memberikan pengalaman terbaik.</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <footer id="contact">
        <div class="main-footer-container">
          <div class="footer-label-container">
            <div class="item-nav nav-logo">LaundRyKhu</div>
            <div class="item-nav nav-component">
              <ul class="nav-container-ul">
                <li><a href="">Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Layanan</a></li>
                <li><a href="">Contact</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="footer-copyright-container">
          <div>
            @2024 Untilted Ui. All Right reserved
          </div>
        </div>
      </footer>


    </div>

  </div>



@endsection
