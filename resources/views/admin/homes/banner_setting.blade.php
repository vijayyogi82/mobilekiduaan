@extends('admin.layout.adminapp')
@section('content')
<div class="container">
    <div class="inner-body">

        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Banner setting</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Banner setting</a></li>
                    <li class="breadcrumb-item active" aria-current="page">setting</li>
                </ol>
            </div>
            <div class="d-flex">
                <div class="justify-content-center">
                    <!-- <a href="{{route('homes.create')}}" class="btn btn-primary my-2 btn-icon-text text-white"
                        data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        + Add Banner
                    </a> -->
                </div>
            </div>
        </div>
        <!-- End Page Header -->

        <!-- Row -->
        <div class="row row-sm">

            <!-- pages -->
            <div class="col-md-6">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Banners page</h5>
                            </div>
                            <div class="col-md-6 mb-2">
                                <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    + Add New Banner Page
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example1">
                                <thead>
                                    <tr>
                                        <th class="wd-10p">ID</th>
                                        <th class="wd-10p">Page Name</th>
                                        <th class="wd-20p">Created Date</th>
                                        <th class="wd-20p">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pages as $key=> $banner)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$banner->name ?? ''}}</td>
                                        <td>
                                            {{$banner->created_at ? $banner->created_at->format('Y-m-d') : ''}}
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="btn btn-sm btn-icon btn-primary mx-1"
                                                    href="">
                                                    <svg class="icon" data-bs-toggle="tooltip" data-bs-title="Edit"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path
                                                            d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1">
                                                        </path>
                                                        <path
                                                            d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                                        </path>
                                                        <path d="M16 5l3 3"></path>
                                                    </svg>
                                                    <span class="sr-only">Edit</span>
                                                </a>
                                                <a href=""
                                                    class="btn btn-sm btn-icon btn-danger"
                                                    onclick="return confirm('Are You Sure?')">
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

            <!-- location -->
            <div class="col-md-6">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Banners location</h5>
                            </div>
                            <div class="col-md-6 mb-2">
                                <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                    + Add New Location
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example2">
                                <thead>
                                    <tr>
                                        <th class="wd-10p">ID</th>
                                        <th class="wd-10p">Page Name</th>
                                        <th class="wd-10p">Location</th>
                                        <th class="wd-20p">Created Date</th>
                                        <th class="wd-20p">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($locations as $key=> $banner)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$banner->page ? $banner->page->name : ''}}</td>
                                        <td>{{$banner->name ?? ''}}</td>
                                        <td>
                                            {{$banner->created_at ? $banner->created_at->format('Y-m-d') : ''}}
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="btn btn-sm btn-icon btn-primary mx-1"
                                                    href="">
                                                    <svg class="icon" data-bs-toggle="tooltip" data-bs-title="Edit"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path
                                                            d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1">
                                                        </path>
                                                        <path
                                                            d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                                        </path>
                                                        <path d="M16 5l3 3"></path>
                                                    </svg>
                                                    <span class="sr-only">Edit</span>
                                                </a>
                                                <a href=""
                                                    class="btn btn-sm btn-icon btn-danger"
                                                    onclick="return confirm('Are You Sure?')">
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

<!-- Add Banner Page Modal -->
<div class="modal fade modal-blur" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Banner Page Name</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.banner.page_store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" id="price" placeholder="Enter page name" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add Location Modal -->
<div class="modal fade modal-blur" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Add Banner Location</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.banner.location_store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Page Name <span class="text-danger">*</span></label>
                                <select name="page_id" id="" class="form-control" required>
                                    <option value="">Select Page</option>
                                    @foreach($pages as $page)
                                    <option value="{{$page->id}}">{{$page->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">Banner Location <span class="text-danger">*</span></label>
                            <select name="name" id="name" class="form-control" required>
                                <option value="">Add Location</option>
                                <option value="location 1">location 1</option>
                                <option value="location 2">location 2</option>
                                <option value="location 3">location 3</option>
                                <option value="location 4">location 4</option>
                                <option value="location 5">location 5</option>
                                <option value="location 6">location 6</option>
                                <option value="location 7">location 7</option>
                                <option value="location 8">location 8</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
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
    .custom-file-upload {
        position: relative;
        display: inline-block;
        width: 100%;
    }
    .custom-file-upload input[type="file"] {
        display: none;
    }
    .custom-file-upload .file-label {
        display: block;
        padding: 26px 20px;
        border: 2px dashed #abb6c3;
        border-radius: 5px;
        background-color: #f8f9fa;
        color: #abb6c3;
        text-align: center;
        cursor: pointer;
        font-size: 1.2rem;
        transition: background-color 0.3s, border-color 0.3s;
        height: 90px;
    }
    .custom-file-upload .file-label:hover {
        background-color: #e9ecef;
        border-color: #0056b3;
    }
    .custom-file-upload .file-label i {
        margin-right: 10px;
    }
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
    function updateFileName() {
        const fileInput = document.getElementById('profile');
        const fileLabel = document.getElementById('fileLabel');
        const fileName = fileInput.files.length > 0 ? fileInput.files[0].name : 'Choose file';
        
        fileLabel.innerHTML = `<i class="fas fa-cloud-upload-alt"></i> ${fileName}`;
    }
</script>


@endpush