@extends('admin.layouts.main')
@section('title','Management User | Public Complaints')
@section('css')
<link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
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
    .btn-action {
        border-radius: 8px;
        margin: 0 2px;
        transition: all 0.3s ease;
    }
    .btn-action:hover {
        transform: scale(1.05);
    }
    .avatar-img {
        border-radius: 50%;
        border: 2px solid #e9ecef;
        width: 40px;
        height: 40px;
        object-fit: cover;
        transition: all 0.3s ease;
    }
    .avatar-img:hover {
        border-color: #1e7e34;
        transform: scale(1.1);
    }
    .btn-add {
        background: linear-gradient(135deg, #1e7e34 0%, #28a745 100%);
        border: none;
        border-radius: 8px;
        padding: 10px 20px;
        color: white;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    .btn-add:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(30, 126, 52, 0.3);
    }
    .badge-custom {
        font-size: 12px;
        padding: 6px 12px;
        border-radius: 20px;
        font-weight: 500;
    }
</style>
@endsection
@section('content')
<div class="page-content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Management User</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">User</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-xl-4 col-md-6">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="bx bx-group"></i>
                    </div>
                    <div class="stats-number">{{ $users->count() }}</div>
                    <div class="stats-label">Total User</div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="bx bx-user-check"></i>
                    </div>
                    <div class="stats-number">{{ $users->whereNotNull('photo')->count() }}</div>
                    <div class="stats-label">Dengan Foto</div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="bx bx-user-x"></i>
                    </div>
                    <div class="stats-number">{{ $users->whereNull('photo')->count() }}</div>
                    <div class="stats-label">Tanpa Foto</div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <a href="{{route('users.create')}}" class="btn btn-add waves-effect waves-light">
                    <i class="bx bx-plus"></i> Tambah User
                </a>
            </div>
        </div>
        <br>
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="mdi mdi-check-all me-2"></i>
            {{$message}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <br>
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
                                <th>Email</th>
                                <th>Username</th>
                                <th>Telepon</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    @if ($row->photo == NULL)
                                    <td><span class="badge badge-custom bg-warning">Tidak Ada</span></td>
                                    @else
                                    <td><img class="avatar-img" src="{{ url('/avatar/'.$row->photo) }}" alt="Foto"></td>
                                    @endif
                                    <td>{{$row->officer_name}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{$row->username}}</td>
                                    <td>{{$row->phone_number}}</td>
                                    <td>
                                        <span class="badge badge-custom bg-primary">{{$row->Level->name}}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('users.edit', $row->id) }}" class="btn btn-info btn-action btn-sm">
                                            <i class="bx bx-edit"></i> Edit
                                        </a>
                                        <a href="javascript: void(0);" class="btn btn-danger btn-action btn-sm btn-delete" title="Delete Data" user-id="{{$row->id}}">
                                            <i class="bx bx-trash-alt"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$users->links()}}
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
    $('.btn-delete').click(function(){
        var user_id = $(this).attr('user-id');
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success mt-2',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: !0,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        confirmButtonClass:"btn btn-success mt-2",
        cancelButtonClass:"btn btn-danger ms-2 mt-2",
        buttonsStyling:!1}).then((result) => {
        if (result.isConfirmed) {
            window.location = "{{url('admin/users/delete')}}/"+user_id+"";
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
</script>
@endpush