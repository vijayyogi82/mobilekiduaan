@extends('admin.layout.adminapp')
@section('content')

<div class="container">
    <div class="inner-body">

        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Vendor</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Vendors</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Vendor Edit</li>
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
                    <a href="{{route('vendors.index')}}" class="btn btn-primary my-2 btn-icon-text">
                        Back
                    </a>
                </div>
            </div>
        </div>
        <!-- End Page Header -->

        <!-- Row -->
        <div class="row row-sm">
            <div class="col-xl-3 col-lg-12 col-md-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <h3 class="main-content-label">My Account</h3>
                    </div>
                    <div class="card-body text-center item-user">
                        <div class="profile-pic">
                            <div class="profile-pic-img">
                                <span class="bg-success dots" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="online"></span>
                                @if($vendor->profile)
                                <img id="zoom-hover-img" src="{{asset($vendor->profile)}}" class="rounded-circle"
                                    width="100" height="100">
                                @else
                                <img src="{{asset('assets/admin/img/dummy.png')}}" class="rounded-circle" width="100"
                                    height="100">
                                @endif
                            </div>
                            <a href="#" class="text-dark">
                                <h5 class="mt-3 mb-0 font-weight-semibold">{{$vendor->name ?? ''}}</h5>
                            </a>
                        </div>
                    </div>
                    <ul class="item1-links nav nav-tabs  mb-0">
                        <li class="nav-item">
                            <a href="{{route('vendors.edit',$vendor->id)}}" class="nav-link active">
                                <i class="ti-credit-card icon1"></i> My Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('vendor.password',$vendor->id)}}" class="nav-link">
                                <i class="ti-lock"></i>Password</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-xl-9 col-lg-12 col-md-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">

                            <!-- profile section -->
                            <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                <b>vendor details</b>
                                <div class="py-2">
                                    <form method="POST" action="{{route('vendors.update',$vendor->id)}}" enctype="multipart/form-data"
                                        accept-charset="UTF-8" data-parsley-validate="">
                                        @csrf
                                        @method('PUT')
                                        <div class="tab-content">
                                            <div class="tab-pane active show" id="tabs-detail" role="tabpanel">

                                                <div class="row row-cols-lg-2">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="name" class="form-label">Name <span
                                                                    class="text-danger">*</span></label>
                                                            <input class="form-control" placeholder="Name" name="name"
                                                                value="{{$vendor->name}}" type="text" id="name"
                                                                required="required">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="email" class="form-label required">Email <span
                                                                    class="text-danger">*</span></label>
                                                            <input class="form-control" placeholder="example@domain.com"
                                                                required="required" name="email"
                                                                value="{{$vendor->email}}" type="email" id="email">
                                                            <div id="email-error" class="invalid-feedback"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="phone" class="form-label">Phone</label>
                                                            <input class="form-control" data-counter="15"
                                                                placeholder="Phone" name="phone"
                                                                value="{{$vendor->phone}}" type="text" id="phone">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row row-cols-lg-2">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="dob" class="form-label">Date of birth</label>
                                                            <input type="date" class="form-control" name="dob"
                                                                value="{{$vendor->dob}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative" style="">
                                                            <label for="shop_name" class="form-label">Shop Name </label>
                                                            <input class="form-control" name="shop_name"
                                                                value="{{$vendor->shop_name}}" type="text"
                                                                id="shop_name">
                                                            <div id="shop_name-error" class="invalid-feedback"
                                                                style="display: block;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative" style="">
                                                            <label for="gst_number" class="form-label">Gst Number
                                                            </label>
                                                            <input class="form-control" name="gst_number"
                                                                value="{{$vendor->gst_number}}" type="text"
                                                                id="gst_number">
                                                            <div id="gst_number-error" class="invalid-feedback"
                                                                style="display: block;"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row row-cols-lg-2">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative" style="">
                                                            <label for="State" class="form-label">State </label>
                                                            <input class="form-control" value="{{$vendor->state}}" name="state" type="text" id="State">
                                                            <div id="State-error" class="invalid-feedback" style="display: block;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative" style="">
                                                            <label for="City" class="form-label required">City </label>
                                                            <input class="form-control" value="{{$vendor->city}}" name="city" type="City" id="City">
                                                            <div id="password-error" class="invalid-feedback" style="display: block;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative" style="">
                                                            <label for="Address" class="form-label required">Address </label>
                                                            <input class="form-control" value="{{$vendor->address}}" name="address" type="Address" id="Address">
                                                            <div id="address-error" class="invalid-feedback" style="display: block;"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-2">
                                                    <div class="col-lg-4">
                                                        <p>Profile</p>
                                                        <div class="mb-3 position-relative">
                                                            <!-- <div class="custom-file-upload"> -->
                                                                <input class="form-control-file" name="profile" type="file" onchange="updateFileName()">
                                                                <!-- <label for="profile" class="file-label" id="fileLabel"> -->
                                                                    <!-- <i class="fas fa-cloud-upload-alt"></i> Choose file -->
                                                                <!-- </label> -->
                                                            <!-- </div> -->
                                                            <!-- <div id="password-error" class="invalid-feedback" style="display: block;"></div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- password section -->
                            <div class="tab-pane fade" id="password" role="tabpanel">
                                <div class="d-flex align-items-start pb-3 border-bottom">
                                    <div class="ps-sm-4 ps-2" id="img-section">
                                        <b>Change Password</b>
                                    </div>
                                </div>
                                <div class="py-2">
                                    <form action="{{ route('vendor.update_password', $vendor->id) }}" method="post" data-parsley-validate="">
                                        @csrf
                                        <div class="row py-2">
                                            <div class="col-md-6">
                                                <label for="password">Password <span class="text-danger">*</span></label>
                                                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="*****" required="">
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 pt-md-0 pt-3">
                                                <label for="confirm-password">Confirm Password <span class="text-danger">*</span></label>
                                                <input type="password" name="password_confirmation" id="confirm-password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="*****" required="">
                                                @error('password_confirmation')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Styles -->
@push('styles')
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

<!-- Scripts -->
@push('scripts')
<script src="{{asset('assets/admin/plugins/parsleyjs/parsley.min.js')}}"></script>
<script src="{{asset('assets/admin/js/form-validation.js')}}"></script>

<script>
    function updateFileName() {
        const fileInput = document.getElementById('profile');
        const fileLabel = document.getElementById('fileLabel');
        const fileName = fileInput.files.length > 0 ? fileInput.files[0].name : 'Choose file';
        fileLabel.innerHTML = `<i class="fas fa-cloud-upload-alt"></i> ${fileName}`;
    }
</script>
@endpush