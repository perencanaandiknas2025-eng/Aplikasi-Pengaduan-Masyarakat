@extends('admin.layouts.main')

@section('title', 'Pengaduan | Public Complaints')

@section('content')

{{-- CSS KHUSUS FOTO --}}
<style>
    .complaint-photo {
        max-width: 100%;
        max-height: 400px;
        width: auto !important;
        height: auto !important;
        display: block;
        object-fit: contain;
        image-rendering: auto;
    }
    
    .card-header.bg-primary {
        background-color: #556ee6 !important;
    }

    /* Override breadcrumb divider to remove themesbrand.com */
    :root {
        --bs-breadcrumb-divider: "/";
    }
</style>

<div class="page-content">
    <div class="container-fluid">

        {{-- Page Title --}}
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Berikan Balasan</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pengaduan</a></li>
                            <li class="breadcrumb-item active">Berikan Balasan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        {{-- Alert Success --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="mdi mdi-check-all me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Detail Pengaduan --}}
        <div class="row">
            <div class="col-12">
                <div class="card border border-primary">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0 text-white">Detail Pengaduan</h5>
                    </div>

                    <div class="card-body">

                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label fw-bold">Nama</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control"
                                    value="{{ $complaint->society->name ?? 'Anonim' }}" readonly>
                            </div>

                            <label class="col-md-2 col-form-label fw-bold">NIK</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control"
                                    value="{{ $complaint->nik }}" readonly>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label fw-bold">Nomor HP</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control"
                                    value="{{ $complaint->society->phone_number ?? '-' }}" readonly>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label fw-bold">Alamat</label>
                            <div class="col-md-10">
                                <textarea class="form-control" rows="2" readonly>{{ $complaint->society->address ?? '-' }}</textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label fw-bold">Isi Pengaduan</label>
                            <div class="col-md-10">
                                {{-- Menampilkan isi laporan tanpa link themesbrand jika terbawa dari database --}}
                                <textarea class="form-control" rows="6" readonly>{{ str_replace('https://themesbrand.com/', '', $complaint->contents_of_the_report) }}</textarea>
                            </div>
                        </div>

                        {{-- BAGIAN FOTO --}}
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label fw-bold">Foto</label>
                            <div class="col-md-10">
                                @if ($complaint->photo)
                                    <div class="mb-2">
                                        <a href="{{ asset('avatar_complaint/' . $complaint->photo) }}" target="_blank">
                                            <img
                                                src="{{ asset('avatar_complaint/' . $complaint->photo) }}"
                                                alt="Foto Pengaduan"
                                                class="complaint-photo rounded border shadow-sm"
                                                onerror="this.onerror=null;this.src='{{ asset('assets/images/no-image.png') }}';"
                                            >
                                        </a>
                                    </div>
                                    <small class="text-muted">*Klik gambar untuk melihat ukuran asli</small>
                                @else
                                    <div class="alert alert-light border text-muted">
                                        <i class="mdi mdi-image-off-outline me-2"></i> Tidak ada foto terlampir.
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label fw-bold">Status Saat Ini</label>
                            <div class="col-md-4">
                                @php
                                    $badgeClass = 'bg-danger';
                                    if ($complaint->status == 'process') $badgeClass = 'bg-warning text-dark';
                                    if ($complaint->status == 'finished') $badgeClass = 'bg-success';
                                @endphp
                                <span class="badge {{ $badgeClass }} p-2">
                                    {{ $complaint->status == '0' ? 'Belum Diproses' : ucfirst($complaint->status) }}
                                </span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{-- Form Tanggapan --}}
        <div class="row mt-4">
            <div class="col-12">
                <form action="{{ url('admin/complaints/save/' . $complaint->id) }}" method="POST">
                    @csrf
                    <div class="card shadow-sm">
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0">Tanggapi Laporan</h5>
                        </div>

                        <div class="card-body">

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Respon Petugas</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" rows="8" name="response"
                                        placeholder="Tuliskan respon atau tindakan yang diambil..." required>{{ old('response', $response->response ?? '') }}</textarea>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Update Status</label>
                                <div class="col-md-10">
                                    <select name="status" class="form-select" required>
                                        <option value="">-- Pilih Status Baru --</option>
                                        <option value="0" {{ $complaint->status == '0' ? 'selected' : '' }}>Belum Diproses</option>
                                        <option value="process" {{ $complaint->status == 'process' ? 'selected' : '' }}>Proses</option>
                                        <option value="finished" {{ $complaint->status == 'finished' ? 'selected' : '' }}>Selesai</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-10 offset-md-2">
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="mdi mdi-send me-1"></i> Simpan Balasan
                                    </button>
                                    <a href="{{ url()->previous() }}" class="btn btn-light px-4">Kembali</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection