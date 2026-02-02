<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>CERDIK | DINAS PENDIDIKAN</title>

  <!-- Favicons -->
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
  <link href="{{ asset('frontend/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS -->
  <link href="{{ asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/vendor/aos/aos.css') }}" rel="stylesheet">

  <!-- Main CSS -->
  <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">

  <!-- ===== CUSTOM STYLE ===== -->
  <style>
    :root {
      --primary: #1e7e34;
      --dark: #222;
      --light: #f8f9fa;
    }

    body {
      font-family: 'Poppins', sans-serif;
    }

    /* ===== TOP BAR ===== */
    #topbar {
      background: var(--primary);
      color: #fff;
      height: 40px;
      font-size: 14px;
    }

    #topbar a {
      color: #fff;
    }

    /* ===== HEADER ===== */
    #header {
      background: #fff;
      transition: all .4s;
    }

    #header.header-scrolled {
      box-shadow: 0 2px 20px rgba(0,0,0,.1);
      padding: 10px 0;
    }

    .logo-img {
      height: 80px;
      margin-right: 10px;
    }

    /* ===== NAV ===== */
    .nav-menu ul {
      list-style: none;
      display: flex;
      gap: 25px;
    }

    .nav-menu a {
      font-weight: 500;
      color: var(--dark);
      transition: .3s;
    }

    .nav-menu a:hover,
    .nav-menu .active > a {
      color: var(--primary);
    }

    /* ===== HERO ===== */
    #hero {
      min-height: 90vh;
      background: linear-gradient(rgba(0,0,0,0.25), rgba(0,0,0,0.25)),
        url('{{ asset("frontend/assets/img/background.jpeg") }}') center/cover no-repeat;
      display: flex;
      align-items: center;
      color: #fff;
      text-align: center;
      filter: brightness(1.1) contrast(1.05);
    }

    #hero h1 {
      font-size: 56px;
      font-weight: 700;
      text-shadow: 1px 1px 3px rgba(0,0,0,0.7), 0 0 6px rgba(0,0,0,0.4);
      color: #FFFFFF;
    }

    #hero h2 {
      margin: 15px 0 30px;
      font-size: 18px;
      color: #FFFFFF;
      text-shadow: 1px 1px 2px rgba(0,0,0,0.7);
    }

    #hero h3 {
      color: #F1F1F1;
      margin: 0 0 20px 0;
      font-size: 16px;
      font-weight: 300;
      font-style: italic;
      text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
    }

    .welcome-text h4 {
      color: #F4C430;
      font-size: 32px;
      font-weight: 600;
      text-transform: uppercase;
      text-shadow: 1px 1px 2px rgba(0,0,0,0.6);
    }

    .brand-texts {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 8px;
      margin-top: 10px;
    }

    .description-inline {
      display: flex;
      flex-direction: column;
      gap: 4px;
      margin-top: 8px;
    }

    .description-inline p {
      margin: 0;
      font-size: 16px;
      line-height: 1.5;
      color: #F8F8F8;
      text-shadow: 1px 1px 2px rgba(0,0,0,0.4);
      text-align: center;
      max-width: 500px;
      margin-left: auto;
      margin-right: auto;
    }

    @media (max-width: 768px) {
      #hero h1 {
        font-size: 36px;
        line-height: 44px;
      }
      #hero h2 {
        font-size: 16px;
      }
      #hero h3 {
        font-size: 14px;
      }
      .welcome-text h4 {
        font-size: 24px;
      }
      .brand-texts {
        gap: 6px;
        margin-top: 8px;
      }
      .description-inline {
        gap: 3px;
        margin-top: 6px;
      }
      .description-inline p {
        font-size: 14px;
        line-height: 1.4;
        max-width: 90%;
      }
    }

    .btn-get-started {
      background: var(--primary);
      color: #fff;
      padding: 12px 36px;
      border-radius: 50px;
      font-weight: 600;
      transition: .3s;
    }

    .btn-get-started:hover {
      background: #166c2c;
      transform: translateY(-3px);
    }

    /* ===== PROCEDURE ===== */
    .icon-box {
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      text-align: center;
      box-shadow: 0 5px 25px rgba(0,0,0,.08);
      transition: all .35s ease;
      cursor: pointer;
    }

    .icon-box:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 35px rgba(0,0,0,.15);
    }

    /* AKTIF SAAT DIKLIK */
    .icon-box.active {
      transform: translateY(-25px);
      box-shadow: 0 18px 45px rgba(0,0,0,.2);
      border: 2px solid var(--primary);
      animation: bounceUp 0.6s ease-out;
    }

    @keyframes bounceUp {
      0% {
        transform: translateY(0);
      }
      50% {
        transform: translateY(-30px);
      }
      100% {
        transform: translateY(-25px);
      }
    }

    .icon-box .icon {
      font-size: 40px;
      color: var(--primary);
      margin-bottom: 15px;
    }

    /* ===== FOOTER ===== */
    #footer {
      background: var(--primary);
      color: #fff;
      padding: 20px 0;
      text-align: center;
    }

    /* ===== BACK TO TOP ===== */
    .back-to-top {
      position: fixed;
      right: 15px;
      bottom: 15px;
      background: var(--primary);
      color: #fff;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
    }
  </style>
