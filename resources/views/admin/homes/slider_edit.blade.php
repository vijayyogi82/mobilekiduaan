@extends('admin.layout.adminapp')
@section('content')

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

<div class="container">
    <div class="inner-body">

        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Slider</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Slider Edit</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Slider</li>
                </ol>
            </div>
            <div class="d-flex">
                <div class="justify-content-center">
                    <a href="{{route('admin.banner.slider')}}" class="btn btn-primary my-2 btn-icon-text text-white">
                        Back
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
                        <form method="POST" action="{{route('admin.banner.slider_update',$slider->id)}}" accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="tab-content">
                                        <div class="tab-pane active show" id="tabs-detail" role="tabpanel">
                                            <div class="row row-cols-lg-2">
                                                <div class="col-lg-12">
                                                    <div class="mb-3 position-relative">
                                                        <div class="custom-file-upload">
                                                            <input class="form-control-file" name="image" type="file" id="profile" onchange="updateFileName()">
                                                            <label for="profile" class="file-label" id="fileLabel">
                                                                <i class="fas fa-cloud-upload-alt"></i> Choose file
                                                            </label>
                                                        </div>
                                                        <div id="password-error" class="invalid-feedback" style="display: block;"></div>
                                                    </div>
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary">Upload</button>
                                                    </div>
                                                    <div class="banner mt-4">
                                                        <strong>Uploaded banner</strong>
                                                        @if($slider->image)
                                                        <img id="zoom-hover-img" class="zoom-hover-img"
                                                            src="{{asset($slider->image)}}" data-toggle="modal"
                                                            data-target="#exampleModal" height="350" width="1200">
                                                        @else
                                                        <img class="zoom-hover-img"
                                                            src="{{asset('assets/vendor/core/core/base/images/placeholder.png')}}"
                                                            data-toggle="modal" data-target="#exampleModal" width="50">
                                                        @endif
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
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    jQuery(document).ready(function() {
        jQuery('#myTable').DataTable({
            "pageLength": 50,
        });
    });
    function updateFileName() {
        const fileInput = document.getElementById('profile');
        const fileLabel = document.getElementById('fileLabel');
        const fileName = fileInput.files.length > 0 ? fileInput.files[0].name : 'Choose file';
        
        fileLabel.innerHTML = `<i class="fas fa-cloud-upload-alt"></i> ${fileName}`;
    }
</script>
@endpush