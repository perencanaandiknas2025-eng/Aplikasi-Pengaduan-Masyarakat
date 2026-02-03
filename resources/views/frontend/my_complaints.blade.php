@extends('frontend.layouts.main')
@section('title','Riwayat Pengaduan | Public Complaints')
@section('css')
<link href="{{asset('frontend/assets/vendor/datatables/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
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
    .table-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 25px rgba(0,0,0,0.1);
        border: 1px solid #e9ecef;
        overflow: hidden;
    }
    .status-badge {
        padding: 4px 8px;
        border-radius: 12px;
        color: white;
        font-size: 12px;
        font-weight: bold;
    }
    .status-0 { background-color: #dc3545; }
    .status-process { background-color: #ffc107; color: #000; }
    .status-finished { background-color: #28a745; }
</style>
@endsection
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Riwayat Pengaduan Saya</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('user_home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Riwayat Pengaduan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="table-card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="bx bx-list-ul"></i> Daftar Pengaduan Saya
                        </h5>
                    </div>
                    <div class="card-body">
                        @if($complaints->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="complaints-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Kategori</th>
                                            <th>Isi Pengaduan</th>
                                            <th>Status</th>
                                            <th>Balasan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($complaints as $complaint)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ \Carbon\Carbon::parse($complaint->date_complaint)->format('d/m/Y') }}</td>
                                                <td>{{ $complaint->Category->name ?? 'N/A' }}</td>
                                                <td>
                                                    <div style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                        {{ $complaint->contents_of_the_report }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="status-badge status-{{ $complaint->status }}">
                                                        {{ ucfirst($complaint->status) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    @if($complaint->response && $complaint->response->response)
                                                        <div style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                            {{ $complaint->response->response }}
                                                        </div>
                                                    @else
                                                        <em>Belum ada balasan</em>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('detail_complaint', $complaint->id) }}" class="btn btn-sm btn-info">
                                                        <i class="bx bx-show"></i> Detail
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="bx bx-inbox" style="font-size: 48px; color: #ccc;"></i>
                                <h5 class="mt-3">Belum ada pengaduan</h5>
                                <p>Anda belum mengirimkan pengaduan apapun.</p>
                                <a href="{{ route('add_complaint') }}" class="btn btn-primary">
                                    <i class="bx bx-plus"></i> Buat Pengaduan Baru
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script src="{{asset('frontend/assets/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#complaints-table').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plurals/1.10.25/i18n/Indonesian.json"
            },
            "order": [[ 1, "desc" ]],
            "pageLength": 10
        });
    });
</script>
@endpush