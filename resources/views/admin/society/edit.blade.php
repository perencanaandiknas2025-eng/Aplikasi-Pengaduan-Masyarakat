@extends('admin.layouts.main')
@section('title','Masyarakat | Public Complaints')
@section('css')
<style>
    .page-title-box h4 {
        color: #495057;
        font-weight: 600;
        display: flex;
        align-items: center;
    }
    .page-title-box h4::before {
        content: '';
        background: linear-gradient(135deg, #1e7e34 0%, #28a745 100%);
        width: 4px;
        height: 24px;
        margin-right: 12px;
        border-radius: 2px;
    }
    .form-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 25px rgba(0,0,0,0.1);
        border: 1px solid #e9ecef;
        overflow: hidden;
    }
    .form-card .card-header {
        background: linear-gradient(135deg, #1e7e34 0%, #28a745 100%);
        color: white;
        border-bottom: none;
        padding: 20px;
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
        border-radius: 8px;
        padding: 12px 15px;
        font-size: 14px;
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
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
        border-radius: 15px;
        padding: 25px;
        text-align: center;
    }
    .info-card img {
        width: 60px;
        margin-bottom: 15px;
    }
    .btn-custom {
        border-radius: 8px;
        padding: 10px 20px;
        font-weight: 500;
        margin: 5px;
        transition: all 0.3s ease;
    }
    .btn-primary-custom {
        background: linear-gradient(135deg, #1e7e34 0%, #28a745 100%);
        border: none;
    }
    .btn-primary-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(30, 126, 52, 0.3);
    }
    .btn-back {
        background: #6c757d;
        border: none;
        color: white;
        text-decoration: none;
        display: inline-block;
        border-radius: 8px;
        padding: 10px 15px;
        transition: all 0.3s ease;
    }
    .btn-back:hover {
        background: #5a6268;
        transform: translateY(-2px);
    }
    .alert-custom {
        border-radius: 10px;
        border: none;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
</style>
@endsection
@section('content')
<div class="page-content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Edit Masyarakat</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Edit Masyarakat</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="{{route('society.index')}}" class="btn-back">
                    <i class="bx bx-arrow-back"></i> Kembali Ke Daftar Masyarakat
                </a>
                <br><br>
                @if ($errors->any())
                <div class="alert alert-danger alert-custom alert-dismissible fade show" role="alert">
                    <i class="bx bx-error-circle"></i>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-custom alert-dismissible fade show" role="alert">
                    <i class="bx bx-check-circle"></i>
                    {{$message}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
        </div>
        <br>
        <div class="row">
            <form action="{{url('admin/society/update/'.$society->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="form-card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <i class="bx bx-edit"></i> Edit Data Masyarakat
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="nik">NIK</label>
                                                <input class="form-control" type="number" id="nik" name="nik" value="{{$society->nik}}" placeholder="Masukkan NIK">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="username">Username</label>
                                                <input class="form-control" type="text" id="username" name="username" value="{{$society->username}}" placeholder="Masukkan username">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="email">Email</label>
                                                <input class="form-control" type="email" id="email" name="email" value="{{$society->email}}" placeholder="Masukkan alamat email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="name">Nama Lengkap</label>
                                                <input class="form-control" type="text" id="name" name="name" value="{{$society->name}}" placeholder="Masukkan nama lengkap">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="phone_number">Nomor Telepon</label>
                                                <input class="form-control" type="number" id="phone_number" name="phone_number" value="{{$society->phone_number}}" placeholder="Masukkan nomor telepon">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="photo">Foto Profil</label>
                                                <input class="form-control" type="file" id="photo" name="photo" accept="image/*">
                                                <small class="text-muted">(Lewati jika tidak diubah)</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="address">Alamat</label>
                                        <textarea class="form-control" id="address" name="address" rows="3" placeholder="Masukkan alamat lengkap">{{$society->address}}</textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="password">Password Baru</label>
                                        <div class="password-wrapper">
                                            <input class="form-control" type="password" id="password" name="password" placeholder="Masukkan password baru">
                                            <span class="password-toggle" onclick="togglePassword()">
                                                <i class="bx bx-show" id="password-icon"></i>
                                            </span>
                                        </div>
                                        <small class="text-muted">(Lewati jika tidak diubah)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="info-card">
                                <img src="{{asset('assets/images/info.png')}}" alt="Info">
                                <h6>Perhatian</h6>
                                <p>Mohon lengkapi form yang tersedia untuk memperbarui data masyarakat. Pastikan data yang dimasukkan valid.</p>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-light btn-custom btn-primary-custom">
                                        <i class="bx bx-save"></i> Simpan Perubahan
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