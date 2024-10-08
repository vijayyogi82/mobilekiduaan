@extends('layouts.app')
@section('content')
<section class="body-content">
    <div class="container-fluid breadcrumb__area pt-3 pb-3 mb-5">
        <div class="container">
            <div class="col-12">
                <h2>Welcome, {{Auth::user() ? Auth::user()->shop_name : ''}}</h2>
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
                                <h3 class="main-content-title">Edit New Accessory</h3>
                            </div>
                        </div>
                        <form method="POST" action="{{Route('vendor.accessoriesUpdate',$products->id)}}" accept-charset="UTF-8">
                            @csrf
                            <div class="row">
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <table class="table">
                                            <tr>
                                                <td>Model Name</td>
                                                <td>Price</td>
                                                <td>MRP</td>
                                            </tr>
                                            <tr>
                                                <td>{{$products->accessory->model_name}}</td>
                                                <td>
                                                    <input type="text" class="form-control" placeholder="Price*" name="memory_price[]" value="{{$products->memory_price}}" oninput="formatCurrency(this)"  required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" placeholder="MRP*" name="memory_mrp[]" value="{{$products->memory_mrp}}" oninput="formatCurrency(this)" required>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 mobile-data">
                                <div class="loader text-primary" style="display: none;">
                                    Loading...
                                </div>
                            </div>
                            <button class="btn vendor-button" type="submit">Update</button>
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
        $(".sub-menu a").click(function () {
            $(this).parent(".sub-menu").children("ul").slideToggle("100");
            $(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
        });
    });
</script>
@endsection