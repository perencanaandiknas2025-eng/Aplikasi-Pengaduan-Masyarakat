
<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
        <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
        @yield('css')
    </head>
    <body data-topbar="dark" data-layout="horizontal">
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <div class="navbar-brand-box">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{asset('assets/images/logo.svg')}}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{asset('assets/images/logo-dark.png')}}" alt="" height="17">
                                </span>
                            </a>

                            <a href="{{url('user/home')}}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{asset('assets/images/logo-light.svg')}}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{asset('assets/images/logo-light.png')}}" alt="" height="19">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block d-lg-none ml-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
                    
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Search input">
                                
                                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>s
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>



                        <div class="dropdown d-none d-lg-inline-block ml-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                <i class="bx bx-fullscreen"></i>
                            </button>
                        </div>



                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="{{url('avatar_society/',Session::get('photo'))}}"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{Session::get('name')}}</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="{{route('user_logout')}}"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
                            </div>
                        </div>

                       
            
                    </div>
                </div>
            </header>
    
            <div class="topnav">
                <div class="container-fluid">
                    <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                        <div class="collapse navbar-collapse" id="topnav-menu-content">
                            <ul class="navbar-nav custom-nav-menu">

                                <li class="nav-item menu-item">
                                    <a class="nav-link menu-link" href="{{url('user/home')}}">
                                        <i class="bx bx-home-circle me-2"></i>
                                        <span class="menu-text">Dashboard</span>
                                    </a>
                                </li>

                                <li class="nav-item menu-item dropdown">
                                    <a class="nav-link menu-link dropdown-toggle" href="#" id="topnav-complaints" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bx bx-customize me-2"></i>
                                        <span class="menu-text">Pengaduan</span>
                                        <i class="bx bx-chevron-down dropdown-arrow"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="topnav-complaints">
                                        <li><a class="dropdown-item" href="{{route('complaint')}}">Daftar Pengaduan</a></li>
                                    </ul>
                                </li>

                                <li class="nav-item menu-item">
                                    <a class="nav-link menu-link" href="{{route('add_complaint')}}">
                                        <i class="bx bx-plus-circle me-2"></i>
                                        <span class="menu-text">Buat Pengaduan</span>
                                    </a>
                                </li>

                                <li class="nav-item menu-item">
                                    <a class="nav-link menu-link active" href="{{route('complaint')}}">
                                        <i class="bx bx-history me-2"></i>
                                        <span class="menu-text">Riwayat Pengaduan</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="main-content">
               @yield('content')
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Dinas Pendidikan.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end">
                                    <div class="social-links">
                                        <a href="https://www.facebook.com/dinaspendidikan" target="_blank" class="text-muted me-3">
                                            <i class="bx bxl-facebook"></i>
                                        </a>
                                        <a href="https://www.instagram.com/dinaspendidikan" target="_blank" class="text-muted">
                                            <i class="bx bxl-instagram"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <div class="rightbar-overlay"></div>
        <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
        <script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>
        <script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>
        <script src="{{asset('assets/js/app.js')}}"></script>
        <script>
            // Fix navigation menu click behavior
            $(document).ready(function() {
                // Handle dropdown menu item clicks - ensure immediate navigation
                $('.dropdown-menu a').on('click', function(e) {
                    var href = $(this).attr('href');
                    // Allow normal navigation for actual links
                    if (href && href !== '#' && href !== 'javascript:void(0)') {
                        // Force navigation
                        e.preventDefault();
                        window.location.href = href;
                        return false;
                    }
                });

                // Ensure dropdown parent links work properly
                $('.nav-link.dropdown-toggle').on('click', function(e) {
                    var href = $(this).attr('href');
                    // Only prevent default if href is # and it's meant to be a dropdown toggle
                    if (href === '#') {
                        e.preventDefault();
                        e.stopPropagation();
                        $(this).parent().toggleClass('show');
                        $(this).next('.dropdown-menu').toggleClass('show');
                    }
                });

                // Close dropdown when clicking outside
                $(document).on('click', function(e) {
                    if (!$(e.target).closest('.nav-item.dropdown').length) {
                        $('.nav-item.dropdown').removeClass('show');
                        $('.dropdown-menu').removeClass('show');
                    }
                });
            });
        </script>
    </body>
    @stack('script')
</html>
