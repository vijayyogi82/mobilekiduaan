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
                            <a href="{{route('vendors.edit',$vendor->id)}}" class="nav-link">
                                <i class="ti-credit-card icon1"></i> My Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('vendor.password',$vendor->id)}}" class="nav-link active">
                                <i class="ti-lock"></i>Password</a>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="col-xl-9 col-lg-12 col-md-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">

                            <!-- password section -->
                            <div class="tab-pane fade show active" id="password" role="tabpanel">
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

@push('scripts')
<!-- Internal Parsley js-->
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