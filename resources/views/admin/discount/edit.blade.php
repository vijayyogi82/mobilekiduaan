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
        border: 2px dashed #007bff;
        border-radius: 5px;
        background-color: #f8f9fa;
        color: #007bff;
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
                <h2 class="main-content-title tx-24 mg-b-5">Discount</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.discount.index')}}">Discount List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Discount Edit</li>
                </ol>
            </div>
            <div class="d-flex">
                <div class="justify-content-center">
                    <a href="{{route('admin.discount.index')}}" class="btn btn-primary my-2 btn-icon-text text-white">
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
                        <form method="POST" action="{{route('admin.discount.update',$discount->id)}}" accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf
                            <div class="tab-content">
                                <div class="tab-pane active show" id="tabs-detail" role="tabpanel">

                                    <div class="row row-cols-lg-2">
                                        <div class="col-lg-4">
                                            <div class="mb-3 position-relative" style="">
                                                <label for="profile" class="form-label required">Statr Date <span class="text-danger">*</span></label>
                                                <input class="form-control" name="start_date" type="date" required id="start_date" value="{{$discount->start_date}}">
                                                <div id="password-error" class="invalid-feedback" style="display: block;"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3 position-relative" style="">
                                                <label for="profile" class="form-label required">End Date <span class="text-danger">*</span></label>
                                                <input class="form-control" name="end_date" type="date" value="{{$discount->end_date}}" required id="end_date">
                                                <div id="password-error" class="invalid-feedback" style="display: block;"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3 position-relative">
                                                <label for="generate" class="form-label required">Discount <span class="text-danger">*</span></label>
                                                <input class="form-control" value="{{$discount->discount}}" name="discount" type="number" required id="discount">
                                                <div id="password-error" class="invalid-feedback" style="display: block;"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row row-cols-lg-2">
                                        <div class="col-lg-4">
                                            <div class="mb-3 position-relative">
                                                <label for="code" class="form-label required">Discount Code <span class="text-danger">*</span></label>
                                                <input class="form-control" value="{{$discount->code}}" name="code" type="text" required id="code" readonly>
                                                <div id="password-error" class="invalid-feedback" style="display: block;"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3 position-relative">
                                                <label for="generate" class="form-label">Generate Code</label>
                                                <button type="button" class="btn btn-success" id="generate-code-button">Generate</button>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary" type="submit">Submit</button>
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
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('generate-code-button').addEventListener('click', function() {
            var code = generateRandomCode(6);
            document.getElementById('code').value = code;
        });

        function generateRandomCode(length) {
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var result = '';
            for (var i = 0; i < length; i++) {
                var randomIndex = Math.floor(Math.random() * characters.length);
                result += characters[randomIndex];
            }
            return result;
        }
    });
</script>