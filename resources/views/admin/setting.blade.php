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
                <h2 class="main-content-title tx-24 mg-b-5">Banners</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Banner List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Banner</li>
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

        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.setting_update')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$setting->id}}">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="tab-content">
                                        <div class="tab-pane active show" id="tabs-detail" role="tabpanel">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3 position-relative" style="">
                                                        <label for="email" class="form-label required">Email <span class="text-danger">*</span> </label>
                                                        <input class="form-control" name="email" value="{{$setting->email}}" type="text" id="email" required>
                                                        <div id="password-error" class="invalid-feedback" style="display: block;"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3 position-relative" style="">
                                                        <label for="phone" class="form-label required">Phone <span class="text-danger">*</span></label>
                                                        <input class="form-control" name="phone" value="{{$setting->phone}}" type="text" id="phone" required>
                                                        <div id="password-error" class="invalid-feedback" style="display: block;"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col-lg-12">
                                                    <label for="Logo" class="form-label required">Logo <span class="text-danger">*</span></label>
                                                    <div class="mb-3 position-relative">
                                                        <div class="custom-file-upload">
                                                            <input class="form-control-file" name="logo" type="file" id="profile" onchange="updateFileName()">
                                                            <label for="profile" class="file-label" id="fileLabel">
                                                                <i class="fas fa-cloud-upload-alt"></i> Choose file
                                                            </label>
                                                        </div>
                                                        <div id="password-error" class="invalid-feedback" style="display: block;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                                <div class="col-md-3 mt-4">
                                    <div class="card meta-boxes">
                                        <div class="card-header">
                                            <h4 class="card-title">
                                                <label for="status" class="form-label">Logo</label>
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="image-box image-box-avatar" action="select-image">
                                                <div style="width: 8rem" class="preview-image-wrapper mb-1">
                                                    <div class="preview-image-inner" style="cursor: pointer;"
                                                        data-toggle="modal" data-target="#exampleModal">
                                                        @if($setting->logo)
                                                        <img class="preview-image default-image" src="{{asset($setting->logo)}}"
                                                            alt="Preview image" style="height:50px">
                                                        @else
                                                        <img class="preview-image default-image"
                                                            src="https://leadinsightcrm.in/vendor/core/core/base/images/placeholder.png"
                                                            alt="Preview image" style="height:50px">
                                                        @endif
                                                        <span class="image-picker-backdrop"></span>
                                                        <button
                                                            class="btn btn-pill btn-icon  btn-sm image-picker-remove-button p-0"
                                                            style="display: none; --bb-btn-font-size: 0.5rem;" type="button"
                                                            data-bb-toggle="image-picker-remove" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" aria-label="Remove image"
                                                            data-bs-original-title="Remove image">
                                                            <svg class="icon icon-sm icon-left"
                                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                <path d="M18 6l-12 12"></path>
                                                                <path d="M6 6l12 12"></path>
                                                            </svg>
                                                        </button>
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

<script>
    function updateFileName() {
        const fileInput = document.getElementById('profile');
        const fileLabel = document.getElementById('fileLabel');
        const fileName = fileInput.files.length > 0 ? fileInput.files[0].name : 'Choose file';
        fileLabel.innerHTML = `<i class="fas fa-cloud-upload-alt"></i> ${fileName}`;
    }
</script>