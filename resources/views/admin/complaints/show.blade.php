@extends('admin.layouts.main')

@section('title','Pengaduan | Pengaduan Masyarakat')

@section('css')
    <!-- DataTables CSS -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <!-- SweetAlert2 CSS -->
    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- Page Title -->
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

        <!-- Alert Success -->
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="mdi mdi-check-all me-2"></i>
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Detail Pengaduan Table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Detail Pengaduan</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-nowrap mb-0">
                                <tbody>
                                    <tr>
                                        <td>Nama</td>
                                        <td>{{ $complaint->Society->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>NIK</td>
                                        <td>{{ $complaint->nik }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kategori</td>
                                        <td>{{ $complaint->Category->name ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Telepon</td>
                                        <td>{{ $complaint->Society->phone_number }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td>{{ \Carbon\Carbon::parse($complaint->created_at)->format('d F Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>
                                            @if ($complaint->status == '0')
                                                <span class="badge rounded-pill bg-danger">Belum DiProses</span>
                                            @elseif($complaint->status == 'process')
                                                <span class="badge rounded-pill bg-primary">Proses</span>
                                            @else
                                                <span class="badge rounded-pill bg-success">Selesai</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Foto</td>
                                        <td>
                                            <img src="{{ url('avatar_complaint/', $complaint->photo) }}" width="500px" alt="Foto Pengaduan">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Isi Pengaduan</td>
                                        <td>{{ $complaint->contents_of_the_report }}</td>
                                    </tr>
                                    <tr>
                                        <td>Respon</td>
                                        <td>
                                            {{ $response->response ?? 'Not response yet' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <a href="{{ url('admin/complaints/show', $complaint->id) }}" class="btn btn-info">Berikan Balasan</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> <!-- table-responsive -->
                    </div> <!-- card-body -->
                </div> <!-- card -->
            </div>
        </div> <!-- row -->

    </div> <!-- container-fluid -->
</div> <!-- page-content -->
@endsection

@push('script')
    <!-- DataTables JS -->
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
    
    <!-- SweetAlert2 JS -->
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <script>
        // Konfirmasi Delete
        $('.btn-delete').click(function(){
            var society_id = $(this).attr('society-id');
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Tidak, batalkan!',
                customClass: { confirmButton: 'btn btn-success mt-2', cancelButton: 'btn btn-danger ms-2 mt-2' },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "{{ url('admin/society/delete') }}/" + society_id;
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire('Cancelled', 'Your imaginary file is safe :)', 'error');
                }
            });
        });
    </script>
@endpush
