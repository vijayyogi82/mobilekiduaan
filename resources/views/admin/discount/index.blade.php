@extends('admin.layout.adminapp')
@section('content')
<div class="container">
    <div class="inner-body">
        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Discount</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Discount List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Discounts</li>
                </ol>
            </div>
            <div class="d-flex">
                <div class="justify-content-center">
                    <a href="{{route('admin.discount.add')}}" class="btn btn-primary my-2 btn-icon-text text-white">
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
                                        <th class="wd-10p">ID</th>
                                        <th class="wd-20p">Start Date</th>
                                        <th class="wd-20p">End Date</th>
                                        <th class="wd-15p">Code</th>
                                        <th class="wd-15p">Discount</th>
                                        <th class="wd-20p">Created Date</th>
                                        <th class="wd-10p">Status</th>
                                        <th class="wd-22p">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($plans as $key => $plan)
                                    <tr>
                                        <td class="">{{$key+1}}</td>
                                        <td class="">{{$plan->start_date ? $plan->start_date : ''}}</td>
                                        <td class="">{{$plan->start_date ? $plan->start_date : ''}}</td>
                                        <td class="">{{$plan->code ? $plan->code : ''}}</td>
                                        <td class="">{{$plan->discount ? $plan->discount : ''}}%</td>
                                        <td class="">{{$plan->created_at ? $plan->created_at->format('Y-m-d') : ''}}</td>
                                        <td class="text-center column-key-5">
                                            <label class="form-check form-switch">
                                                <input class="form-check-input" {{$plan->status == 0 ? 'checked' : ''}} name="role" onclick="change_status({{$plan->id}})" type="checkbox" id="is_vendor">
                                                <span class="form-check-label"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{route('admin.discount.edit',$plan->id)}}" class="btn btn-sm btn-icon btn-primary mx-1 edit-btn">
                                                    <svg class="icon" data-bs-toggle="tooltip" data-bs-title="Edit" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                                        <path d="M16 5l3 3"></path>
                                                    </svg>
                                                    <span class="sr-only">Edit</span>
                                                </a>
                                                <a href="{{route('admin.discount.delete',$plan->id)}}" class="btn btn-sm btn-icon btn-danger" onclick="return confirm('Are You Sure?')">
                                                    <svg class="icon" data-bs-toggle="tooltip" data-bs-title="Delete"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M4 7l16 0"></path>
                                                        <path d="M10 11l0 6"></path>
                                                        <path d="M14 11l0 6"></path>
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                    </svg>
                                                    <span class="sr-only">Delete</span>
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