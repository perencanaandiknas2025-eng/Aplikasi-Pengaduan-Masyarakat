@extends('admin.layouts.main')
@section('title','Masyarakat | Public Complaints')
@section('css')
<style>
    .form-card {
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        margin-bottom: 20px;
    }

    .form-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    }

    .form-card .card-header {
        background: linear-gradient(135deg, #1e7e34 0%, #28a745 100%);
        color: white;
        border-radius: 15px 15px 0 0 !important;
        border: none;
        padding: 20px;
    }

    .form-card .card-header h5 {
        margin: 0;
        font-weight: 600;
        font-size: 1.2rem;
    }

    .form-card .card-body {
        padding: 30px;
    }

    .form-group label {
        font-weight: 600;
        color: #495057;
        margin-bottom: 8px;
    }

    .form-control {
        border: 2px solid #e9ecef;
        border-radius: 10px;
        padding: 12px 15px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #1e7e34;
        box-shadow: 0 0 0 0.2rem rgba(30, 126, 52, 0.25);
    }

    .password-wrapper {
        position: relative;
    }

    .password-toggle {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #6c757d;
        transition: color 0.3s ease;
    }

    .password-toggle:hover {
        color: #1e7e34;
    }

    .info-card {
        background: linear-gradient(135deg, #1e7e34 0%, #28a745 100%);
        border: none;
        border-radius: 15px;
        color: white;
        padding: 30px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        height: fit-content;
    }

    .info-card img {
        width: 80px;
        margin-bottom: 20px;
        opacity: 0.9;
    }

    .info-card h6 {
        font-weight: 600;
        margin-bottom: 15px;
        font-size: 1.1rem;
    }

    .info-card p {
        font-size: 0.95rem;
        opacity: 0.9;
        margin-bottom: 20px;
    }

    .btn-custom {
        border-radius: 10px;
        padding: 12px 25px;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
        margin: 5px;
    }

    .btn-primary-custom {
        background: linear-gradient(135deg, #1e7e34 0%, #28a745 100%);
        color: white;
    }

    .btn-primary-custom:hover {
        background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(30, 126, 52, 0.3);
    }

    .btn-back {
        background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
        color: white;
    }

    .btn-back:hover {
        background: linear-gradient(135deg, #495057 0%, #6c757d 100%);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(108, 117, 125, 0.3);
    }

    .alert-custom {
        border-radius: 10px;
        border: none;
        padding: 15px 20px;
    }

    .alert-success {
        background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
        color: #155724;
    }

    .alert-danger {
        background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
        color: #721c24;
    }

    .page-title-box h4 {
        color: #1e7e34;
        font-weight: 600;
    }

    .breadcrumb-item.active {
        color: #1e7e34;
    }

    .button {
        background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
        color: white;
        padding: 10px 20px;
        border-radius: 10px;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s ease;
        border: none;
        font-weight: 500;
    }

    .button:hover {
        background: linear-gradient(135deg, #495057 0%, #6c757d 100%);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(108, 117, 125, 0.3);
        color: white;
        text-decoration: none;
    }
</style>
@endsection
@section('content')
<div class="page-content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Tambah Masyarakat</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Tambah Masyarakat</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                
                <a href="{{route('society.index')}}" class="button btn-back">
                    <i class="bx bx-arrow-back"></i> &nbsp;&nbsp;Kembali Ke Daftar Masyarakat
                </a>
                <br>
                <br>
                @if ($errors->any())
                <div class="alert alert-danger alert-custom alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-alert-circle-outline me-2"></i>
                    <strong>Terjadi Kesalahan!</strong> Mohon perbaiki data berikut:
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-custom alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-check-all me-2"></i>
                    {{$message}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
        </div>
        <br>
        <div class="row">
            <form action="{{route('society.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="form-card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <i class="bx bx-plus"></i> Tambah Data Masyarakat
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="nik">NIK</label>
                                                <input class="form-control" type="number" id="nik" name="nik" value="{{old('nik')}}" placeholder="Masukkan NIK">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="username">Username</label>
                                                <input class="form-control" type="text" id="username" name="username" value="{{old('username')}}" placeholder="Masukkan username">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="email">Email</label>
                                                <input class="form-control" type="email" id="email" name="email" value="{{old('email')}}" placeholder="Masukkan alamat email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="name">Nama Lengkap</label>
                                                <input class="form-control" type="text" id="name" name="name" value="{{old('name')}}" placeholder="Masukkan nama lengkap">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="phone_number">Nomor Telepon</label>
                                                <input class="form-control" type="number" id="phone_number" name="phone_number" placeholder="Masukkan nomor telepon">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="photo">Foto Profil</label>
                                                <input class="form-control" type="file" id="photo" name="photo" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="address">Alamat</label>
                                        <textarea class="form-control" id="address" name="address" rows="3" placeholder="Masukkan alamat lengkap"></textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <div class="password-wrapper">
                                            <input class="form-control" type="password" id="password" name="password" placeholder="Masukkan password">
                                            <span class="password-toggle" onclick="togglePassword()">
                                                <i class="bx bx-show" id="password-icon"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="info-card">
                                <img src="{{asset('assets/images/info.png')}}" alt="Info">
                                <h6>Perhatian</h6>
                                <p>Mohon lengkapi form yang tersedia untuk menambahkan data masyarakat baru. Pastikan data yang dimasukkan valid dan akurat.</p>
                                <div class="mt-3">
                                    <button name="submit" type="submit" class="btn btn-light btn-custom btn-primary-custom" value="save">
                                        <i class="bx bx-save"></i> Simpan
                                    </button>
                                    <br>
                                    <button name="submit" type="submit" class="btn btn-outline-light btn-custom" value="more">
                                        <i class="bx bx-plus"></i> Simpan & Tambah Lagi
                                    </button>
                                    <br>
                                    <a href="{{route('society.index')}}" class="btn btn-outline-light btn-custom mt-2">
                                        <i class="bx bx-x"></i> Batal
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
</div>
@endsection
@push('script')
<script src="{{asset('assets/libs/select2/js/select2.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/libs/spectrum-colorpicker2/spectrum.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
<script src="{{asset('assets/libs/%40chenfengyuan/datepicker/datepicker.min.js')}}"></script>
<script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script>
<script>
    function togglePassword() {
        const passwordField = document.getElementById('password');
        const passwordIcon = document.getElementById('password-icon');
        
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            passwordIcon.className = 'bx bx-hide';
        } else {
            passwordField.type = 'password';
            passwordIcon.className = 'bx bx-show';
        }
    }
</script>
@endpush