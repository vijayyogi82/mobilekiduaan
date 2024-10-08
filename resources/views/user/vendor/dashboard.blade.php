@extends('layouts.app')
@section('content')
<style>
    .active {
        background: #1d4f71;
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
                <!-- <div class="card"> -->
                    <x-vendor.sidebar />
                <!-- </div> -->
            </div>

            <div class="col-md-9">
                <div class="row row-sm">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-1">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="card-order ">
                                    <label class="main-content-label mb-3 pt-1">Mobiles</label>
                                    <h2 class="text-end card-item-icon card-icon">
                                    <i class="fas fa-mobile-alt icon-size float-start text-primary"></i>
                                    <span class="font-weight-bold">{{$mobiles->count() ?? 0}}</span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- COL END -->
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-1">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="card-order">
                                    <label class="main-content-label mb-3 pt-1">Refurbished Mobile</label>
                                    <h2 class="text-end">
                                    <i class="fas fa-mobile-alt icon-size float-start text-primary"></i>
                                    <span class="font-weight-bold">{{$refurbishedmobiles->count() ?? 0}}</span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- COL END -->
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-1">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="card-order">
                                    <label class="main-content-label mb-3 pt-1">Mobile Accessories</label>
                                    <h2 class="text-end">
                                    <i class="icon-size fas fa-headphones-alt float-start text-primary"></i>
                                    <span class="font-weight-bold">0</span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- COL END -->
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-1">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="card-order">
                                    <label class="main-content-label mb-3 pt-1">Store Views</label>
                                    <h2 class="text-end">
                                    <i class="fas fa-eye icon-size float-start text-primary"></i>
                                    <span class="font-weight-bold">{{$storeviews->count() ?? ''}}</span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- COL END -->
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card custom-card overflow-hidden">
                            <div class="card-body">
                                <div>
                                    <h6 class="main-content-label mb-1">Store Views</h6>
                                    <p class="text-muted  card-sub-title">Month wise store view</p>
                                </div>
                                <div class="chartjs-wrapper-demo">
                                    <canvas id="chartBar1" style="height: 400px"></canvas>
                                </div>
                            </div>
                        </div>        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Internal Chartjs charts js-->
<script src="{{asset('assets/web/js/Chart.bundle.min.js')}}"></script>
<script src="{{asset('assets/web/js/chart.chartjs.js')}}"></script>


<script>
    window.storeviewsJson = @json($storeviewsJson);
    console.log('store views Json', window.storeviewsJson);
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
        $(".sub-menu a").click(function () {
            $(this).parent(".sub-menu").children("ul").slideToggle("100");
            $(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
        });
    });
</script>



@endsection