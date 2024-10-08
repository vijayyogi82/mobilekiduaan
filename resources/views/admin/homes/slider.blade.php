@extends('admin.layout.adminapp')
@section('content')
<div class="container">
    <div class="inner-body">

        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Sliders</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Slider List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Slider</li>
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
            <div class="col-lg-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="mb-1">
                            <!-- <h6 class="main-content-label mb-1">Banner Add</h6> -->
                        </div>
                        <form method="POST" action="{{route('admin.banner.slider_store')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="tab-content">
                                        <div class="tab-pane active show" id="tabs-detail" role="tabpanel">
                                            <div class="row row-cols-lg-2">
                                                <div class="col-lg-12">
                                                <label class="form-label">Slider <span class="text-danger">*</span></label>
                                                    <div class="mb-3 position-relative">
                                                        <div class="custom-file-upload">
                                                            <input class="form-control-file" name="image" type="file" id="profile" onchange="updateFileName()" required>
                                                            <label for="profile" class="file-label" id="fileLabel">
                                                                <i class="fas fa-cloud-upload-alt"></i> Choose file
                                                            </label>
                                                        </div>
                                                        <div id="password-error" class="invalid-feedback" style="display: block;"></div>
                                                    </div>
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary">Upload</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example2">
                                <thead>
                                    <tr>
                                        <th class="wd-10p">ID</th>
                                        <th class="wd-20p">Slider</th>
                                        <th class="wd-10p">Status</th>
                                        <th class="wd-20p">Created Date</th>
                                        <th class="wd-20p">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sliders as $key=> $banner)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>
                                            @if($banner->image)
                                            <a href="{{asset($banner->image)}}" target="_blank">
                                                <img id="zoom-hover-img" class="zoom-hover-img"
                                                src="{{asset($banner->image)}}" data-toggle="modal"
                                                data-target="#exampleModal" width="150">
                                            </a>
                                            @else
                                            <img class="zoom-hover-img"
                                                src="{{asset('assets/vendor/core/core/base/images/placeholder.png')}}"
                                                data-toggle="modal" data-target="#exampleModal" width="50">
                                            @endif
                                        </td>
                                        <td>
                                            <label class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" onclick="change_status({{ $banner->id }})"
                                                    {{ $banner->status == 0 ? 'checked' : '' }}>
                                                <span class="form-check-label"></span>
                                            </label>
                                        </td>
                                        <td>
                                            {{$banner->created_at ? $banner->created_at->format('Y-m-d') : ''}}
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="btn btn-sm btn-icon btn-primary mx-1"
                                                    href="{{route('admin.banner.slider_edit',$banner->id)}}">
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
                                                <a href="{{route('admin.banner.slider_delete',$banner->id)}}"
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