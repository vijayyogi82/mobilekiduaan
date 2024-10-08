@extends('layouts.app')
@section('content')
<style>
    .active {
        background: #1d4f71;
    }
</style>

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
<section class="body-content">
    <div class="container-fluid breadcrumb__area pt-3 pb-3 mb-5">
        <div class="container">
            <div class="col-12">
                <h2>Welcome, {{Auth::user()->shop_name}}</h2>
            </div>
        </div>
    </div>
    <div class="container-fluid p-3">
        <div class="row">

            <div class="col-12">
                <button class="btn vendor-button" id="filter-toggle-button">Menu</button>
            </div>

            <div class="col-md-3 filter-column" id="filter-column">

                <button type="button" class="close d-block d-md-none" id="close-filter" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <!-- <div class="card"> -->
                    <x-vendor.sidebar />
                <!-- </div> -->
            </div>
            <div class="col-md-9">
                <div class="card custom-card overflow-hidden">
                    <div class="card-body">
                        <div class="page-header mt-2 mb-4">
                            <div>
                                <h6 class="mx-3"><strong> Banners Add (1365X260px)</strong></h6>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-md-12">
                                <div class="container my-2">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3 position-relative">
                                                <div class="custom-file-upload">
                                                    <input class="form-control-file" name="img[]" type="file"
                                                        id="profile" onchange="updateFileName()" multipal>
                                                    <label for="profile" class="file-label" id="fileLabel">
                                                        <i class="fas fa-cloud-upload-alt"></i> Choose file
                                                    </label>
                                                </div>
                                                <div id="password-error" class="invalid-feedback"
                                                    style="display: block;"></div>
                                                <div id="errorMessage" style="color:red;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="row">
                            @foreach($banners as $banner)
                            <div class="col-md-10">
                                <img src="{{asset($banner->img)}}" alt="MKD" class="mb-2"
                                    style="max-height: 300px; width: 100%; padding: 10px;border: 1px solid; margin: 10px;">
                            </div>
                            <div class="col-md-2" style="position: relative; top: 22px;">
                                <form action="{{Route('vendor.bannerDelete',$banner->id)}}" method="post">
                                    @csrf
                                    <button class="btn btn-danger btn-sm m-1" onclick="return confirm('Are You Sure ?')">Delete</button>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Updated Bootstrap Cropper Modal -->
    <div class="modal fade" id="cropImageModal" tabindex="-1" aria-labelledby="cropImageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cropImageModalLabel">Crop Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{Route('vendor.bannerSave')}}" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                        <div class="img-container">
                            <img id="imageToCrop" src="" alt="Image to crop" style="max-width: 100%;">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="cropButton" class="btn btn-primary">Crop and Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>


<!-- Include Cropper.js CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>


<script>
    $(document).ready(function () {
        var cropper;
        var image = document.getElementById('imageToCrop');

        $('#profile').change(function (event) {
            var file = event.target.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    image.src = e.target.result;
                    $('#cropImageModal').modal('show'); 
                };
                reader.readAsDataURL(file);
            }
        });

        $('#cropImageModal').on('shown.bs.modal', function () {
            cropper = new Cropper(image, {
                aspectRatio: 1365 / 260, 
                viewMode: 3,
                cropBoxResizable: false, 
                minCropBoxWidth: 1365,
                minCropBoxHeight: 260,
            });
        }).on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;
        });

        $('#cropButton').click(function () {
            var canvas = cropper.getCroppedCanvas({
                width: 1365,
                height: 260
            });

            canvas.toBlob(function (blob) {
                var formData = new FormData();
                formData.append('croppedImage', blob, 'cropped_image.jpg');

                $.ajax({
                    url: "{{ route('vendor.bannerSave') }}", 
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
                    },
                    success: function (response) {
                        $('#cropImageModal').modal('hide'); 
                        location.reload(); 
                    },
                    error: function (xhr) {
                        console.error(xhr.responseText); 
                    }
                });

            });
        });
    });
</script>


 <script>
    $(document).ready(function() {
        $('#filter-toggle-button').on('click', function() {
            $('#filter-column').toggle();
        });
        $('#close-filter').on('click', function() {
            $('#filter-column').hide();
        });
        $('#open-nav-menu').on('click', function() {
            $('.navigation-menu').toggle();
            $('.navbar-collapse').toggle();
        });
        $('.sub-menu ul').hide();
        $(".sub-menu a").click(function() {
            $(this).parent(".sub-menu").children("ul").slideToggle("100");
            $(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
        });
    });
</script> 
@endsection