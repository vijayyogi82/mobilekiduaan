@extends('admin.layout.adminapp')
@section('content')
<div class="container">
    <div class="inner-body">

        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Vendor</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Vendor List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Vendor</li>
                </ol>
            </div>

            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="alert-heading">Success {{Session::get('success')}}</h4>
                </div>
            @endif

            @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="alert-heading">Error {{Session::get('error')}}</h4>
                </div>
            @endif

            <div class="d-flex">
                <div class="justify-content-center">
                    <a href="{{route('vendors.create')}}" class="btn btn-primary my-2 btn-icon-text text-white">
                        + Add
                    </a>
                </div>
            </div>
        </div>
        <!-- End Page Header -->

        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example2">
                                <thead>
                                    <tr>
                                        <th class="col-1 text-nowrap">ID</th>
                                        <th class="col-1 text-nowrap">Photo</th>
                                        <th class="col-1 text-nowrap">Name</th>
                                        <th class="col-1 text-nowrap">Email</th>
                                        <th class="col-1 text-nowrap">Created At</th>
                                        <th class="col-1 text-nowrap">Status</th>
                                        <th class="col-1 text-nowrap">Store name</th>
                                        <th class="col-2 text-nowrap">Operations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($vendors as $key=> $vendor)
                                    <tr class="">
                                        <td>{{$key+1}}</td>
                                        <td>
                                            @if($vendor->profile)
                                            <img id="zoom-hover-img" src="{{asset($vendor->profile)}}" class="rounded-circle"
                                                width="40" height="40">
                                            @else
                                            <img src="{{asset('assets/admin/img/dummy.png')}}" class="rounded-circle" width="40"
                                                height="40">
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('vendors.edit',$vendor->id)}}"  title="Show vendor">
                                            {{$vendor->name ? Str::limit($vendor->name) : ''}}</a>
                                        </td>
                                        <td>{{ $vendor->email ?  Str::limit($vendor->email) : ''}}</td>
                                        <td>{{$vendor->created_at ? $vendor->created_at->format('Y-m-d') : ''}}</td>
                                        <td>
                                            @if($vendor->status == 0)
                                            <label class="form-check form-switch ">
                                                <input class="form-check-input" checked name="role" onclick="change_status({{$vendor->id}})" type="checkbox" id="is_vendor">
                                                <span class="form-check-label"></span>
                                            </label>
                                            @else
                                            <label class="form-check form-switch">
                                                <input class="form-check-input" name="role" onclick="change_status({{$vendor->id}})" type="checkbox" id="is_vendor">
                                                <span class="form-check-label"></span>
                                            </label>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($vendor->address . ' ' . $vendor->city . ' ' . $vendor->state) }}" title="Go to location" target="_blank">
                                                {{ Str::limit($vendor->shop_name ?? '', 6) }}
                                            </a>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('vendors.edit', $vendor->id) }}" class="btn btn-sm btn-icon btn-primary mx-1" 
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                    <i class="ti-pencil"></i>
                                                </a>
                                                <a href="{{ route('vendor.password', $vendor->id) }}" class="btn btn-sm btn-icon btn-success mx-1" 
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Change Password">
                                                    <i class="ti-lock"></i>
                                                </a>
                                                <a href="{{ route('admin.vendor.delete', $vendor->id) }}" class="btn btn-sm btn-icon btn-danger mx-1" 
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" 
                                                onclick="return confirm('Are You Sure?')">
                                                    <i class="ti-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('styles')
<!-- Internal DataTables css-->
<link href="{{asset('assets/admin/plugins/datatable/css/dataTables.bootstrap5.css')}}" rel="stylesheet" />
<link href="{{asset('assets/admin/plugins/datatable/css/buttons.bootstrap5.min.css')}}"  rel="stylesheet">
<link href="{{asset('assets/admin/plugins/datatable/css/responsive.bootstrap5.css')}}" rel="stylesheet" />

<style>
/* css */
</style>
@endpush

@push('scripts')
<!-- Internal Data Table js -->
<script src="{{asset('assets/admin/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
<script src="{{asset('assets/admin/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/datatable/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/datatable/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/admin/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/datatable/responsive.bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/admin/js/table-data.js')}}"></script>

<script>
    function change_status(id) {
        url = "{{ url('admin/banner/update_status') }}/" + id
        $.get(url, function() {
            alert("Status Enable&Disable");
        });
    }
</script>
@endpush