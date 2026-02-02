<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title data-translate="track.title">Lacak Pengaduan - Online Public Complaint Service</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

  <link href="{{asset('frontend/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/css/style.css')}}" rel="stylesheet">
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
      background: linear-gradient(rgba(0,0,0,.4), rgba(0,0,0,.4)),
        url('{{ asset("frontend/assets/img/background.jpeg") }}') center/cover no-repeat;
      display: flex;
      align-items: center;
      color: #fff;
      text-align: center;
    }

    #hero h1 {
      font-size: 42px;
      font-weight: 700;
    }

    #hero h2 {
      margin: 15px 0 30px;
      font-size: 18px;
      color: #eee;
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

    .search-section {
      padding: 60px 0;
      background: #f8f9fa;
    }
    .status-badge {
      padding: 5px 10px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: bold;
    }
    .status-unprocess {
      background-color: #ffc107;
      color: #000;
    }
    .status-process {
      background-color: #17a2b8;
      color: #fff;
    }
    .status-finished {
      background-color: #28a745;
      color: #fff;
    }
    /* Language Switcher Styles */
    .language-switcher {
      position: relative;
      display: inline-block;
      margin-left: 15px;
    }
    .language-btn {
      background: #007bff;
      color: white;
      border: none;
      padding: 8px 15px;
      border-radius: 4px;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 5px;
    }
    .language-btn i {
      font-size: 16px;
    }
    .language-options {
      display: none;
      position: absolute;
      background-color: white;
      min-width: 120px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
      border-radius: 4px;
      overflow: hidden;
      right: 0;
    }
    .language-option {
      color: black;
      padding: 10px 15px;
      text-decoration: none;
      display: block;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    .language-option:hover {
      background-color: #f1f1f1;
    }
    .language-switcher:hover .language-options {
      display: block;
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

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
      #hero h1 {
        font-size: 32px;
      }

      #hero h2 {
        font-size: 16px;
      }

      .search-section .card-body {
        padding: 30px 20px;
      }

      #header .nav-menu {
        display: none;
      }
    }

    @media (max-width: 576px) {
      #topbar {
        display: none !important;
      }

      #hero {
        min-height: 70vh;
      }

      #hero h1 {
        font-size: 28px;
      }

      .search-section .card-body {
        padding: 20px 15px;
      }
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
          <li class="active"><a href="{{ url('track-complaint') }}">Lacak</a></li>
          @if(Session::get('nik') == NULL)
            <li><a href="{{ url('user/login') }}">Login</a></li>
            <li><a href="{{ url('user/register') }}">Daftar</a></li>
          @endif
        </ul>
      </nav>
    </div>
  </header>

  <!-- ===== HERO ===== -->
  <section id="hero">
    <div class="container" data-aos="zoom-in">
      <h1>Lacak Status Pengaduan</h1>
      <h2>Masukkan NIK Anda untuk melihat progres pengaduan</h2>
    </div>
  </section>

  <!-- ======= Search Section ======= -->
  <section id="search" class="search-section">
    <div class="container" data-aos="fade-up">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card shadow">
            <div class="card-body p-5">
              <h3 class="text-center mb-4" data-translate="track.search_title">Cari Pengaduan</h3>
              
              <form action="{{url('search-complaint')}}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="nik" data-translate="track.nik_label">Nomor Induk Kependudukan (NIK)</label>
                  <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK Anda" data-translate="track.nik_placeholder" required>
                  @if($errors->has('nik'))
                    <small class="text-danger">{{ $errors->first('nik') }}</small>
                  @endif
                </div>
                
                <div class="text-center mt-4">
                  <button type="submit" class="btn btn-primary btn-lg" data-translate="track.search_button">Cari Pengaduan</button>
                </div>
              </form>
              
              <div class="mt-4">
                <div class="alert alert-info">
                  <i class="icofont-info-circle"></i> 
                  <strong data-translate="track.info_title">Informasi:</strong> 
                  <span data-translate="track.info_text">Masukkan NIK yang Anda gunakan saat membuat pengaduan untuk melihat statusnya.</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Search Section -->

  <!-- ===== FOOTER ===== -->
  <footer id="footer">
    &copy; {{ date('Y') }} <strong>Dinas Pendidikan</strong>. All Rights Reserved
  </footer>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('frontend/assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/counterup/counterup.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('frontend/assets/js/main.js')}}"></script>

  <script>
    AOS.init({ duration: 900, once: true });
  </script>
  
  <!-- Translation Script -->
  <script>
    // Data terjemahan
    const translations = {
      id: {
        // Navigasi
        "nav.home": "Beranda",
        "nav.procedures": "Prosedur",
        "nav.track": "Lacak Pengaduan",
        "nav.login": "Masuk",
        "nav.register": "Daftar",
        
        // Halaman lacak pengaduan
        "track.title": "Lacak Pengaduan - Layanan Pengaduan Masyarakat Online",
        "track.hero_title": "Lacak Status Pengaduan",
        "track.hero_subtitle": "Masukkan NIK Anda untuk melihat progres pengaduan",
        "track.search_title": "Cari Pengaduan",
        "track.nik_label": "Nomor Induk Kependudukan (NIK)",
        "track.nik_placeholder": "Masukkan NIK Anda",
        "track.search_button": "Cari Pengaduan",
        "track.info_title": "Informasi:",
        "track.info_text": "Masukkan NIK yang Anda gunakan saat membuat pengaduan untuk melihat statusnya.",
        
        // Footer
        "footer.copyright": "Hak Cipta",
        "footer.rights": "Semua Hak Dilindungi",
        "footer.designed": "Dirancang oleh",
      },
      en: {
        // Navigasi (default)
        "nav.home": "Home",
        "nav.procedures": "Procedures",
        "nav.track": "Track Complaint",
        "nav.login": "Login",
        "nav.register": "Register",
        
        // Track complaint page
        "track.title": "Track Complaint - Online Public Complaint Service",
        "track.hero_title": "Track Complaint Status",
        "track.hero_subtitle": "Enter your NIK to view complaint progress",
        "track.search_title": "Search Complaint",
        "track.nik_label": "Population Identification Number (NIK)",
        "track.nik_placeholder": "Enter your NIK",
        "track.search_button": "Search Complaint",
        "track.info_title": "Information:",
        "track.info_text": "Enter the NIK you used when making a complaint to view its status.",
        
        // Footer
        "footer.copyright": "Copyright",
        "footer.rights": "All Rights Reserved",
        "footer.designed": "Designed by",
      }
    };

    // Fungsi untuk mengubah bahasa
    function changeLanguage(lang) {
      // Simpan preferensi bahasa di localStorage
      localStorage.setItem('preferredLanguage', lang);
      
      // Perbarui tombol bahasa
      document.getElementById('currentLanguage').innerHTML = `<i class="icofont-globe"></i> ${lang.toUpperCase()}`;
      
      // Perbarui atribut lang pada tag html
      document.documentElement.lang = lang;
      
      // Terapkan terjemahan ke semua elemen dengan atribut data-translate
      document.querySelectorAll('[data-translate]').forEach(element => {
        const key = element.getAttribute('data-translate');
        if (translations[lang][key]) {
          if (element.hasAttribute('placeholder') || element.hasAttribute('title') || element.hasAttribute('alt')) {
            // Untuk atribut selain teks
            element.setAttribute('data-translate', key);
            element[element.hasAttribute('placeholder') ? 'placeholder' : 
                   element.hasAttribute('title') ? 'title' : 'alt'] = translations[lang][key];
          } else {
            // Untuk teks biasa
            element.textContent = translations[lang][key];
          }
        }
      });
    }

    // Event listener untuk tombol bahasa
    document.addEventListener('DOMContentLoaded', function() {
      // Cek preferensi bahasa yang disimpan
      const savedLanguage = localStorage.getItem('preferredLanguage') || 'id';
      
      // Terapkan bahasa yang dipilih
      changeLanguage(savedLanguage);
      
      // Tambahkan event listener untuk opsi bahasa
      document.querySelectorAll('.language-option').forEach(option => {
        option.addEventListener('click', function() {
          const lang = this.getAttribute('data-lang');
          changeLanguage(lang);
        });
      });
    });
  </script>

  <!-- Back to Top Button -->
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <script>
    // Back to Top functionality
    const backToTopBtn = document.querySelector('.back-to-top');
    
    window.addEventListener('scroll', function() {
      if (window.pageYOffset > 100) {
        backToTopBtn.style.display = 'flex';
      } else {
        backToTopBtn.style.display = 'none';
      }
    });
    
    backToTopBtn.addEventListener('click', function(e) {
      e.preventDefault();
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
  </script>

</body>
</html>