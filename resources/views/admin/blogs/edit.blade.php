@extends('admin.layout.adminapp')
@section('content')
<div class="container">
    <div class="inner-body">

        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Blog</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Blog List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog Edit</li>
                </ol>
            </div>
            <div class="d-flex">
                <div class="justify-content-center">
                    <a href="{{route('blogs.index')}}" class="btn btn-primary my-2 btn-icon-text text-white">
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
                        <form method="POST" action="{{route('blogs.update',$data->id)}}" accept-charset="UTF-8" enctype="multipart/form-data" data-parsley-validate="">
                            @csrf
                            @method('PUT')
                            <div class="tab-content">
                                <div class="tab-pane active show" id="tabs-detail" role="tabpanel">

                                    <div class="row row-cols-lg-2">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="mb-3 position-relative">
                                                <label for="name" class="form-label">Title <span class="text-danger">*</span></label>
                                                <input class="form-control" placeholder="Title"  value="{{$data->title}}" name="title" type="text" id="name" required="required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row row-cols-lg-2">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="mb-3 position-relative" style="">
                                                <label for="State" class="form-label">description </label>
                                                <textarea name="description" id="description" class="form-control" style="height: 200px;">{{$data->description}}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row row-cols-lg-2">
                                        <div class="col-lg-6 col-md-6">
                                            <p>Image</p>
                                            <div class="mb-3 position-relative">
                                                <div class="custom-file-upload">
                                                    <input class="form-control-file" name="image" type="file" id="profile" onchange="updateFileName()">
                                                    <label for="profile" class="file-label" id="fileLabel">
                                                        <i class="fas fa-cloud-upload-alt"></i> Choose file
                                                    </label>
                                                </div>
                                                <div id="password-error" class="invalid-feedback" style="display: block;"></div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Update Blog</button>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3 position-relative">
                                                <img src="{{asset($data->image)}}" alt="image" width="500" height="200">
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

@push('styles')
<link rel="stylesheet" href="{{asset('assets/admin/plugins/summernote/summernote-bs4.css')}}">
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

@push('scripts')
    <!-- Internal Summernote js-->
    <script src="{{ asset('assets/admin/plugins/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('assets/admin/js/form-editor.js') }}"></script>

    <script>
        function updateFileName() {
            const fileInput = document.getElementById('profile');
            const fileLabel = document.getElementById('fileLabel');
            const fileName = fileInput.files.length > 0 ? fileInput.files[0].name : 'Choose file';
            fileLabel.innerHTML = `<i class="fas fa-cloud-upload-alt"></i> ${fileName}`;
        }
    </script>
    <script>
        $(document).ready(function() {
            
            $('#description').summernote({
                placeholder: 'Description',
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', []]
                ],
                callbacks: {
                    onChange: function(contents, $editable) {
                        $('#content').val(contents);
                    }
                }
            });
        });
    </script>
@endpush

