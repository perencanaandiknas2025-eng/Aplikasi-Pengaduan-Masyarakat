@extends('admin.layouts.main')

@section('title', 'Pengaduan | Public Complaints')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- Page Title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Berikan Balasan</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Berikan Balasan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alert Success -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="mdi mdi-check-all me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Form Balasan -->
        <div class="row">
            <div class="col-12">
                <form
                    action="{{ url('admin/complaints/save/' . $complaint->id) }}"
                    method="POST"
                >
                    @csrf

                    <div class="card">
                        <div class="card-body">

                            <!-- Respon -->
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Respon</label>
                                <div class="col-md-10">
                                    <textarea
                                        class="form-control"
                                        rows="8"
                                        name="response"
                                        placeholder="Isi balasan Anda"
                                    >{{ old('response', $response->response ?? '') }}</textarea>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Status</label>
                                <div class="col-md-10">
                                    <select name="status" class="form-select" required>
                                        <option value="">-- Pilih Status --</option>
                                        <option value="0" {{ $complaint->status == 0 ? 'selected' : '' }}>
                                            Belum Diproses
                                        </option>
                                        <option value="process" {{ $complaint->status == 'process' ? 'selected' : '' }}>
                                            Proses
                                        </option>
                                        <option value="finished" {{ $complaint->status == 'finished' ? 'selected' : '' }}>
                                            Selesai
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="mb-3 row">
                                <div class="col-md-10 offset-md-2">
                                    <button type="submit" class="btn btn-success">
                                        Simpan Balasan
                                    </button>
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
