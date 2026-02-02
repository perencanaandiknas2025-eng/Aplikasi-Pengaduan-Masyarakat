<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Daftar | DINAS PENDIDIKAN</title>

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
      box-shadow: 0 2px 10px rgba(0,0,0,.1);
    }

    #header .logo-img {
      max-height: 80px;
      margin-right: 10px;
    }

    #header .nav-menu ul {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
    }

    #header .nav-menu ul li {
      margin: 0 15px;
    }

    #header .nav-menu ul li a {
      color: #333;
      text-decoration: none;
      font-weight: 500;
      transition: .3s;
    }

    #header .nav-menu ul li a:hover,
    #header .nav-menu ul li.active a {
      color: var(--primary);
    }

    /* ===== HERO ===== */
    #hero {
      width: 100%;
      height: 40vh;
      background: linear-gradient(rgba(0,0,0,.6), rgba(0,0,0,.6)), url("{{ asset('frontend/assets/img/hero-bg.jpg') }}");
      background-size: cover;
      background-position: center;
      display: flex;
      align-items: center;
      text-align: center;
      color: #fff;
    }

    #hero h1 {
      font-size: 48px;
      font-weight: 700;
      margin-bottom: 10px;
    }

    #hero h2 {
      font-size: 24px;
      font-weight: 300;
    }

    /* ===== REGISTER FORM ===== */
    .register-section {
      padding: 60px 0;
      background: #f8f9fa;
    }

    .register-card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 5px 25px rgba(0,0,0,.08);
      padding: 40px;
      max-width: 600px;
      margin: 0 auto;
    }

    .register-card h3 {
      text-align: center;
      margin-bottom: 30px;
      color: var(--dark);
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-control {
      border: 1px solid #ddd;
      border-radius: 8px;
      padding: 12px;
      font-size: 16px;
    }

    .form-control:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 0.2rem rgba(30, 126, 52, 0.25);
    }

    .btn-register {
      background: var(--primary);
      color: #fff;
      border: none;
      padding: 12px 30px;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 600;
      width: 100%;
      transition: .3s;
    }

    .btn-register:hover {
      background: #166c2c;
      transform: translateY(-2px);
    }

    .login-link {
      text-align: center;
      margin-top: 20px;
    }

    .login-link a {
      color: var(--primary);
      text-decoration: none;
    }

    .login-link a:hover {
      text-decoration: underline;
    }

    /* ===== FOOTER ===== */
    #footer {
      background: var(--dark);
      color: #fff;
      text-align: center;
      padding: 20px 0;
      font-size: 14px;
    }

    /* ===== BACK TO TOP ===== */
    .back-to-top {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background: var(--primary);
      color: #fff;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      text-decoration: none;
      transition: .3s;
      z-index: 999;
    }

    .back-to-top:hover {
      background: #166c2c;
      transform: translateY(-3px);
    }
  </style>
</head>
<body>

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
        <li><a href="{{ url('/') }}">Beranda</a></li>
        <li><a href="{{ url('/') }}#procedures">Prosedur</a></li>
        <li><a href="{{ url('track-complaint') }}">Lacak</a></li>
        <li><a href="{{ url('user/login') }}">Login</a></li>
        <li class="active"><a href="{{ url('user/register') }}">Daftar</a></li>
      </ul>
    </nav>
  </div>
</header>

<!-- ===== HERO ===== -->
<section id="hero">
  <div class="container" data-aos="zoom-in">
    <h1>Daftar Pengguna</h1>
    <h2>Buat akun baru untuk mengakses layanan pengaduan</h2>
  </div>
</section>

<!-- ===== REGISTER SECTION ===== -->
<section class="register-section">
  <div class="container">
    <div class="register-card" data-aos="fade-up">
      <h3>Daftar</h3>
      @if ($errors->any())
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      @if ($message = Session::get('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      @if ($message = Session::get('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      <form action="{{ url('user/register/save') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
        @csrf
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="nik">NIK</label>
              <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK Anda" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="name">Nama Lengkap</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Lengkap" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="phone_number">Nomor Telepon</label>
              <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Masukkan Nomor Telepon" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="photo">Foto Profil</label>
              <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="address">Alamat</label>
          <textarea class="form-control" id="address" name="address" rows="3" placeholder="Masukkan Alamat Lengkap" required></textarea>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
        </div>
        <button type="submit" class="btn-register">Daftar</button>
      </form>
      <div class="login-link">
        <p>Sudah punya akun? <a href="{{ url('user/login') }}">Login di sini</a></p>
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

  function validateForm() {
    const nik = document.getElementById('nik').value;
    const nikPattern = /^\d{16}$/;
    const password = document.getElementById('password').value;
    const photo = document.getElementById('photo').files[0];

    if (!nikPattern.test(nik)) {
      alert('NIK harus terdiri dari 16 digit angka!');
      document.getElementById('nik').focus();
      return false;
    }

    if (password.length < 6) {
      alert('Password minimal harus 6 karakter!');
      document.getElementById('password').focus();
      return false;
    }

    if (!photo) {
      alert('Foto profil wajib diupload!');
      document.getElementById('photo').focus();
      return false;
    }

    return true;
  }
</script>

</body>
</html>