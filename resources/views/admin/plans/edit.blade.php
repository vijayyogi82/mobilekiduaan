@extends('admin.layout.adminapp')
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <div class="page-pretitle">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.dashboard')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.plans')}}">Plans</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <h1 class="mb-0 d-inline-block fs-6 lh-1">Create</h1>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-body page-content">
    <div class="container-xl">
        <form method="POST" action="{{route('admin.plans.update',$plan->id)}}" accept-charset="UTF-8"
            id="botble-ecommerce-forms-customer-form" class="js-base-form dirty-check dirty"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-9">
                    <div class="card mb-3">
                        <div class="card-header">
                            <ul data-bs-toggle="tabs" class="nav nav-tabs card-header-tabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a href="#tabs-detail" class="nav-link active" data-bs-toggle="tab"
                                        aria-selected="true" role="tab">
                                        Detail
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active show" id="tabs-detail" role="tabpanel">
                                    <div class="row row-cols-lg-2">
                                        <div class="col-lg-12">
                                            <div class="mb-3 position-relative" style="">
                                                <label for="profile" class="form-label">Plan</label>
                                                <input class="form-control" data-counter="60" name="image" type="file"
                                                    id="profile">
                                                <div id="password-error" class="invalid-feedback"
                                                    style="display: block;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                </div>
                <div class="col-md-3 gap-3 d-flex flex-column-reverse flex-md-column mb-md-0 mb-5">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Publish
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="btn-list">
                                <button class="btn btn-primary" type="submit" value="apply" name="submitter">
                                    <svg class="icon icon-left" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2">
                                        </path>
                                        <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                        <path d="M14 4l0 4l-6 0l0 -4"></path>
                                    </svg>
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                    <div data-bb-waypoint="" data-bb-target="#form-actions"></div>
                    <header class="top-0 w-100 position-fixed end-0 z-1000 vertical-wrapper" id="form-actions"
                        style="display: none;">
                        <div class="navbar">
                            <div class="container-xl">
                                <div class="row g-2 align-items-center w-100">
                                    <div class="col">
                                        <div class="page-pretitle">
                                            <nav aria-label="breadcrumb">
                                                <ol class="breadcrumb">
                                                </ol>
                                            </nav>
                                        </div>
                                    </div>
                                    <div class="col-auto ms-auto d-print-none">
                                        <div class="btn-list">
                                            <button class="btn btn-primary" type="submit" value="apply"
                                                name="submitter">
                                                <svg class="icon icon-left" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path
                                                        d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2">
                                                    </path>
                                                    <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                    <path d="M14 4l0 4l-6 0l0 -4"></path>
                                                </svg>
                                                Save
                                            </button>
                                            <!-- <button class="btn" type="submit" name="submitter" value="save">
                                                <svg class="icon icon-left" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M4 18v3h16v-14l-8 -4l-8 4v3"></path>
                                                    <path d="M4 14h9"></path>
                                                    <path d="M10 11l3 3l-3 3"></path>
                                                </svg>
                                                Save &amp; Exit
                                            </button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!--  -->
                    <div class="card meta-boxes">
                        <div class="card-header">
                            <h4 class="card-title">
                                <label for="status" class="form-label required">Status</label>
                            </h4>
                        </div>
                        <div class="card-body">
                            <select
                                class="form-control form-select {{$plan->status == 0 ? 'is-valid' : 'is-invalid'}}"
                                required="required" id="status" name="status" aria-required="true" aria-invalid="false">
                                <option value="0" {{$plan->status == 0 ? 'selected' : ''}}>Active</option>
                                <option value="1" {{$plan->status == 1 ? 'selected' : ''}}>inactive</option>
                            </select>
                        </div>
                    </div>
                    <!--  -->
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

@endsection