@extends('frontend.layouts.main')
@section('title','Add Complaint')
@section('content')
<style>
    body { font-family: 'Poppins', sans-serif; background: #f8f9fa; }
    .complaint-add-header {
        background: linear-gradient(90deg, #1e7e34 60%, #218838 100%);
        color: #fff;
        border-radius: 18px;
        padding: 28px 32px 18px 32px;
        margin-bottom: 32px;
        box-shadow: 0 8px 32px rgba(30,126,52,0.12);
        display: flex;
        align-items: center;
        gap: 18px;
    }
    .complaint-add-header .icon {
        font-size: 2.5rem;
        background: #fff3cd;
        color: #856404;
        width: 56px;
        height: 56px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 16px;
    }
    .complaint-add-header h2 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 2px;
    }
    .complaint-add-header p {
        margin-bottom: 0;
        font-size: 1.05rem;
        opacity: .92;
    }
    .card {
        border-radius: 14px;
        box-shadow: 0 4px 24px rgba(30,126,52,0.08);
        border: 1px solid #e6e6e6;
    }
    .btn-success {
        background: #1e7e34;
        border: none;
        color: #fff;
        border-radius: 50px;
        padding: 10px 32px;
        font-weight: 600;
        font-size: 1.1rem;
        transition: background 0.2s;
    }
    .btn-success:hover {
        background: #166c2c;
        color: #fff;
    }
    label.col-form-label { font-weight: 500; color: #1e7e34; }
    .form-control { border-radius: 8px; }
    @media (max-width: 600px) {
        .complaint-add-header { flex-direction: column; align-items: flex-start; padding: 18px 10px 10px 10px; }
        .complaint-add-header .icon { margin-bottom: 8px; }
        .card { padding: 0; }
    }
</style>

<div class="container-fluid">
    <div class="complaint-add-header mb-4">
        <div class="icon"><i class="bx bx-edit"></i></div>
        <div>
            <h2>Buat Pengaduan Baru</h2>
            <p>Silakan isi form berikut untuk membuat pengaduan Anda.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 mx-auto">
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
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="mdi mdi-check-all me-2"></i>
                {{$message}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form action="{{url('user/complaint/save')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card p-4">
                    <div class="mb-3 row">
                        <label for="contents_of_the_report" class="col-md-3 col-form-label">Isi Pengaduan</label>
                        <div class="col-md-9">
                            <textarea class="form-control" rows="8" name="contents_of_the_report" id="contents_of_the_report" required></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="photo" class="col-md-3 col-form-label">Foto</label>
                        <div class="col-md-9">
                            <input class="form-control" type="file" id="photo" name="photo" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="offset-md-3 col-md-9">
                            <button type="submit" class="btn btn-success">Kirim Pengaduan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection