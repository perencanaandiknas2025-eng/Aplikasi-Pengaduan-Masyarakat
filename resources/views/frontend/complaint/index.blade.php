@extends('frontend.layouts.main')
@section('title','Complaint')
@section('css')
<style>
    :root {
        --primary: #1e7e34;
        --dark: #222;
        --light: #f8f9fa;
    }
    body {
        font-family: 'Poppins', sans-serif;
        background: var(--light);
    }
    .dashboard-scroll-area {
        max-height: calc(100vh - 120px);
        overflow-y: auto;
        padding-bottom: 24px;
        padding-top: 130px;
    }
    .dashboard-header {
        background: linear-gradient(135deg, var(--primary) 0%, #218838 50%, #28a745 100%);
        color: #ffffff;
        border-radius: 18px;
        padding: 32px 32px 24px 32px;
        margin-bottom: 32px;
        box-shadow: 0 8px 32px rgba(30,126,52,0.15);
        text-align: left;
        position: relative;
        overflow: hidden;
    }
    .dashboard-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, rgba(255,255,255,0.1) 0%, transparent 50%);
        pointer-events: none;
    }
    .dashboard-header h2 {
        font-size: 2.1rem;
        font-weight: 700;
        margin-bottom: 8px;
        color: #ffffff !important;
        text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        position: relative;
        z-index: 1;
    }
    .dashboard-header p {
        font-size: 1.1rem;
        margin-bottom: 0;
        color: #f0f8f0 !important;
        text-shadow: 0 1px 2px rgba(0,0,0,0.2);
        position: relative;
        z-index: 1;
    }
    .dashboard-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 24px;
        margin-bottom: 24px;
        margin-top: 32px;
    }
    .dashboard-card {
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 4px 24px rgba(30,126,52,0.08);
        padding: 28px 24px 20px 24px;
        display: flex;
        align-items: center;
        gap: 18px;
        border: 1px solid #e6e6e6;
        transition: box-shadow 0.2s;
        min-width: 0;
    }
    .dashboard-card:hover {
        box-shadow: 0 8px 32px rgba(30,126,52,0.16);
    }
    @media (max-width: 600px) {
        .dashboard-header {
            padding: 20px 10px 16px 10px;
            font-size: 1rem;
        }
        .dashboard-stats {
            grid-template-columns: 1fr;
            gap: 16px;
        }
        .dashboard-card {
            flex-direction: column;
            align-items: flex-start;
            padding: 18px 12px 14px 12px;
        }
        .dashboard-card .icon {
            margin-bottom: 8px;
        }
        .dashboard-action {
            padding: 16px 10px 12px 10px;
        }
    }
    .dashboard-card .icon {
        font-size: 2.5rem;
        color: var(--primary);
        background: #eafaf0;
        border-radius: 50%;
        width: 56px;
        height: 56px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .dashboard-card .info h4 {
        margin: 0;
        font-size: 1.6rem;
        font-weight: 700;
        color: var(--primary);
    }
    .dashboard-card .info p {
        margin: 0;
        color: #888;
        font-size: 1rem;
    }
    .dashboard-action {
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 4px 24px rgba(30,126,52,0.08);
        padding: 24px 24px 20px 24px;
        margin-bottom: 32px;
        border: 1px solid #e6e6e6;
        text-align: center;
    }
    .dashboard-action h5 {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--primary);
        margin-bottom: 12px;
    }
    .dashboard-action .btn {
        padding: 10px 32px;
        font-size: 1.1rem;
        border-radius: 50px;
        font-weight: 600;
    }
    .user-info-grid {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }
    .info-row {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .info-label {
        font-weight: 600;
        color: var(--primary);
        min-width: 60px;
        font-size: 0.95rem;
    }
    .info-value {
        color: #333;
        font-size: 0.95rem;
        flex: 1;
    }
</style>
@endsection

@section('content')
<div class="container-fluid dashboard-scroll-area">
    <!-- DASHBOARD HEADER -->
    <div class="dashboard-header d-flex align-items-center mb-4" style="gap:18px;">
        <div style="display:flex;align-items:center;justify-content:center;width:140px;height:140px;border-radius:32px;box-shadow:0 2px 12px rgba(30,126,52,0.08);overflow:hidden;background:#fff3cd;">
            @if(Session::get('photo'))
                <img src="{{ url('avatar_society/'.Session::get('photo')) }}" alt="Foto User" style="width:140px;height:140px;object-fit:cover;border-radius:32px;">
            @else
                <i class="bx bx-user-circle" style="font-size:5.5rem;color:#856404;"></i>
            @endif
        </div>
        <div>
            <h2>Halo, {{ Session::get('name') ?? 'Pengguna' }}</h2>
            <div>Selamat datang di Dashboard Pengaduan Masyarakat Dinas Pendidikan</div>
            <div class="mt-2 p-3 bg-white rounded shadow-sm" style="font-size:1rem;color:#333;max-width:400px;">
                <div class="user-info-grid">
                    <div class="info-row">
                        <span class="info-label">Nama:</span>
                        <span class="info-value">{{ Session::get('name') }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">NIK:</span>
                        <span class="info-value">{{ Session::get('nik') }}</span>
                    </div>
                    @if(Session::get('email'))
                    <div class="info-row">
                        <span class="info-label">Email:</span>
                        <span class="info-value">{{ Session::get('email') }}</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- STATISTICS GRID -->
    <div class="dashboard-stats mb-4">
        <div class="dashboard-card">
            <div class="icon" style="background:#e3f0ff;color:#007bff;"><i class="bx bx-refresh"></i></div>
            <div class="info">
                <h4>{{ $count_process ?? 0 }}</h4>
                <p><i class="bx bx-loader-alt bx-spin" style="margin-right: 4px;"></i>Pengaduan Diproses</p>
            </div>
        </div>
        <div class="dashboard-card">
            <div class="icon" style="background:#fff3cd;color:#ffc107;"><i class="bx bx-check-circle"></i></div>
            <div class="info">
                <h4>{{ $count_completed ?? 0 }}</h4>
                <p><i class="bx bx-check" style="margin-right: 4px;"></i>Pengaduan Selesai</p>
            </div>
        </div>
        <div class="dashboard-card">
            <div class="icon" style="background:#eafaf0;color:var(--primary);"><i class="bx bx-copy-alt"></i></div>
            <div class="info">
                <h4>{{$count_complaint}}</h4>
                <p>Total Pengaduan</p>
            </div>
        </div>
    </div>

    <!-- QUICK ACTIONS / INFO -->
    <div class="dashboard-action">
        <div class="d-flex flex-column flex-md-row align-items-center justify-content-between" style="gap:12px;">
            <div style="font-size:1.1rem;font-weight:500;color:var(--primary);">Ingin membuat pengaduan baru? Klik tombol di bawah ini.</div>
            <a href="{{ route('add_complaint') }}" class="btn btn-primary">Buat Pengaduan</a>
        </div>
    </div>

    <!-- INFO RINGKAS -->
    <div class="row mt-4">
        <div class="col-md-6 mb-3">
            <div class="p-4 bg-white rounded shadow-sm h-100">
                <h5 class="mb-2" style="color:var(--primary);font-weight:600;">Cara Kerja Pengaduan</h5>
                <ol class="mb-0" style="padding-left:18px;">
                    <li>Tulis pengaduan secara jelas dan lengkap.</li>
                    <li>Pengaduan diverifikasi oleh petugas.</li>
                    <li>Pengaduan diproses dan ditindaklanjuti.</li>
                    <li>Pengaduan selesai, Anda akan mendapat notifikasi.</li>
                </ol>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="p-4 bg-white rounded shadow-sm h-100">
                <h5 class="mb-2" style="color:var(--primary);font-weight:600;">Bantuan & Kontak</h5>
                <div>Email: <a href="mailto:diknas50@gmail.com">diknas50@gmail.com</a></div>
                <div>Telepon: 0813-2869-9687</div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    // Initialize tooltips if available
    $(document).ready(function() {
        if (typeof $.fn.tooltip !== 'undefined') {
            $('[title]').tooltip();
        }
    });
</script>
@endpush