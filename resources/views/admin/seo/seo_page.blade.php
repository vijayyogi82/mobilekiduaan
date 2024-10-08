@extends('admin.layout.adminapp')
@section('content')

<div class="container">
    <div class="inner-body">

        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">{{ $datas->page_name ? ucfirst($datas->page_name)  : '' }} Meta SEO</h2>
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
                        <form method="POST" action="{{ route('admin.seo_page', $datas->page_name) }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $datas->id ?? '' }}">
                            <input type="hidden" name="save" value="save_data">
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="tab-content">
                                        <div class="tab-pane active show" id="tabs-detail" role="tabpanel">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3 position-relative" style="">
                                                        <label for="meta_title" class="form-label required">Meta Title </label>
                                                        <input class="form-control" name="meta_title" value="{{$datas->meta_title ?? ''}}" type="text" id="meta_title">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3 position-relative" style="">
                                                        <label for="canonical_url" class="form-label required">Canonical Url </label>
                                                        <input class="form-control" name="canonical_url" value="{{$datas->canonical_url ?? ''}}" type="text" id="canonical_url">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3 position-relative" style="">
                                                        <label for="meta_keywords" class="form-label required">Meta Keywords</label>
                                                        <textarea class="form-control" name="meta_keywords" id="meta_keywords" style="height: 100px;">{{$datas->meta_keywords ?? '' }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3 position-relative" style="">
                                                        <label for="meta_description" class="form-label required">Meta Description</label>
                                                        <textarea class="form-control" name="meta_description" id="meta_description" style="height: 100px;">{{$datas->meta_description ?? '' }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3 position-relative" style="">
                                                        <label for="meta_description" class="form-label required">Footer Content</label>
                                                        <textarea class="form-control" name="footer_content" id="footer_content" style="height: 100px;">{{$datas->footer_content ?? '' }}</textarea>
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
@endsection


@push('styles')
<link rel="stylesheet" href="{{asset('assets/admin/plugins/summernote/summernote-bs4.css')}}">
@endpush

@push('scripts')
    <!-- Internal Summernote js-->
    <script src="{{ asset('assets/admin/plugins/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('assets/admin/js/form-editor.js') }}"></script>
    <script>
        $(document).ready(function() {
            
            $('#footer_content').summernote({
                placeholder: 'Description',
                // tabsize: 2,
                // height: 120,
                // toolbar: [
                //     ['style', ['style']],
                //     ['font', ['bold', 'underline', 'clear']],
                //     ['color', ['color']],
                //     ['para', ['ul', 'ol', 'paragraph']],
                //     ['table', ['table']],
                //     ['insert', ['link', 'picture', 'video']],
                //     ['view', []]
                // ],
                // callbacks: {
                //     onChange: function(contents, $editable) {
                //         $('#content').val(contents);
                //     }
                // }
            });
        });
    </script>
@endpush
