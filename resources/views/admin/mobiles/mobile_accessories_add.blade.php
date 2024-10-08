@extends('admin.layout.adminapp')
@section('content')
<div class="container">
    <div class="inner-body">
        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Accessory</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Accessories</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Accessory Add</li>
                </ol>
            </div>
            <div class="d-flex">
                <div class="justify-content-center">
                    <a href="{{route('admin.mobile.accessories')}}" class="btn btn-primary my-2 btn-icon-text">
                        Back
                    </a>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <form action="{{route('admin.mobile.accessories')}}" method="post"  enctype="multipart/form-data">
            @csrf

            <div class="row row-sm">
                <!-- Mobile  -->
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <!-- profile section -->
                                <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                    <b>ACCESSORY DETAILS</b>
                                    <div class="py-2">
                                        <div class="tab-content">
                                            <div class="tab-pane active show" id="tabs-detail" role="tabpanel">
                                                <div class="row row-cols-lg-2">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="accessory_id" class="form-label">Accessories </label>
                                                            <select name="model_name" id="accessory_id" class="form-control">
                                                                <option value="">Select Accessory</option>
                                                                @foreach($accessories as $accessory)
                                                                <option value="{{$accessory->id}}">{{$accessory->type}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row row-cols-lg-2">
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="mb-3 accessories-data">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- button -->
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="text-center">
                                <a href="{{route('admin.mobile.accessories')}}" class="btn btn-light m-2">Cancel</a>
                                <button type="submit" name="submit" value="save" class="btn btn-success m-2">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </form>
    </div>
</div>


@endsection

<!-- Styles -->
@push('styles')
<style>
    .custom-file-upload {
        display: inline-block;
        padding: 10px 20px;
        border: 2px dashed #abb6c3;
        border-radius: 5px;
        background: #f8f9fa;
        color: #abb6c3;
        cursor: pointer;
        text-align: center;
        height: 75px;
        width: 100%;
        padding: 26px 20px;
    }

    .custom-file-upload input[type="file"] {
        display: none;
    }

    .custom-file-upload:hover {
        background: #e9ecef;
    }

    .custom-file-upload:active {
        background: #ced4da;
    }

    /* hover  delete  image */
    .image-wrapper:hover .remove-button {
        display: block !important;
    }
</style>
@endpush

<!-- scripts -->
@push('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    document.getElementById('profile').addEventListener('change', function() {
        var fileInput = document.getElementById('profile');
        var fileNameDisplay = document.getElementByClass('fa-cloud-upload-alt');
        
        if (fileInput.files.length > 0) {
            fileNameDisplay.textContent = fileInput.files[0].name;
        } else {
            fileNameDisplay.textContent = 'No file chosen';
        }
    });
</script>

<script>
    $(document).ready(function(){
        $("#accessory_id").on('change', function(){
            var accessory_id = $(this).val();
            console.log('accessory id', accessory_id);
            
            if (accessory_id === "") {
                $(".accessories-data").hide();
            } else {
                $.ajax({
                    url: '{{ route("admin.mobile.accessories_data") }}',
                    method: 'GET',
                    data: {
                        id: accessory_id,
                    },
                    success: function(response) {
                        console.log('response', response);
                        $(".accessories-data").html(response).show();
                    },
                    error: function(response) {
                        alert('An error occurred while retrieving the accessory data.');
                    }
                });
            }
        });
    });
</script>
@endpush
