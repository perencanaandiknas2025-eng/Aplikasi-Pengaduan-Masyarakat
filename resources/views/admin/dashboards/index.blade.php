@extends('admin.layouts.main')

@section('title', 'Dashboard | Public Complaints')

@push('css')
<style>
    .dashboard-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    }
    .welcome-card {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
        border-radius: 15px;
        overflow: hidden;
    }
    .stats-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        border: 1px solid #e9ecef;
        transition: all 0.3s ease;
    }
    .stats-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.12);
    }
    .stats-icon {
        background: linear-gradient(135deg, #1e7e34 0%, #28a745 100%);
        border-radius: 10px;
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
    }
    .chart-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 25px rgba(0,0,0,0.1);
        border: 1px solid #e9ecef;
    }
    .page-title-box h4 {
        color: #495057;
        font-weight: 600;
    }
    .breadcrumb-item.active {
        color: #6c757d;
    }
    .avatar-md img {
        border: 3px solid #fff;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
</style>
@endpush

@section('content')
<div class="page-content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="mdi mdi-check-all me-2"></i>
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="row">
            <div class="col-xl-4">
                <div class="card welcome-card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-3">
                                    <h5 class="text-white">Selamat Datang !</h5>
                                    <p class="text-white-50">Pengaduan Masyarakat</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="{{ asset('assets/images/profile-img.png') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="avatar-md profile-user-wid mb-4">
                                    {{-- Menggunakan default image jika foto null --}}
                                    <img src="{{ Auth::user()->photo ? url('avatar/'.Auth::user()->photo) : asset('assets/images/users/avatar-1.jpg') }}" alt="" class="img-thumbnail rounded-circle">
                                </div>
                                <h5 class="font-size-15 text-truncate">{{ Auth::user()->username }}</h5>
                                <p class="text-muted mb-0 text-truncate">Administrator</p>
                            </div>
                            <div class="col-sm-8">
                                <div class="pt-4">
                                    <div class="row">
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="row">
                    @php
                        $stats = [
                            ['label' => 'Pengaduan', 'value' => $complaints, 'icon' => 'bx-copy-alt'],
                            ['label' => 'Belum Diproses', 'value' => $unprocessed, 'icon' => 'bx-archive-in'],
                            ['label' => 'Proses', 'value' => $process, 'icon' => 'bx-purchase-tag-alt'],
                            ['label' => 'Selesai', 'value' => $finished, 'icon' => 'bx-cart'],
                            ['label' => 'User', 'value' => $users, 'icon' => 'bx-user-voice'],
                            ['label' => 'Masyarakat', 'value' => $society, 'icon' => 'bx-user-voice'],
                        ];
                    @endphp

                    @foreach($stats as $index => $stat)
                    <div class="col-md-4">
                        <div class="card stats-card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">{{ $stat['label'] }}</p>
                                        <h4 class="mb-0">{{ $stat['value'] }}</h4>
                                    </div>
                                    <div class="stats-icon avatar-sm rounded-circle align-self-center">
                                        <span class="avatar-title">
                                            <i class="bx {{ $stat['icon'] }} font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card chart-card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Grafik Pengaduan</h4>
                        <div style="height: 300px;">
                            <canvas id="myChartt"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@php
    // Inisialisasi array kosong untuk mencegah error jika $tahun kosong
    $th = [];
    $complaintData = [];
    foreach ($tahun as $row) {
        $th[] = $row->Tahun;
        $complaintData[] = $row->pay_total;
    }
@endphp

@endsection

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
<script>
    var ctx = document.getElementById('myChartt').getContext('2d');
    var gradient = ctx.createLinearGradient(0, 0, 0, 400);
    gradient.addColorStop(0, 'rgba(30, 126, 52, 0.8)');
    gradient.addColorStop(1, 'rgba(30, 126, 52, 0.2)');

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($th),
            datasets: [{
                label: 'Total Pengaduan',
                data: @json($complaintData),
                backgroundColor: gradient,
                borderColor: '#1e7e34',
                borderWidth: 2,
                borderRadius: 8,
                borderSkipped: false,
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
            animation: {
                duration: 2000,
                easing: 'easeInOutQuart'
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        fontColor: '#495057'
                    },
                    gridLines: {
                        color: 'rgba(0,0,0,0.05)'
                    }
                }],
                xAxes: [{
                    ticks: {
                        fontColor: '#495057'
                    },
                    gridLines: {
                        color: 'rgba(0,0,0,0.05)'
                    }
                }]
            },
            legend: {
                labels: {
                    fontColor: '#495057'
                }
            },
            tooltips: {
                backgroundColor: 'rgba(30, 126, 52, 0.8)',
                titleFontColor: '#fff',
                bodyFontColor: '#fff'
            }
        }
    });
</script>
@endpush