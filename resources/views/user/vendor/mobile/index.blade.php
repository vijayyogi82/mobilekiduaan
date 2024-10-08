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

                <!-- <div class="card"> -->
                    <x-vendor.sidebar />
                <!-- </div> -->
            </div>

            <div class="col-md-9">
                <div class="card custom-card overflow-hidden">
                    <div class="card-body">
                        <div class="page-header mt-2 mb-4">
                            <div>
                                <h3 class="main-content-title">Mobiles</h3>
                            </div>
                            <div class="d-flex">
                                <div class="justify-content-center">
                                    <a class="btn ripple login-button" href="{{Route('vendor.mobile')}}"><i class="fa fa-star me-2 pr-2"></i> Add New Mobile</a>
                                    <a class="btn ripple login-button" href="{{Route('vendor.bulk.mobiles.add')}}"><i class="fa fa-star me-2 pr-2"></i> Bulk Upload</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered border-bottom" id="example1">
                                <thead>
                                    <tr>
                                        <th class="wd-20p">Brand</th>
                                        <th class="wd-25p">Model</th>
                                        <th class="wd-20p">Price</th>
                                        <th class="wd-15p">Views</th>
                                        <th class="wd-20p">Added on</th>
                                        <th class="wd-20p">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($mobiles as $mobile)
                                    <tr>
                                        <td>{{$mobile->mobile ? $mobile->mobile->brand : ''}}</td>
                                        <td>{{$mobile->mobile ? $mobile->mobile->phone : ''}}</td>
                                        <td>₹{{ explode(';', $mobile->memory_price)[0] }}</td>
                                        <td>{{ $mobile->views ?? '0' }}</td>
                                        <td>{{$mobile->created_at}}</td>
                                        <td class="d-flex inline">
                                            <a href="{{Route('vendor.mobile.edit',$mobile->id)}}" class="btn vendor-button">Edit</a>
                                            <form action="{{Route('vendor.mobile.delete',$mobile->id)}}" method="post">
                                                @csrf
                                                <button class="btn btn-danger btn-sm mx-1" onclick="return confirm('Are You Sure ?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Internal DataTables css-->
<link href="{{asset('assets/web/assets/plugins/datatable/css/dataTables.bootstrap5.css')}}" rel="stylesheet" />
<link href="{{asset('assets/web/assets/plugins/datatable/css/buttons.bootstrap5.min.css')}}"  rel="stylesheet">
<link href="{{asset('assets/web/assets/plugins/datatable/css/responsive.bootstrap5.css')}}" rel="stylesheet" />

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Internal Data Table js -->
<script src="{{asset('assets/web/assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
<script src="{{asset('assets/web/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/web/assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/web/assets/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/web/assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{asset('assets/web/assets/plugins/datatable/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/web/assets/plugins/datatable/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/web/assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/web/assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/web/assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/web/assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/web/assets/plugins/datatable/responsive.bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/web/js/table-data.js')}}"></script>
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