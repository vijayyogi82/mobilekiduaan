@extends('admin.layout.adminapp')
@section('content')
<div class="container">
    <div class="inner-body">

        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Vendor mobiles</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Vendor mobiles count</a></li>
                    <li class="breadcrumb-item active" aria-current="page">mobiles count</li>
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
        </div>
        <!-- End Page Header -->

        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-6">
                <div class="card custom-card">
                    <div class="card-header mb-4">
                        <h5 class="card-title">Today New mobiles</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example1">
                                <thead>
                                    <tr>
                                        <th class="col-1 text-nowrap">ID</th>
                                        <th class="col-1 text-nowrap">Vendor name</th>
                                        <th class="col-1 text-nowrap">Mobile</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($vendor_new_mobiles as $key=> $vendor)
                                    <tr class="">
                                        <td>{{$key+1}}</td>
                                        <td>
                                            <a href="{{route('vendors.edit',$vendor->vender_id)}}"  title="Show vendor">
                                                {{ $vendor->user ?  Str::limit($vendor->user->name) : ''}}
                                            </a>
                                        </td>
                                        <td>
                                            {{$vendor->mobile ? Str::limit($vendor->mobile->phone) : ''}} [{{$vendor->total_mobiles}}]
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card custom-card">
                    <div class="card-header mb-4">
                        <h5 class="card-title">Today Refurbnished mobiles</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example2">
                                <thead>
                                    <tr>
                                        <th class="col-1 text-nowrap">ID</th>
                                        <th class="col-1 text-nowrap">Vendor name</th>
                                        <th class="col-1 text-nowrap">Mobile</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($vendor_refurbnished_mobiles as $key=> $vendor)
                                    <tr class="">
                                        <td>{{$key+1}}</td>
                                        <td>
                                            <a href="{{route('vendors.edit',$vendor->vender_id)}}"  title="Show vendor">
                                                {{ $vendor->user ?  Str::limit($vendor->user->name) : ''}}
                                            </a>
                                        </td>
                                        <td>
                                            {{$vendor->mobile ? Str::limit($vendor->mobile->phone) : ''}} [{{$vendor->total_mobiles}}]
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

        <div class="row row-sm mt-4">
            <div class="col-lg-6">
                <div class="card custom-card">
                    <div class="card-header mb-4">
                        <h5 class="card-title">All New mobiles</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="myTable3">
                                <thead>
                                    <tr>
                                        <th class="col-1 text-nowrap">ID</th>
                                        <th class="col-1 text-nowrap">Vendor name</th>
                                        <th class="col-1 text-nowrap">Mobile</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($total_new_mobiles as $key=> $vendor)
                                    <tr class="">
                                        <td>{{$key+1}}</td>
                                        <td>
                                            <a href="{{route('vendors.edit',$vendor->vender_id)}}"  title="Show vendor">
                                                {{ $vendor->user ?  Str::limit($vendor->user->name) : ''}}
                                            </a>
                                        </td>
                                        <td>
                                            {{$vendor->mobile ? Str::limit($vendor->mobile->phone) : ''}} [{{$vendor->total_mobiles}}]
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card custom-card">
                    <div class="card-header mb-4">
                        <h5 class="card-title">All Refurbnished mobiles</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="myTable4">
                                <thead>
                                    <tr>
                                        <th class="col-1 text-nowrap">ID</th>
                                        <th class="col-1 text-nowrap">Vendor name</th>
                                        <th class="col-1 text-nowrap">Mobile</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($total_refurbnished_mobiles as $key=> $vendor)
                                    <tr class="">
                                        <td>{{$key+1}}</td>
                                        <td>
                                            <a href="{{route('vendors.edit',$vendor->vender_id)}}"  title="Show vendor">
                                                {{ $vendor->user ?  Str::limit($vendor->user->name) : ''}}
                                            </a>
                                        </td>
                                        <td>
                                            {{$vendor->mobile ? Str::limit($vendor->mobile->phone) : ''}} [{{$vendor->total_mobiles}}]
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

    $(document).ready( function () {
        $('#myTable3').DataTable();
    });

    $(document).ready( function () {
        $('#myTable4').DataTable();
    });

</script>


@endpush