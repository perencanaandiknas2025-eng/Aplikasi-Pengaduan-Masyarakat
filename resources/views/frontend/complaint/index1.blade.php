@extends('frontend.layouts.main')
@section('title','Riwayat Pengaduan - CERDIK')
@section('css')
<link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
<style>
    body { font-family: 'Poppins', sans-serif; background: #f8f9fa; }
    .complaint-header {
        background: linear-gradient(90deg, #1e7e34 60%, #218838 100%);
        color: #fff;
        border-radius: 18px;
        padding: 28px 32px 18px 32px;
        margin-bottom: 32px;
        box-shadow: 0 8px 32px rgba(30,126,52,0.12);
        display: flex;
        align-items: center;
        gap: 18px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .complaint-header:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 40px rgba(30,126,52,0.15);
    }
    .complaint-header .icon {
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
        transition: transform 0.3s ease;
    }
    .complaint-header:hover .icon {
        transform: scale(1.1);
    }
    .complaint-header h2 {
        font-size: 1.7rem;
        font-weight: 700;
        margin-bottom: 2px;
    }
    .complaint-header p {
        margin-bottom: 0;
        font-size: 1.05rem;
        opacity: .92;
    }
    .card {
        border-radius: 14px;
        box-shadow: 0 4px 24px rgba(30,126,52,0.08);
        border: 1px solid #e6e6e6;
        transition: box-shadow 0.3s ease;
    }
    .card:hover {
        box-shadow: 0 8px 32px rgba(30,126,52,0.12);
    }
    .table thead th {
        background: #eafaf0;
        color: #1e7e34;
        font-weight: 600;
        border-top: none;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .table tbody tr {
        transition: background-color 0.2s ease;
    }
    .table tbody tr:hover {
        background-color: #f8f9fa;
    }
    .empty-state {
        padding: 2rem 1rem;
        text-align: center;
    }
    .badge {
        font-size: 0.85em;
        padding: 0.5em 1em;
        border-radius: 1em;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .btn-info {
        background: #218838;
        border: none;
        color: #fff;
        border-radius: 50px;
        padding: 6px 22px;
        font-weight: 500;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
        text-align: center;
    }
    .btn-info:hover {
        background: #166c2c;
        color: #fff;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(33, 136, 56, 0.3);
    }
    .error-message {
        background: #f8d7da;
        color: #721c24;
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #f5c6cb;
        margin-bottom: 20px;
    }
    .loading {
        text-align: center;
        padding: 40px;
        color: #6c757d;
    }
    /* Fix for header overlap */
    .container-fluid {
        padding-top: 120px;
    }

    /* ===== CUSTOM NAV MENU STYLES ===== */
    .custom-nav-menu {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        list-style: none;
        margin: 0;
        padding: 0;
        align-items: center;
    }

    .menu-item {
        position: relative;
        flex: 0 0 auto;
        min-width: 0;
    }

    .menu-link {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1rem;
        font-size: clamp(0.875rem, 2.5vw, 1rem);
        font-weight: 500;
        color: #545a6d;
        text-decoration: none;
        border-radius: 8px;
        transition: all 0.3s ease;
        white-space: nowrap;
        word-wrap: break-word;
        line-height: 1.4;
        min-height: 2.5rem;
        background: transparent;
        border: 1px solid transparent;
    }

    .menu-link:hover {
        color: #556ee6;
        background: rgba(85, 110, 230, 0.1);
        transform: translateY(-1px);
    }

    .menu-link.active {
        color: #556ee6;
        background: rgba(85, 110, 230, 0.15);
        font-weight: 600;
    }

    .menu-link i {
        font-size: 1.1em;
        flex-shrink: 0;
    }

    .menu-text {
        flex: 1;
        min-width: 0;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .dropdown-arrow {
        font-size: 0.8em;
        margin-left: auto;
        transition: transform 0.3s ease;
    }

    .menu-item.dropdown:hover .dropdown-arrow {
        transform: rotate(180deg);
    }

    .dropdown-menu {
        border: none;
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        border-radius: 8px;
        padding: 0.5rem 0;
        margin-top: 0.5rem;
        min-width: 200px;
    }

    .dropdown-item {
        padding: 0.75rem 1.25rem;
        font-size: 0.9rem;
        color: #545a6d;
        transition: all 0.2s ease;
    }

    .dropdown-item:hover {
        background: #f8f9fa;
        color: #556ee6;
        transform: translateX(5px);
    }

    /* ===== RESPONSIVE DESIGN ===== */
    @media (max-width: 768px) {
        .custom-nav-menu {
            flex-direction: column;
            gap: 0.5rem;
            align-items: stretch;
        }

        .menu-item {
            width: 100%;
        }

        .menu-link {
            justify-content: flex-start;
            padding: 1rem;
            font-size: 1rem;
        }

        .menu-link i {
            font-size: 1.2em;
        }

        .dropdown-menu {
            position: static;
            float: none;
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            border-radius: 0 0 8px 8px;
            box-shadow: none;
            margin-top: 0;
        }

        .complaint-header {
            flex-direction: column;
            align-items: flex-start;
            padding: 18px 10px 10px 10px;
        }
        .complaint-header .icon {
            margin-bottom: 8px;
        }
        .complaint-header h2 {
            font-size: 1.4rem;
        }
        .complaint-header p {
            font-size: 0.95rem;
        }
        .complaint-header:hover {
            transform: none;
            box-shadow: 0 8px 32px rgba(30,126,52,0.12);
        }
        .complaint-header:hover .icon {
            transform: none;
        }
        .card {
            padding: 0;
        }
        .card:hover {
            box-shadow: 0 4px 24px rgba(30,126,52,0.08);
        }
        .table-responsive {
            font-size: 0.85rem;
        }
        .table td, .table th {
            padding: 0.5rem;
        }
        .badge {
            font-size: 0.75rem;
            padding: 0.4em 0.8em;
        }
        .btn-info:hover {
            transform: none;
            box-shadow: none;
        }
        .table tbody tr:hover {
            background-color: transparent;
        }
        .empty-state {
            padding: 1rem 0.5rem;
        }
        .empty-state i {
            font-size: 2rem;
        }
    }

    @media (max-width: 480px) {
        .menu-link {
            padding: 0.875rem;
            font-size: 0.9rem;
        }

        .menu-text {
            font-size: 0.85rem;
        }
    }
</style>
@endsection
@section('content')
<div class="container-fluid" itemscope itemtype="https://schema.org/WebPage">
    <div class="complaint-header mb-4" role="banner" aria-labelledby="complaint-header-title">
        <div class="icon" aria-hidden="true"><i class="bx bx-history"></i></div>
        <div>
            <h1 id="complaint-header-title" itemprop="name">Riwayat Pengaduan Anda</h1>
            <p itemprop="description">Lihat status dan detail pengaduan yang telah Anda ajukan.</p>
        </div>
    </div>
    <div class="card p-3" role="main" aria-label="Tabel Riwayat Pengaduan" itemscope itemtype="https://schema.org/Table">
        <div class="table-responsive">
            <table id="datatable" class="table table-bordered dt-responsive nowrap w-100" role="table" aria-label="Data riwayat pengaduan" itemprop="about">
                <thead>
                <tr role="row">
                    <th role="columnheader" scope="col">No.</th>
                    <th role="columnheader" scope="col">Nama Pelapor</th>
                    <th role="columnheader" scope="col">Kategori</th>
                    <th role="columnheader" scope="col"><i class="bx bx-image" style="margin-right: 4px;"></i>Foto</th>
                    <th role="columnheader" scope="col">Tanggal Pengaduan</th>
                    <th role="columnheader" scope="col">Status</th>
                    <th role="columnheader" scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($complaints as $row)
                    <tr role="row">
                        <td role="cell" scope="row" itemprop="position">{{$loop->iteration}}</td>
                        <td role="cell" itemprop="author">{{ $row->society ? $row->society->name : 'N/A' }}</td>
                        <td role="cell">
                            @php
                                $categories = [
                                    1 => 'Fasilitas Sekolah',
                                    2 => 'Kurikulum dan Pembelajaran',
                                    3 => 'Tenaga Pendidik',
                                    4 => 'Administrasi',
                                    5 => 'Keamanan',
                                    6 => 'Lainnya'
                                ];
                                $categoryName = $row->Category ? $row->Category->name : ($row->category_id && isset($categories[$row->category_id]) ? $categories[$row->category_id] : 'N/A');
                            @endphp
                            {{ $categoryName }}
                        </td>
                        <td role="cell">
                            @if($row->photo && !empty($row->photo) && file_exists(public_path('avatar_complaint/' . $row->photo)))
                                <img src="{{asset('avatar_complaint/' . $row->photo)}}"
                                     alt="Foto Bukti Pengaduan"
                                     title="Foto bukti pengaduan"
                                     aria-label="Foto bukti pengaduan nomor {{$loop->iteration}}"
                                     width="90px"
                                     style="border-radius:8px; object-fit: cover; border: 2px solid #e9ecef;">
                            @else
                                <div style="width: 90px; height: 60px; border-radius:8px; background: #f8f9fa; display: flex; align-items: center; justify-content: center; border: 2px solid #e9ecef;" title="Tidak ada foto bukti" aria-label="Tidak ada foto bukti untuk pengaduan nomor {{$loop->iteration}}">
                                    <i class="bx bx-image" style="font-size: 24px; color: #6c757d;" aria-hidden="true"></i>
                                </div>
                            @endif
                        </td>
                        <td role="cell" itemprop="dateCreated">{{\Carbon\Carbon::parse($row->created_at)->format('d F Y')}}</td>
                        @if ($row->status == '0')
                            <td role="cell" itemprop="status"><span class="badge bg-danger" aria-label="Status: Belum Diproses">Belum Diproses</span></td>
                        @elseif($row->status == "process")
                            <td role="cell" itemprop="status"><span class="badge bg-primary" aria-label="Status: Sedang Diproses"><i class="bx bx-loader-alt bx-spin" style="margin-right: 4px;"></i>Sedang Diproses</span></td>
                        @else 
                            <td role="cell" itemprop="status"><span class="badge bg-success" aria-label="Status: Selesai">Selesai</span></td>
                        @endif
                        <td role="cell">
                            <a href="{{url('user/complaint/detail/'.$row->id)}}" class="btn btn-info" title="Lihat detail pengaduan" aria-label="Lihat detail pengaduan nomor {{$loop->iteration}}">
                                Lihat Detail
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr role="row">
                        <td colspan="6" role="cell" class="text-center py-4">
                            <div class="empty-state">
                                <i class="bx bx-inbox" style="font-size: 3rem; color: #6c757d; margin-bottom: 1rem;"></i>
                                <h5 style="color: #6c757d; margin-bottom: 0.5rem;">Belum ada pengaduan</h5>
                                <p style="color: #6c757d; margin-bottom: 0;">Anda belum mengajukan pengaduan apapun.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('script')
<script src="{{asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
<script>
    // Initialize DataTable and ensure navigation works properly
    $(document).ready(function() {
        try {
            // Check if DataTable is available and not already initialized
            if (typeof $.fn.DataTable !== 'undefined') {
                // Check if DataTable is already initialized on this table
                if (!$.fn.DataTable.isDataTable('#datatable')) {
                    // Initialize DataTable with custom language
                    $('#datatable').DataTable({
                        "language": {
                            "emptyTable": "Tidak ada data pengaduan yang tersedia",
                            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ pengaduan",
                            "infoEmpty": "Menampilkan 0 sampai 0 dari 0 pengaduan",
                            "infoFiltered": "(difilter dari _MAX_ total pengaduan)",
                            "lengthMenu": "Tampilkan _MENU_ pengaduan per halaman",
                            "loadingRecords": "Memuat...",
                            "processing": "Memproses...",
                            "search": "Cari:",
                            "zeroRecords": "Tidak ditemukan data yang sesuai",
                            "paginate": {
                                "first": "Pertama",
                                "last": "Terakhir",
                                "next": "Selanjutnya",
                                "previous": "Sebelumnya"
                            }
                        },
                        "responsive": true,
                        "pageLength": 10,
                        "order": [[ 3, "desc" ]], // Sort by date descending
                        "columnDefs": [
                            { "orderable": false, "targets": [2, 5] } // Disable sorting for photo and action columns
                        ]
                    });
                } else {
                    console.log('DataTable already initialized on #datatable');
                }
            } else {
                console.warn('DataTables library not loaded');
            }

            // Initialize tooltips if available
            if (typeof $.fn.tooltip !== 'undefined') {
                $('[title]').tooltip();
            }

        } catch (error) {
            console.error('Error initializing complaint history page:', error);
        }
    });
</script>
@endpush