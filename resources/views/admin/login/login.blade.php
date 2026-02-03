<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Login Admin | DINAS PENDIDIKAN</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">
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
        #header {
            background: #fff;
            transition: all .4s;
        }
        .logo-img {
            height: 80px;
            margin-right: 10px;
        }
        #hero {
            min-height: 90vh;
            background: linear-gradient(rgba(0,0,0,.4), rgba(0,0,0,.4)), url('{{ asset("frontend/assets/img/background.jpeg") }}') center/cover no-repeat;
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
        .login-section {
            padding: 60px 0;
            background: #f8f9fa;
        }
        .login-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 5px 25px rgba(0,0,0,.08);
            padding: 40px;
            max-width: 500px;
            margin: 0 auto;
        }
        .login-card h3 {
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
        .btn-login {
            background: var(--primary);
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            width: 100%;
            transition: .3s;
        }
        .btn-login:hover {
            background: #166c2c;
            transform: translateY(-2px);
        }
        #footer {
            background: var(--primary);
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
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
            text-decoration: none;
            transition: .3s;
            z-index: 999;
        }
        .back-to-top:hover {
            background: #166c2c;
            transform: translateY(-3px);
        }

        /* ===== PASSWORD TOGGLE ===== */
        .password-wrapper {
            position: relative;
        }
        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #666;
        }
        .password-toggle:hover {
            color: var(--primary);
        }
        @media (max-width: 768px) {
            #hero h1 { font-size: 32px; }
            #hero h2 { font-size: 16px; }
            .login-card { padding: 30px 20px; margin: 0 15px; }
        }
        @media (max-width: 576px) {
            #topbar { display: none !important; }
            #hero { min-height: 70vh; }
            #hero h1 { font-size: 28px; }
            .login-card { padding: 20px 15px; }
            .password-toggle { right: 5px; }
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
            <a href="https://www.facebook.com/dinaspendidikan" target="_blank" class="text-decoration-none me-2">
                <i class="icofont-facebook"></i>
            </a>
            <a href="https://www.instagram.com/dinaspendidikan" target="_blank" class="text-decoration-none">
                <i class="icofont-instagram"></i>
            </a>
        </div>
    </div>
</div>

<!-- ===== HEADER ===== -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
        <a href="{{ url('/') }}" class="d-flex align-items-center text-decoration-none">
            <img src="{{ asset('assets/images/logo_sistem.png') }}" class="logo-img">
            <strong class="text-dark">DINAS PENDIDIKAN<br>HALMAHERA TIMUR</strong>
        </a>
        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li><a href="{{ url('/') }}#procedures">Prosedur</a></li>
                <li><a href="{{ url('track-complaint') }}">Lacak</a></li>
                <li class="active"><a href="{{ url('admin/login') }}">Login</a></li>
            </ul>
        </nav>
    </div>
</header>

<!-- ===== HERO ===== -->
<section id="hero">
    <div class="container" data-aos="zoom-in">
        <h1>Login Admin</h1>
        <h2>Masuk ke akun admin untuk mengelola aplikasi pengaduan</h2>
    </div>
</section>

<!-- ===== LOGIN SECTION ===== -->
<section class="login-section">
    <div class="container">
        <div class="login-card" data-aos="fade-up">
            <h3>Login Admin</h3>
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
            <form action="{{ url('admin/login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username Admin" required autofocus>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="password-wrapper">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                        <span class="password-toggle" onclick="togglePassword()">
                            <i class="icofont-eye" id="password-icon"></i>
                        </span>
                    </div>
                </div>
                <button type="submit" class="btn-login">Login</button>
            </form>
        </div>
    </div>
</section>

<!-- ===== FOOTER ===== -->
<footer id="footer">
    &copy; 2026 <strong>Dinas Pendidikan</strong>. All Rights Reserved
</footer>

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS -->
<script src="{{ asset('frontend/assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('frontend/assets/js/main.js') }}"></script>
<script>
    AOS.init({ duration: 900, once: true });
</script>
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
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
</script>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <link href="{{ asset('frontend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
        </script>
        <script>
            <!DOCTYPE html>
            <html lang="id">
            <head>
                <meta charset="utf-8">
                <meta content="width=device-width, initial-scale=1.0" name="viewport">
                <title>Login Admin | DINAS PENDIDIKAN</title>
                <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
                <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">
                <link href="{{ asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
                <link href="{{ asset('frontend/assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
                <link href="{{ asset('frontend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
                <link href="{{ asset('frontend/assets/vendor/aos/aos.css') }}" rel="stylesheet">
                <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">
                <style>
                    :root {
                        --primary: #1e7e34;
                        --dark: #222;
                        --light: #f8f9fa;
                    }
                    body {
                        font-family: 'Poppins', sans-serif;
                    }
                    #header {
                        background: #fff;
                        transition: all .4s;
                    }
                    .logo-img {
                        height: 80px;
                        margin-right: 10px;
                    }
                    #hero {
                        min-height: 90vh;
                        background: linear-gradient(rgba(0,0,0,.4), rgba(0,0,0,.4)), url('{{ asset("frontend/assets/img/background.jpeg") }}') center/cover no-repeat;
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
                    .login-section {
                        padding: 60px 0;
                        background: #f8f9fa;
                    }
                    .login-card {
                        background: #fff;
                        border-radius: 12px;
                        box-shadow: 0 5px 25px rgba(0,0,0,.08);
                        padding: 40px;
                        max-width: 500px;
                        margin: 0 auto;
                    }
                    .login-card h3 {
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
                    .btn-login {
                        background: var(--primary);
                        color: #fff;
                        border: none;
                        padding: 12px;
                        border-radius: 8px;
                        font-size: 16px;
                        font-weight: 600;
                        width: 100%;
                        transition: .3s;
                    }
                    .btn-login:hover {
                        background: #166c2c;
                        transform: translateY(-2px);
                    }
                    .register-link {
                        text-align: center;
                        margin-top: 20px;
                    }
                    .register-link a {
                        color: var(--primary);
                        text-decoration: none;
                    }
                    .register-link a:hover {
                        text-decoration: underline;
                    }
                    #footer {
                        background: var(--primary);
                        color: #fff;
                        padding: 20px 0;
                        text-align: center;
                    }
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
                        text-decoration: none;
                        transition: .3s;
                        z-index: 999;
                    }
                    .back-to-top:hover {
                        background: #166c2c;
                        transform: translateY(-3px);
                    }
                    @media (max-width: 768px) {
                        #hero h1 { font-size: 32px; }
                        #hero h2 { font-size: 16px; }
                        .login-card { padding: 30px 20px; margin: 0 15px; }
                    }
                    @media (max-width: 576px) {
                        #topbar { display: none !important; }
                        #hero { min-height: 70vh; }
                        #hero h1 { font-size: 28px; }
                        .login-card { padding: 20px 15px; }
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
                        <a href="https://www.facebook.com/dinaspendidikan" target="_blank" class="text-decoration-none me-2">
                            <i class="icofont-facebook"></i>
                        </a>
                        <a href="https://www.instagram.com/dinaspendidikan" target="_blank" class="text-decoration-none">
                            <i class="icofont-instagram"></i>
                        </a>
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
                            <li class="active"><a href="{{ url('admin/login') }}">Login</a></li>
                        </ul>
                    </nav>
                </div>
            </header>

            <!-- ===== HERO ===== -->
            <section id="hero">
                <div class="container" data-aos="zoom-in">
                    <h1>Login Admin</h1>
                    <h2>Masuk ke akun admin untuk mengelola aplikasi pengaduan</h2>
                </div>
            </section>

            <!-- ===== LOGIN SECTION ===== -->
            <section class="login-section">
                <div class="container">
                    <div class="login-card" data-aos="fade-up">
                        <h3>Login Admin</h3>
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
                        <form action="{{ url('admin/login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username Admin" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="password-wrapper">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                                    <span class="password-toggle" onclick="togglePassword()">
                                        <i class="icofont-eye" id="password-icon"></i>
                                    </span>
                                </div>
                            </div>
                            <button type="submit" class="btn-login">Login</button>
                        </form>
                    </div>
                </div>
            </section>

            <!-- ===== FOOTER ===== -->
            <footer id="footer">
                &copy; 2026 <strong>Dinas Pendidikan</strong>. All Rights Reserved
            </footer>

            <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

            <!-- Vendor JS -->
            <script src="{{ asset('frontend/assets/vendor/jquery/jquery.min.js') }}"></script>
            <script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            <script src="{{ asset('frontend/assets/vendor/aos/aos.js') }}"></script>
            <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
            <script>
                AOS.init({ duration: 900, once: true });
            </script>
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
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                });
            </script>
            <script>
                // Password toggle functionality
                function togglePassword() {
                    const passwordInput = document.getElementById('password');
                    const passwordIcon = document.getElementById('password-icon');
                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        passwordIcon.className = 'icofont-eye-blocked';
                    } else {
                        passwordInput.type = 'password';
                        passwordIcon.className = 'icofont-eye';
                    }
                }
            </script>
            </body>
            </html>