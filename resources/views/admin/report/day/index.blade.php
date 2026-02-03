@extends('admin.layouts.main')
@section('title','Laporan CERDIK - Laporan Harian')
@section('css')
<link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
<style>
    .search-card {
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        margin-bottom: 20px;
    }

    .search-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    }

    .search-card .card-header {
        background: linear-gradient(135deg, #1e7e34 0%, #28a745 100%);
        color: white;
        border-radius: 15px 15px 0 0 !important;
        border: none;
        padding: 20px;
    }

    .search-card .card-header h5 {
        margin: 0;
        font-weight: 600;
        font-size: 1.2rem;
    }

    .search-card .card-body {
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

    .btn-secondary-custom {
        background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);
        color: white;
    }

    .btn-secondary-custom:hover {
        background: linear-gradient(135deg, #fd7e14 0%, #ffc107 100%);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 193, 7, 0.3);
    }

    .table-card {
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .table-card .card-header {
        background: linear-gradient(135deg, #1e7e34 0%, #28a745 100%);
        color: white;
        border: none;
        padding: 20px;
    }

    .table-card .card-header h5 {
        margin: 0;
        font-weight: 600;
        font-size: 1.2rem;
    }

    .table {
        margin-bottom: 0;
    }

    .table thead th {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border: none;
        font-weight: 600;
        color: #495057;
        padding: 15px;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
    }

    .table tbody tr {
        transition: all 0.3s ease;
    }

    .table tbody tr:hover {
        background-color: rgba(30, 126, 52, 0.05);
        transform: scale(1.01);
    }

    .table tbody td {
        padding: 15px;
        border: none;
        border-bottom: 1px solid #f1f3f4;
        vertical-align: middle;
    }

    .badge {
        font-size: 0.8rem;
        padding: 8px 12px;
        font-weight: 500;
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

    .page-title-box h4 {
        color: #1e7e34;
        font-weight: 600;
    }

    .breadcrumb-item.active {
        color: #1e7e34;
    }

    .stats-card {
        background: linear-gradient(135deg, #1e7e34 0%, #28a745 100%);
        border: none;
        border-radius: 15px;
        color: white;
        padding: 25px;
        text-align: center;
        margin-bottom: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }

    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    }

    .stats-card h3 {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .photo-thumbnail {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 8px;
        border: 2px solid #e9ecef;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .photo-thumbnail:hover {
        transform: scale(1.1);
        border-color: #1e7e34;
        box-shadow: 0 4px 12px rgba(30, 126, 52, 0.3);
    }

    .no-photo {
        width: 60px;
        height: 60px;
        border-radius: 8px;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #6c757d;
        border: 2px solid #dee2e6;
    }
</style>
@endsection
@section('content')
<div class="page-content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Laporan CERDIK - Laporan Harian</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Laporan CERDIK - Laporan Harian</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        
        
        <br>
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-custom alert-dismissible fade show" role="alert">
            <i class="mdi mdi-check-all me-2"></i>
            {{$message}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <br>

        <!-- Statistics Cards -->
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="stats-card">
                    <h3>{{count($data)}}</h3>
                    <p><i class="bx bx-file"></i> Total Laporan</p>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="stats-card">
                    <h3>{{count($data->where('status', '0'))}}</h3>
                    <p><i class="bx bx-time"></i> Belum Diproses</p>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="stats-card">
                    <h3>{{count($data->where('status', 'process'))}}</h3>
                    <p><i class="bx bx-loader"></i> Sedang Diproses</p>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="stats-card">
                    <h3>{{count($data->where('status', 'finished'))}}</h3>
                    <p><i class="bx bx-check"></i> Selesai</p>
                </div>
            </div>
        </div>
        <div class="row">
            <form action="{{url('admin/report/day/search')}}" method="GET" enctype="multipart/form-data">
                <div class="col-12">
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="search-card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <i class="bx bx-search"></i> Pencarian Laporan CERDIK - Laporan Harian
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="date1">Dari Tanggal</label>
                                                <input class="form-control" type="date" id="date1" name="date1" value="{{Request::get('date1')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="date2">Sampai Tanggal</label>
                                                <input class="form-control" type="date" id="date2" name="date2" value="{{Request::get('date2')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="category_id">Kategori</label>
                                                <select class="form-control" id="category_id" name="category_id">
                                                    <option value="">Semua Kategori</option>
                                                    @foreach(\App\Models\Category::all() as $category)
                                                        <option value="{{ $category->id }}" {{ Request::get('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-custom btn-primary-custom" type="submit">
                                            <i class="bx bx-search"></i> Cari Laporan
                                        </button>
                                        @if(Request::get('date1') && Request::get('date2'))
                                        <a href="{{url('admin/report/day/cetakpdf/?date1='.Request::get('date1').'&date2='.Request::get('date2').'&category_id='.Request::get('category_id'))}}" class="btn btn-custom btn-secondary-custom" target="_blank">
                                            <i class="bx bx-file"></i> Export PDF
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="stats-card">
                                <div style="font-size: 80px; margin-bottom: 20px; opacity: 0.9; color: #ffffff;">
                                    <i class="bx bx-file-find"></i>
                                </div>
                                <h6 style="color: #ffffff; font-weight: 700; text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">Informasi Laporan</h6>
                                <p style="color: #f8f9fa; font-weight: 500;">Pilih rentang tanggal untuk mencari laporan pengaduan. Data akan ditampilkan dalam tabel di bawah ini.</p>
                                <div class="mt-3">
                                    <small style="color: #e9ecef; font-weight: 600;">
                                        <i class="bx bx-info-circle"></i> Total data akan muncul setelah pencarian
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="table-card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="bx bx-table"></i> Data Laporan CERDIK - Laporan Harian
                            @if(Request::get('date1') && Request::get('date2'))
                            <span class="badge bg-light text-dark ms-2" style="font-size: 0.9rem; font-weight: 600; padding: 8px 12px;">
                                <i class="bx bx-calendar"></i> {{Request::get('date1')}} - {{Request::get('date2')}}
                            </span>
                            @endif
                        </h5>
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama Pelapor</th>
                                <th>Pengaduan</th>
                                <th>Foto</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                            </thead>

                            <tbody>
                                @forelse ($data as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <strong>{{$item->nik}}</strong>
                                        </td>
                                        <td>
                                            <strong>{{$item->society->name ?? 'N/A'}}</strong>
                                        </td>
                                        <td>
                                            <div style="max-width: 300px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                {{$item->contents_of_the_report}}
                                            </div>
                                        </td>
                                        <td>
                                            @if($item->photo && !empty($item->photo) && file_exists(public_path('avatar_complaint/' . $item->photo)))
                                                <img src="{{asset('avatar_complaint/' . $item->photo)}}"
                                                     alt="Foto Pengaduan"
                                                     class="photo-thumbnail"
                                                     onclick="showImageModal('{{asset('avatar_complaint/' . $item->photo)}}', 'Foto Pengaduan - {{$item->nik}} ({{$item->date_complaint}})')"
                                                     title="Klik untuk melihat gambar penuh">
                                            @elseif($item->photo && !empty($item->photo))
                                                <div class="no-photo" title="File tidak ditemukan: {{$item->photo}}">
                                                    <i class="bx bx-error" style="font-size: 24px; color: #dc3545;"></i>
                                                </div>
                                            @else
                                                <div class="no-photo" title="Tidak ada foto">
                                                    <i class="bx bx-image" style="font-size: 24px;"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <i class="bx bx-calendar"></i> {{$item->date_complaint}}
                                        </td>
                                        <td>
                                            @if ($item->status == "0")
                                                <span class="badge rounded-pill bg-danger">
                                                    <i class="bx bx-time"></i> Belum Diproses
                                                </span>
                                            @elseif($item->status == 'process')
                                                <span class="badge rounded-pill bg-primary">
                                                    <i class="bx bx-loader"></i> Proses
                                                </span>
                                            @else
                                                <span class="badge rounded-pill bg-success">
                                                    <i class="bx bx-check"></i> Selesai
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">
                                            <i class="bx bx-search-alt" style="font-size: 3rem; color: #6c757d;"></i>
                                            <p class="mt-2 text-muted">Tidak ada data laporan ditemukan</p>
                                            <small class="text-muted">Silakan pilih rentang tanggal untuk mencari data</small>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Image Modal -->
        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel">Foto Pengaduan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img id="modalImage" src="" alt="Foto Pengaduan" class="img-fluid rounded" style="max-height: 70vh;">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <a id="downloadBtn" href="" download class="btn btn-primary">
                            <i class="bx bx-download"></i> Download
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection
@push('script')
<script src="{{asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>  
<script src="{{asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
<script>
    // Function to show image modal
    function showImageModal(imageSrc, title) {
        document.getElementById('modalImage').src = imageSrc;
        document.getElementById('imageModalLabel').textContent = title;
        document.getElementById('downloadBtn').href = imageSrc;
        
        // Show modal
        var modal = new bootstrap.Modal(document.getElementById('imageModal'));
        modal.show();
    }

    $('.btn-delete').click(function(){
        var paket_id = $(this).attr('paket-id');
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success mt-2',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
        title: 'Apakah Anda yakin?',
        text: "Anda tidak akan dapat mengembalikan ini!",
        icon: 'warning',
        showCancelButton: !0,
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Tidak, batalkan!',
        confirmButtonClass:"btn btn-success mt-2",
        cancelButtonClass:"btn btn-danger ms-2 mt-2",
        buttonsStyling:!1}).then((result) => {
        if (result.isConfirmed) {
            window.location = "{{url('admin/transaction/delete')}}/"+paket_id+"";
        } else if (
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
            )
        }
        })
    });
    $(document).ready(function() {
        $(document).on('click', '#set_dtl', function() {
            var outlet = $(this).data('outlet');
            var type = $(this).data('type');
            var paket_name = $(this).data('paket_name');
            var price = $(this).data('price');
            var created = $(this).data('created');
            var updated = $(this).data('updated');
            $('#outlet').text(outlet);
           
            $('#type').text(type);
            $('#paket_name').text(paket_name);
            $('#price').text(price);
            $('#created').text(created);
            $('#updated').text(updated);
        })
    })
</script>
@endpush