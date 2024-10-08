@extends('admin.layout.adminapp')
@section('content')

<div class="container">
    <div class="inner-body">

        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Banner</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Banner List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Banner Add</li>
                </ol>
            </div>
            <div class="d-flex">
                <div class="justify-content-center">
                    <a href="{{route('homes.index')}}" class="btn btn-primary my-2 btn-icon-text text-white">
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
                        <form method="POST" action="{{route('homes.store')}}" accept-charset="UTF-8"
                            id="botble-ecommerce-forms-customer-form" class="js-base-form dirty-check dirty" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="tab-content">
                                        <div class="tab-pane active show" id="tabs-detail" role="tabpanel">
                                            <div class="row row-cols-lg-2">
                                                <div class="col-lg-12">
                                                    <div class="mb-3 position-relative"style="">
                                                        <label for="profile" class="form-label">Banner</label>
                                                        <input class="form-control" data-counter="60" name="image" type="file" id="profile">
                                                        <div id="password-error" class="invalid-feedback" style="display: block;"></div>
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