@extends('admin.layout.adminapp')
@section('content')

<div class="container">
    <div class="inner-body">

        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Plan</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Plan List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Plans</li>
                </ol>
            </div>
            <div class="d-flex">
                <div class="justify-content-center">
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
                                        <th>ID</th>
                                        <th>Plan Name</th>
                                        <th>Price</th>
                                        <th>CreatedAt</th>
                                        <th>Status</th>
                                        <th>Operations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($plans as $key => $plan)
                                    <tr class="">
                                        <td>{{$key+1}}</td>
                                        <td>{{$plan->name ? $plan->name : ''}}</td>
                                        <td>{{$plan->price ? $plan->price : ''}}</td>
                                        <td>{{$plan->created_at ? $plan->created_at->format('Y-m-d') : ''}}</td>
                                        <td>
                                            <label class="form-check form-switch">
                                                <input class="form-check-input" {{$plan->status == 0 ? 'checked' : ''}} name="role" onclick="change_status({{$plan->id}})" type="checkbox" id="is_vendor">
                                                <span class="form-check-label"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <div class="">
                                                <button type="button" class="btn btn-sm btn-icon btn-primary m-1 edit-btn" data-plan-id="{{$plan->id}}" data-plan-name="{{$plan->name}}" data-plan-price="{{$plan->price}}" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$plan->id}}">
                                                    <svg class="icon" data-bs-toggle="tooltip" data-bs-title="Edit" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                                        <path d="M16 5l3 3"></path>
                                                    </svg>
                                                    <span class="sr-only">Edit</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade modal-blur" id="exampleModal_{{$plan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Plan Price</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">X</button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.plans.update',$plan->id) }}" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" name="price" id="price" placeholder="Enter price" value="{{$plan->price}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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

    function change_status(id) {
        url = "{{ url('admin/banner/update_status') }}/" + id
        $.get(url, function() {
            alert("Status Enable&Disable");
        });
    }

   
</script>
@endpush