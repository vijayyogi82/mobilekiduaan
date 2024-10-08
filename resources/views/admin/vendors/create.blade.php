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
                <h2 class="main-content-title tx-24 mg-b-5">Vendor</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Vendor List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Vendor Add</li>
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
                    <a href="{{route('vendors.index')}}" class="btn btn-primary my-2 btn-icon-text text-white">
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
                        <div class="mb-1">
                            <h6 class="main-content-label mb-1">Vendor Details</h6>
                        </div>
                        <form method="POST" action="{{route('vendors.store')}}" accept-charset="UTF-8" enctype="multipart/form-data" data-parsley-validate="">
                            @csrf

                            <div class="tab-content">
                                <div class="tab-pane active show" id="tabs-detail" role="tabpanel">

                                    <div class="row row-cols-lg-2">
                                        <div class="col-lg-4">
                                            <div class="mb-3 position-relative">
                                                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                                <input class="form-control" placeholder="Name" name="name" type="text" id="name" required="required">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3 position-relative">
                                                <label for="email" class="form-label required">Email <span class="text-danger">*</span></label>
                                                <input class="form-control" placeholder="example@domain.com" required="required" name="email" type="email" id="email">
                                                <div id="email-error" class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3 position-relative">
                                                <label for="phone" class="form-label">Phone </label>
                                                <input class="form-control" placeholder="Phone" name="phone" type="text" id="phone">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row row-cols-lg-2">
                                        <div class="col-lg-4">
                                            <div class="mb-3 position-relative">
                                                <label for="dob" class="form-label">Date of birth </label>
                                                <input type="date" class="form-control" name="dob">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3 position-relative" style="">
                                                <label for="shop_name" class="form-label">Shop Name </label>
                                                <input class="form-control" name="shop_name" type="text" id="shop_name">
                                                <div id="shop_name-error" class="invalid-feedback" style="display: block;"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3 position-relative" style="">
                                                <label for="password" class="form-label required">Password <span class="text-danger">*</span></label>
                                                <input class="form-control" data-counter="60" required="required" name="password" type="password" id="password">
                                                <div id="password-error" class="invalid-feedback" style="display: block;"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row row-cols-lg-2">
                                        <div class="col-lg-4">
                                            <div class="mb-3 position-relative" style="">
                                                <label for="State" class="form-label">State </label>
                                                <input class="form-control" name="state" type="text" id="State">
                                                <div id="State-error" class="invalid-feedback" style="display: block;"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3 position-relative" style="">
                                                <label for="City" class="form-label required">City </label>
                                                <input class="form-control" data-counter="60" name="city" type="City" id="City">
                                                <div id="password-error" class="invalid-feedback" style="display: block;"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3 position-relative" style="">
                                                <label for="Address" class="form-label required">Address </label>
                                                <input class="form-control" data-counter="60" name="address" type="Address" id="Address">
                                                <div id="address-error" class="invalid-feedback" style="display: block;"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-lg-4">
                                            <p>Profile</p>
                                            <div class="mb-3 position-relative">
                                                <div class="custom-file-upload">
                                                    <input class="form-control-file" name="image" type="file" id="profile" onchange="updateFileName()">
                                                    <label for="profile" class="file-label" id="fileLabel">
                                                        <i class="fas fa-cloud-upload-alt"></i> Choose file
                                                    </label>
                                                </div>
                                                <div id="password-error" class="invalid-feedback" style="display: block;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function change_status(id) {
        url = "{{ url('admin/banner/update_status') }}/" + id
        $.get(url, function() {
            alert("Status Enable&Disable");
        });
    }
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
@endsection