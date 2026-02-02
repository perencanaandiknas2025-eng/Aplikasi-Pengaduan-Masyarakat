<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title data-translate="search_result.title">Hasil Pencarian - Online Public Complaint Service</title>
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
        url('{{ asset("frontend/assets/img/hero-bg.jpg") }}') center/cover no-repeat;
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
    .complaint-card {
      transition: transform 0.3s;
    }
    .complaint-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .user-info {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
    }
    .user-avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      margin-right: 10px;
      object-fit: cover;
    }
    .user-details {
      flex: 1;
    }
    .user-name {
      font-weight: bold;
      margin-bottom: 2px;
    }
    .user-nik {
      font-size: 12px;
      color: #6c757d;
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
      <h1>Hasil Pencarian Pengaduan</h1>
      <h2>Status pengaduan untuk NIK: {{ $search_nik }}</h2>
    </div>
  </section>

  <!-- ======= Results Section ======= -->
  <section id="results" class="search-section">
    <div class="container" data-aos="fade-up">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="card shadow">
            <div class="card-body p-5">
              
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 data-translate="search_result.list_title">Daftar Pengaduan</h3>
                <a href="{{url('track-complaint')}}" class="btn btn-outline-primary">
                  <i class="icofont-refresh"></i> <span data-translate="search_result.search_again">Cari Lagi</span>
                </a>
              </div>
              
              @if(count($complaints) > 0)
                <div class="alert alert-success" data-translate="search_result.found_complaints">
                  Ditemukan {{ count($complaints) }} pengaduan untuk NIK ini.
                </div>
                
                @foreach($complaints as $complaint)
                <div class="card complaint-card mb-4">
                  <div class="card-body">
                    <!-- Informasi Pengadu -->
                    <div class="user-info">
                      @if($complaint->society && $complaint->society->photo)
                        <img src="{{ url('avatar_society/'.$complaint->society->photo) }}" class="user-avatar" alt="Foto Profil">
                      @else
                        <div class="user-avatar bg-secondary text-white d-flex align-items-center justify-content-center">
                          <i class="icofont-user"></i>
                        </div>
                      @endif
                      <div class="user-details">
                        <div class="user-name">
                          @if($complaint->society)
                            {{ $complaint->society->name }}
                          @else
                            <span class="text-muted" data-translate="search_result.complainant_not_found">Data pengadu tidak ditemukan</span>
                          @endif
                        </div>
                        <div class="user-nik">
                          NIK: {{ $complaint->nik }}
                        </div>
                      </div>
                      <span class="status-badge 
                        @if($complaint->status == '0') status-unprocess
                        @elseif($complaint->status == 'process') status-process
                        @else status-finished @endif">
                        @if($complaint->status == '0') 
                          <span data-translate="search_result.status_waiting">Menunggu</span>
                        @elseif($complaint->status == 'process') 
                          <span data-translate="search_result.status_process">Diproses</span>
                        @else 
                          <span data-translate="search_result.status_finished">Selesai</span> 
                        @endif
                      </span>
                    </div>
                    
                    <div class="row mt-3">
                      <div class="col-md-3">
                        <img src="{{ url('avatar_complaint/'.$complaint->photo) }}" class="img-fluid rounded" alt="Bukti Pengaduan">
                      </div>
                      <div class="col-md-9">
                        <p class="text-muted">
                          <i class="icofont-calendar"></i> 
                          <span data-translate="search_result.submitted_on">Diajukan pada:</span> {{ date('d F Y', strtotime($complaint->created_at)) }}
                        </p>
                        
                        <p><strong data-translate="search_result.complaint_content">Isi Pengaduan:</strong> {{ $complaint->contents_of_the_report }}</p>
                        
                        <div class="mt-3">
                          <strong data-translate="search_result.response">Tanggapan:</strong>
                          <p class="mt-1 alert 
                            @if($complaint->response && $complaint->response->response) alert-info 
                            @else alert-warning @endif">
                            @if($complaint->response && $complaint->response->response)
                              {{ $complaint->response->response }}
                              <br>
                              <small class="text-muted">
                                <span data-translate="search_result.responded_on">Ditanggapi pada:</span> {{ date('d F Y H:i', strtotime($complaint->response->updated_at)) }}
                              </small>
                            @else
                              <span class="text-muted" data-translate="search_result.no_response">Belum ada tanggapan</span>
                            @endif
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
                
              @else
                <div class="alert alert-warning text-center">
                  <i class="icofont-info-circle" style="font-size: 48px;"></i>
                  <h4 class="mt-3" data-translate="search_result.no_complaints_found">Tidak Ditemukan Pengaduan</h4>
                  <p data-translate="search_result.no_complaints_text">
                    Tidak ada pengaduan yang ditemukan untuk NIK: <strong>{{ $search_nik }}</strong>
                  </p>
                  <p data-translate="search_result.ensure_nik_text">
                    Pastikan NIK yang Anda masukkan benar atau hubungi admin jika Anda yakin sudah membuat pengaduan.
                  </p>
                  <a href="{{url('track-complaint')}}" class="btn btn-primary mt-2" data-translate="search_result.try_again">Coba Lagi</a>
                </div>
              @endif
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Results Section -->

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
        
        // Halaman hasil pencarian
        "search_result.title": "Hasil Pencarian - Layanan Pengaduan Masyarakat Online",
        "search_result.hero_title": "Hasil Pencarian Pengaduan",
        "search_result.hero_subtitle": "Status pengaduan untuk NIK: {{ $search_nik }}",
        "search_result.list_title": "Daftar Pengaduan",
        "search_result.search_again": "Cari Lagi",
        "search_result.found_complaints": "Ditemukan {{ count($complaints) }} pengaduan untuk NIK ini.",
        "search_result.complainant_not_found": "Data pengadu tidak ditemukan",
        "search_result.status_waiting": "Menunggu",
        "search_result.status_process": "Diproses",
        "search_result.status_finished": "Selesai",
        "search_result.submitted_on": "Diajukan pada",
        "search_result.complaint_content": "Isi Pengaduan",
        "search_result.response": "Tanggapan",
        "search_result.responded_on": "Ditanggapi pada",
        "search_result.no_response": "Belum ada tanggapan",
        "search_result.no_complaints_found": "Tidak Ditemukan Pengaduan",
        "search_result.no_complaints_text": "Tidak ada pengaduan yang ditemukan untuk NIK: {{ $search_nik }}",
        "search_result.ensure_nik_text": "Pastikan NIK yang Anda masukkan benar atau hubungi admin jika Anda yakin sudah membuat pengaduan.",
        "search_result.try_again": "Coba Lagi",
        
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
        
        // Search result page
        "search_result.title": "Search Result - Online Public Complaint Service",
        "search_result.hero_title": "Complaint Search Results",
        "search_result.hero_subtitle": "Complaint status for NIK: {{ $search_nik }}",
        "search_result.list_title": "List of Complaints",
        "search_result.search_again": "Search Again",
        "search_result.found_complaints": "Found {{ count($complaints) }} complaints for this NIK.",
        "search_result.complainant_not_found": "Complainant data not found",
        "search_result.status_waiting": "Waiting",
        "search_result.status_process": "In Process",
        "search_result.status_finished": "Finished",
        "search_result.submitted_on": "Submitted on",
        "search_result.complaint_content": "Complaint Content",
        "search_result.response": "Response",
        "search_result.responded_on": "Responded on",
        "search_result.no_response": "No response yet",
        "search_result.no_complaints_found": "No Complaints Found",
        "search_result.no_complaints_text": "No complaints found for NIK: {{ $search_nik }}",
        "search_result.ensure_nik_text": "Make sure the NIK you entered is correct or contact the admin if you are sure you have made a complaint.",
        "search_result.try_again": "Try Again",
        
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
</body>
</html>