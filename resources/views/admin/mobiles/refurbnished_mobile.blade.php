@extends('admin.layout.adminapp')
@section('content')
<div class="container">
    <div class="inner-body">

        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Refurbnished Mobiles</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Mobiles List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Mobiles</li>
                </ol>
            </div>
            <!-- <div class="d-flex">
                <div class="justify-content-center">
                    <a href="{{route('admin.mobile.add')}}" class="btn btn-primary my-2 btn-icon-text text-white">
                        + Add
                    </a>
                </div>
            </div> -->
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
                                        <th>ID</th>
                                        <th>Brand</th>
                                        <th>Name</th>
                                        <th>Is delete</th>
                                        <th>Operations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($mobiles as $key=> $mobile)
                                    <tr class="">
                                        <td>{{$key+1}}</td>
                                        <td>{{$mobile->brand}}</td>
                                        <td>{{$mobile->phone}}</td>
                                        <td>
                                            @if($mobile->is_deleted == 0)
                                            <span class="badge rounded-pill bg-success">NO</span>
                                            @else
                                            <span class="badge rounded-pill bg-danger">YES</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group d-flex">
                                                <form action="{{ route('admin.refurbnished.index') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$mobile->id}}">
                                                    <div class="btn-group d-flex">
                                                        <button class="btn btn-sm btn-icon btn-primary mx-1"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Edit" value="edit" name="submit">
                                                            <i class="ti-pencil"></i>
                                                        </button>
                                                        <button class="btn btn-sm btn-icon btn-danger mx-1"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Delete" value="delete" name="submit"
                                                            onclick="return confirm('Are You Sure?')">
                                                            <i class="ti-trash"></i>
                                                        </button>
                                                    </div>
                                                </form>
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
<link href="{{asset('assets/admin/plugins/datatable/css/buttons.bootstrap5.min.css')}}" rel="stylesheet">
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

@endpush