@extends('frontend.layouts.main')
@section('title','Detail Pengaduan')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Detail Pengaduan</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Detail Pengaduan</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
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
                    Contoh
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
        </div>
        <br>
        <div class="row">
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Detail Pengaduan</h4>
                                        
        
                                        <div class="table-responsive">
                                            <table class="table table-striped table-nowrap mb-0">
                                                <br>
                                                <tbody>
                                                <tr>
                                                    <td>Nama</td>
                                                    <td>
                                                        <a href="javascript::void(0)" id="inline-username" data-type="text" data-pk="1" data-title="Enter username">{{$complaint->Society->name}}</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>NIK</td>
                                                    <td>
                                                        <a href="javascript::void(0)" id="inline-username" data-type="text" data-pk="1" data-title="Enter username">{{$complaint->nik}}</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Kategori</td>
                                                    <td>
                                                        @php
                                                            $categoryName = $complaint->Category ? $complaint->Category->name : (isset($categories[$complaint->category_id]) ? $categories[$complaint->category_id] : 'N/A');
                                                        @endphp
                                                        <a href="javascript::void(0)" id="inline-username" data-type="text" data-pk="1" data-title="Enter username">{{ $categoryName }}</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Nomor Telepon</td>
                                                    <td>
                                                        <a href="javascript::void(0)" id="inline-username" data-type="text" data-pk="1" data-title="Enter username">{{$complaint->Society->phone_number}}</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal</td>
                                                    <td>
                                                        <a href="javascript::void(0)" id="inline-username" data-type="text" data-pk="1" data-title="Enter username">{{\Carbon\Carbon::parse($complaint->created_at)->format('d F Y H:i:s')}}</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Status</td>
                                                    <td>
                                                        @if ($complaint->status == '0')
                                                            <span class="badge rounded-pill bg-danger">Belum Diproses</span>
                                                        @elseif($complaint->status == "process")
                                                            <span class="badge rounded-pill bg-primary"><i class="bx bx-loader-alt bx-spin" style="margin-right: 4px;"></i>Proses</span>
                                                        @else
                                                            <span class="badge rounded-pill bg-success">Selesai</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Foto</td>
                                                    <td>
                                                        @if($complaint->photo && file_exists(public_path('avatar_complaint/' . $complaint->photo)))
                                                            <img src="{{ asset('avatar_complaint/' . $complaint->photo) }}" alt="Foto Bukti Pengaduan" style="max-width: 500px; height: auto; border-radius: 8px; border: 2px solid #e9ecef;">
                                                        @else
                                                            <div style="width: 200px; height: 150px; border-radius: 8px; background: #f8f9fa; display: flex; align-items: center; justify-content: center; border: 2px solid #e9ecef;">
                                                                <i class="bx bx-image" style="font-size: 48px; color: #6c757d;"></i>
                                                            </div>
                                                            <p style="margin-top: 10px; color: #6c757d;">Tidak ada foto bukti</p>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Isi Pengaduan</td>
                                                    <td>
                                                        <a href="javascript::void(0)" id="inline-username" data-type="text" data-pk="1" data-title="Enter username">{{$complaint->contents_of_the_report}}</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Respon</td>
                                                    <td>
                                                        <a href="javascript::void(0)" id="inline-username" data-type="text" data-pk="1" data-title="Enter username">{{$complaint->Response->response}}</a>
                                                    </td>
                                                </tr>
                                               
                                                
            
                                                </tbody>
                                            </table>
                                        </div>
                                    
                                    
                                    
                                    
                                </div>
                                
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div> <!-- container-fluid -->
</div>
@endsection