@extends('layouts.app')
@section('content')
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

                <!-- Sidebar -->
                    <x-vendor.sidebar />
                <!-- close  Sidebar -->

            </div>

            <div class="col-md-9">
                <div class="card custom-card overflow-hidden">
                    <div class="card-body">
                        <div class="page-header mt-2 mb-4">
                            <div>
                                <h4 class="main-content-title">Refurbnished Mobile Bulk Upload</h4>
                            </div>
                        </div>
                        <form method="POST" action="{{Route('vendor.refurbnished.bulk.mobile.save')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="mobile-data">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="">Brand <span class="text-danger">*</span> </label>
                                                <select class="form-control select_brand custom-select-input js-example-basic-single" id="brand" name="brand[]" required="" data-select2-id="brand" tabindex="-1" aria-hidden="true">
                                                    <option data-select2-id="2">Select Brand</option>
                                                    @foreach($brands as $brand)
                                                      <option value="{{$brand->brand}}">{{$brand->brand}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="brand_model">
                                            
                                        </div>

                                    </div>  
                                </div>
                            </div>
                            <div  style="color:red" id="chackmodel"></div><br>
                            <button class="btn vendor-button" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .form-control {
        border: 1px solid #ced4da;
        border-radius: 0.375rem;
        transition: all 0.3s ease-in-out;
        font-size: 0.8rem;
    }

    .form-control:focus {
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
        border-color: #80bdff;
    }
</style>

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
        $(".sub-menu a").click(function () {
            $(this).parent(".sub-menu").children("ul").slideToggle("100");
            $(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
        });
    });
</script>

<script>
   $(document).ready(function() {
    // $('#brand').select2();

    // Handle brand change
    $(document).on('change', '#brand', function() {
        var brand = $(this).val();
        var url = "{{ route('vendor.refurbnished.bulk.mobile.model.search') }}";
        console.log('url',url);
        $.ajax({
            url: url,
            method: 'GET',
            data: { brand: brand },
            success: function(data) {
                console.log('brand_model',data);
                $('.brand_model').html(data);
            },
            error: function(xhr, status, error) {
                console.error('AJAX request failed:', status, error);
            }
        });
    });
});
</script>
@endsection


