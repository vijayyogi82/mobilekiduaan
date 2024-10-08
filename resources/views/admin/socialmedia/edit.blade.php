@extends('admin.layout.adminapp')
@section('content')
<div class="main-content pt-0">
<div class="container">
    <div class="inner-body">
        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Social Media Edit</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Social Media</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Social Media Edit</li>
                </ol>
            </div>
            <div class="d-flex">
                <div class="justify-content-center">
                    <a type="button" href="{{URL('admin/socialmedia')}}" class="btn btn-primary my-2 btn-icon-text">
                    <i class="fas fa-arrow-circle-left"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <form class="was-validated" method="post" action="{{ route('socialmedia.update',$socialmedia->id) }}" >
                              @csrf
                              @method('PUT')
                            <div class="mb-3">
                                <label for="validationplatformname" class="form-label">PlatForm Name</label>
                                <input type="text" class="form-control border-end-0" name="platform_name" value="{{$socialmedia->platform_name}}" id="validationplatformname" required>
                            </div>
                            <div class="mb-3">
                                <label for="validationplatformurl" class="form-label">PlateForm URL</label>
                                <input type="text" class="form-control border-end-0" name="platform_url" value="{{$socialmedia->platform_url}}" id="validationplatformurl" required>
                            </div>
						
                            <div class="mb-3 my-4">
                              <button class="btn btn-primary" type="submit">Update</button>
                            </div>  
                          </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row-->
    </div>
</div>
</div>
 @endsection
