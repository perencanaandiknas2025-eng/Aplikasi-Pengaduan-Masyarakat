@extends('admin.layouts.main')

@section('title','Pengaduan | Public Pengaduan')

@section('css')
    <!-- DataTables CSS -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <!-- SweetAlert2 CSS -->
    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
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
        .stats-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            border: 1px solid #e9ecef;
            transition: all 0.3s ease;
            padding: 20px;
            text-align: center;
        }
        .stats-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.12);
        }
        .stats-icon {
            background: linear-gradient(135deg, #1e7e34 0%, #28a745 100%);
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            margin: 0 auto 15px;
            font-size: 24px;
        }
        .stats-number {
            font-size: 28px;
            font-weight: 700;
            color: #1e7e34;
            margin-bottom: 5px;
        }
        .stats-label {
            color: #6c757d;
            font-weight: 500;
        }
        .table-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.1);
            border: 1px solid #e9ecef;
            overflow: hidden;
        }
        .table thead th {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-bottom: 2px solid #1e7e34;
            color: #495057;
            font-weight: 600;
            padding: 15px;
        }
        .table tbody tr:hover {
            background-color: #f8f9fa;
        }
        .badge-custom {
            font-size: 12px;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 500;
        }
        .btn-action {
            border-radius: 8px;
            margin: 0 2px;
            transition: all 0.3s ease;
        }
        .btn-action:hover {
            transform: scale(1.05);
        }
        .complaint-img {
            border-radius: 8px;
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
        }
        .complaint-img:hover {
            border-color: #1e7e34;
            transform: scale(1.05);
        }
    </style>
@endsection

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- Page Title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Pengaduan</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Pengaduan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alert Success -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="mdi mdi-check-all me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-xl-3 col-md-6">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="bx bx-file"></i>
                    </div>
                    <div class="stats-number">{{ $complaints->count() }}</div>
                    <div class="stats-label">Total Pengaduan</div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="bx bx-time"></i>
                    </div>
                    <div class="stats-number">{{ $complaints->where('status', '0')->count() }}</div>
                    <div class="stats-label">Belum Diproses</div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="bx bx-loader"></i>
                    </div>
                    <div class="stats-number">{{ $complaints->where('status', 'process')->count() }}</div>
                    <div class="stats-label">Sedang Diproses</div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="bx bx-check-circle"></i>
                    </div>
                    <div class="stats-number">{{ $complaints->where('status', 'finished')->count() }}</div>
                    <div class="stats-label">Selesai</div>
                </div>
            </div>
        </div>

        <!-- Table Pengaduan -->
        <div class="row">
            <div class="col-12">
                <div class="table-card">
                    <div class="card-body">
                        <table id="datatable" class="table table-hover dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($complaints as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset('avatar_complaint/'.$row->photo) }}" 
                                                 alt="Foto Pengaduan" 
                                                 class="complaint-img" 
                                                 style="width: 80px; height: 60px; object-fit: cover;">
                                        </td>
                                        <td>{{ $row->Society->name ?? 'Anonim' }}</td>
                                        <td>{{ $row->Category->name ?? 'N/A' }}</td>
                                        <td>{{ $row->created_at->format('d M Y H:i') }}</td>
                                        <td>
                                            @if ($row->status == "0")
                                                <span class="badge badge-custom bg-danger">Belum Diproses</span>
                                            @elseif($row->status == 'process')
                                                <span class="badge badge-custom bg-primary">Proses</span>
                                            @else 
                                                <span class="badge badge-custom bg-success">Selesai</span>
                                            @endif
                                        </td>
                                        <td>
                                            <!-- Tombol Edit -->
                                            <a href="{{ route('complaints.edit', $row->id) }}" 
                                               class="btn btn-info btn-action btn-sm">
                                                <i class="bx bx-edit"></i> Edit
                                            </a>

                                            <!-- Tombol Delete -->
                                            <form action="{{ route('complaints.destroy', $row->id) }}" 
                                                  method="POST" 
                                                  style="display:inline"
                                                  class="delete-form">
                                                @csrf
                                                @method('DELETE')

                                                <button type="button" class="btn btn-danger btn-action btn-sm btn-delete">
                                                    <i class="bx bx-trash-alt"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- card-body -->
                </div> <!-- table-card -->
            </div>
        </div> <!-- row -->

    </div> <!-- container-fluid -->
</div> <!-- page-content -->
@endsection

@push('script')
    <!-- DataTables JS -->
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

    <!-- SweetAlert2 JS -->
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#datatable').DataTable();

            $(document).on('click', '.btn-delete', function () {
                var form = $(this).closest('form');

                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush
