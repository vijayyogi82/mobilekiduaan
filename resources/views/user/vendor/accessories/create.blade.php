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
                <div class="card">
                    <x-vendor.sidebar />
                </div>
            </div>
            <div class="col-md-9">
                <div class="card custom-card overflow-hidden">
                    <div class="card-body">
                        <div class="page-header mt-2 mb-4">
                            <div>
                                <h3 class="main-content-title">Add Mobile Accessories</h3>
                            </div>
                        </div>
                        <form method="POST" action="{{Route('vendor.accessoriesSave')}}" accept-charset="UTF-8">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-4">
                                            <label class="">Type</label>
                                            <select class="form-control select2-with-search select_accrssory" id="accrssory" name="accrssory" required=""  tabindex="-1" aria-hidden="true">
                                                <option >Select Type</option>
                                                    @foreach($accessories as $accessory)
                                                       <option value="{{$accessory->type}}">{{$accessory->type}}</option>
                                                    @endforeach
                                            </select>
                                        </div>

                                        <div class="col-4">
                                            <label class="">Brand</label>
                                            <select class="form-control select2-with-search select_brand" id="brand" name="brand" required=""  tabindex="-1" aria-hidden="true">
                                                
                                            </select>
                                        </div>

                                        <div class="col-4">
                                            <label class="">Model</label>
                                            <select class="form-control select2-with-search select_model" id="model" name="model" required=""  tabindex="-1" aria-hidden="true">
                                                
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div  class="col-12" id="chackmodel">

                                </div>
                            </div>
                            <br>
                            <button class="btn vendor-button" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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

<script>
    $(document).ready(function() {
        $('#accrssory').select2();
        $('#brand').select2();
        $('#model').select2();
        $(document).on('change', '#accrssory', function() {
            var accrssory = $(this).val();
            var url = "{{Route('vendor.accessoriesGetType')}}";
            $.ajax({
                url: url,
                method: 'GET',
                data: {
                    accrssory: accrssory
                },
                success: function(data) {
                    $('.select_brand').html(data);
                },
                error: function(xhr, status, error) {
                    console.error('AJAX request failed:', status, error);
                }
            });
        });
        $(document).on('change', '#brand', function() {
            var brand = $(this).val();
            var accrssory = $('#accrssory').val();
            var url = "{{Route('vendor.accessoriesGetBrand')}}";
            $.ajax({
                url: url,
                method: 'GET',
                data: {
                    brand: brand,
                    accrssory: accrssory
                },
                success: function(data) {
                    $('.select_model').html(data);
                },
                error: function(xhr, status, error) {
                    console.error('AJAX request failed:', status, error);
                }
            });
        });
        $(document).on('change', '#model', function() {
            var model = $(this).val();
            var brand = $('#brand').val();
            var accrssory = $('#accrssory').val();

            var url = "{{Route('vendor.accessoriesGetModel')}}";
            $.ajax({
                url: url,
                method: 'GET',
                data: {
                    model: model,
                    brand: brand,
                    accrssory: accrssory
                },
                success: function(data) {
                    console.log('data',data);
                    $('#chackmodel').html(data);
                },
                error: function(xhr, status, error) {
                    $('.loader').hide();
                    console.error('AJAX request failed:', status, error);
                }
            });
        });
    });
</script>
@endsection