@extends('admin.layout.adminapp')
@section('content')

<div class="container">
    <div class="inner-body">

        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Meta SEO KEYWORDS</h2>
                <!-- <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home Page Meta SEO</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Seo</li>
                </ol> -->
            </div>
            <div class="d-flex">
                <div class="justify-content-center">
                </div>
            </div>
        </div>
        <!-- End Page Header -->

        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.meta_seo_footer_update')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$data->id}}">
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="tab-content">
                                        <div class="tab-pane active show" id="tabs-detail" role="tabpanel">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3 position-relative" style="">
                                                        <label for="meta_description" class="form-label required">Meta keywords</label>
                                                        <textarea class="form-control" name="meta_keywords" id="meta_keywords" style="height: 100px;">{{$data->meta_keywords ?? '' }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
<!-- Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<!-- Summernote CSS and JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#meta_keywords').summernote();
    });
</script>
@endsection