</head>

<body id="home">

<!-- ===== TOP BAR ===== -->
<div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
  <div class="container d-flex justify-content-between">
    <div>
      <i class="icofont-envelope"></i> diknas50@gmail.com
      &nbsp;&nbsp;
      <i class="icofont-phone"></i> 0813-2869-9687
    </div>
    <div>
      <i class="icofont-facebook"></i>
      <i class="icofont-instagram"></i>
    </div>
  </div>
</div>

<!-- ===== HEADER ===== -->
<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center justify-content-between">
    <a href="{{ url('/') }}" class="d-flex align-items-center text-decoration-none">
      <img src="{{ asset('assets/images/logo_sistem.png') }}" class="logo-img">
      <strong class="text-dark">DINAS PENDIDIKAN</strong>
    </a>

    <nav class="nav-menu d-none d-lg-block">
      <ul>
        <li class="active"><a href="#home">Beranda</a></li>
        <li><a href="#procedures">Prosedur</a></li>
        <li><a href="{{ url('track-complaint') }}">Lacak</a></li>
        <li><a href="{{ url('user/login') }}">Login</a></li>
        <li><a href="{{ url('user/register') }}">Daftar</a></li>
      </ul>
    </nav>
  </div>
</header>

<!-- ===== HERO ===== -->
<section id="hero">
  <div class="container" data-aos="zoom-in">
    <div class="hero-content">
      <div class="welcome-text">
        <h4>Selamat Datang di Website</h4>
      </div>
      
      <div class="brand-section">
        <h1>CERDIK</h1>
        <div class="brand-texts">
          <h2>Center for Education Reporting & Digital Complaints</h2>
          <h3>(Pusat Pelaporan dan Pengaduan Digital Pendidikan)</h3>
          <div class="description-inline">
            <p>Sampaikan pengaduan, aspirasi, dan masukan Anda terkait layanan pendidikan secara mudah, cepat, dan transparan.</p>
            <p>Setiap laporan Anda adalah langkah nyata untuk perbaikan pendidikan.</p>
          </div>
        </div>
      </div>

      <div class="cta-section">
        @if(Session::get('nik') != NULL)
          <a href="{{ url('user/complaint/add') }}" class="btn-get-started">Lapor Sekarang</a>
        @endif
      </div>
    </div>
  </div>
</section>

<!-- ===== PROCEDURE ===== -->
<section id="procedures" class="py-5 services">
  <div class="container">
    <div class="row">

      <div class="col-lg-3 col-md-6 mb-4">
        <div class="icon-box">
          <div class="icon"><i class="bx bx-edit"></i></div>
          <h5>Tulis Laporan</h5>
          <p>Isi laporan dengan jelas dan lengkap.</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4">
        <div class="icon-box">
          <div class="icon"><i class="bx bx-check-shield"></i></div>
          <h5>Verifikasi</h5>
          <p>Laporan diverifikasi petugas.</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4">
        <div class="icon-box">
          <div class="icon"><i class="bx bx-refresh"></i></div>
          <h5>Diproses</h5>
          <p>Pengaduan Diproses.</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4">
        <div class="icon-box">
          <div class="icon"><i class="bx bx-check-circle"></i></div>
          <h5>Pengaduan Selesai</h5>
          <p>Pengaduan Selesai.</p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ===== FOOTER ===== -->
<footer id="footer">
  &copy; {{ date('Y') }} <strong>Dinas Pendidikan</strong>. All Rights Reserved
</footer>

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS -->
<script src="{{ asset('frontend/assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('frontend/assets/js/main.js') }}"></script>

<script>
  AOS.init({ duration: 900, once: true });

  // Smooth scroll untuk menu navigasi
  document.addEventListener('DOMContentLoaded', function() {
    // AUTO ICON BOX NAIK SAAT HALAMAN DIMUAT DENGAN STAGGERED ANIMATION
    const iconBoxes = document.querySelectorAll('.icon-box');
    iconBoxes.forEach((box, index) => {
      setTimeout(() => {
        box.classList.add('active');
      }, 1000 + (index * 200)); // Delay 1s + 200ms untuk setiap box
    });

    // Hapus hash dari URL saat halaman load
    if (window.location.hash) {
      // Jika hash adalah #procedures, scroll ke section tersebut
      if (window.location.hash === '#procedures') {
        const targetSection = document.getElementById('procedures');
        if (targetSection) {
          const headerHeight = document.getElementById('header').offsetHeight;
          const topbarHeight = document.getElementById('topbar').offsetHeight;
          const totalOffset = headerHeight + topbarHeight;

          setTimeout(() => {
            window.scrollTo({
              top: targetSection.offsetTop - totalOffset,
              behavior: 'smooth'
            });
          }, 100); // Delay kecil untuk memastikan halaman fully loaded
        }
      }
      // Hapus hash dari URL setelah scroll
      history.replaceState(null, null, window.location.pathname);
    }

    const navLinks = document.querySelectorAll('#header .nav-menu a');

    navLinks.forEach(link => {
      link.addEventListener('click', function(e) {
        const href = this.getAttribute('href');

        // Jika href adalah #home, scroll ke atas
        if (href === '#home') {
          e.preventDefault();
          window.scrollTo({
            top: 0,
            behavior: 'smooth'
          });
        }
        // Jika href dimulai dengan # lainnya, lakukan smooth scroll ke section
        else if (href.startsWith('#')) {
          e.preventDefault();
          const targetId = href.substring(1);
          const targetSection = document.getElementById(targetId);

          if (targetSection) {
            const headerHeight = document.getElementById('header').offsetHeight;
            const topbarHeight = document.getElementById('topbar').offsetHeight;
            const totalOffset = headerHeight + topbarHeight;

            window.scrollTo({
              top: targetSection.offsetTop - totalOffset,
              behavior: 'smooth'
            });
          }
        }
        // Jika bukan #, biarkan link normal (untuk Lacak, Login, Daftar)
      });
    });
  });

  // ICON BOX NAIK SAAT DIKLIK DAN SCROLL KE ATAS
  document.querySelectorAll('.icon-box').forEach(box => {
    box.addEventListener('click', function () {
      document.querySelectorAll('.icon-box').forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      window.scrollTo(0, 0); // Scroll langsung ke atas
    });
  });

  // KETIKA KLIK PROSEDUR DI NAV, IKON LANGSUNG NAIK DAN SCROLL KE ATAS
  document.querySelector('a[href="#procedures"]').addEventListener('click', function(e) {
    e.preventDefault(); // Mencegah scroll ke #procedures

    // Hapus hash dari URL jika ada
    if (window.location.hash) {
      history.replaceState(null, null, window.location.pathname);
    }

    window.scrollTo(0, 0); // Scroll langsung ke atas
    const iconBoxes = document.querySelectorAll('.icon-box');
    iconBoxes.forEach((box, index) => {
      setTimeout(() => {
        box.classList.add('active');
      }, 100 + (index * 200)); // Delay kecil + staggered
    });
  });

  // Menu Lacak, Login, Daftar menggunakan link normal tanpa JavaScript
</script>

</body>
</html>
