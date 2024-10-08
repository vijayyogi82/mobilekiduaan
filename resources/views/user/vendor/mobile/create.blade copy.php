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
                                <h3 class="main-content-title">Add Mobile</h3>
                            </div>
                        </div>
                        <form method="POST" action="{{Route('vendor.mobile.save')}}" accept-charset="UTF-8">
                            @csrf
                            <div class="row">
                                <div class="col-8">
                                    <div class="row">
                                        <div class="col-6">
                                            <label class="">Brand</label>
                                            <select class="form-control select2-with-search select_brand" id="brand" name="brand" required="" data-select2-id="brand" tabindex="-1" aria-hidden="true">
                                                <option data-select2-id="2">Select Brand</option>
                                                @foreach($brands as $brand)
                                                <option value="{{$brand->brand}}">{{$brand->brand}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="col-6">
                                            <label>Model</label>
                                            <select class="form-control select2" id="model" name="model" required="" data-select2-id="brand" tabindex="-1" aria-hidden="true">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                 <!-- Image -->
                                <!-- <div class="col-4 text-center">
                                    <img src="{{asset('assets/web/images/samsung-galaxy-m34-5g-3.jpg')}}" class="img-responsive" style="max-height: 300px;">
                                </div> -->
                                <!-- /Image -->
                            </div>
                            <div class="mt-3 mobile-data">
                                <div class="loader text-primary" style="display: none;">
                                    Loading...
                                </div>
                            </div>
                            <div  style="color:red" id="chackmodel"></div>
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
        $(".sub-menu a").click(function () {
            $(this).parent(".sub-menu").children("ul").slideToggle("100");
            $(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
        });
    });
</script>


<script>
	$(document).on('change', '#brand', function() {
		var brand = $(this).val();
		var url = "{{ route('vendor.mobileModelSearch') }}";
		$.ajax({
			url: url,
			method: 'GET',
			data: {
				brand: brand
			},
			success: function(data) {
				$('#model').html(data);
			},
			error: function(xhr, status, error) {
				console.error('AJAX request failed:', status, error);
			}
		});
	});
	$(document).on('change', '#model', function() {
		var model = $(this).val();
		var type = 'new';
		$('.loader').show();
		var url = "{{ route('vendor.moblieData') }}";
		$.ajax({
			url: url,
			method: 'GET',
			data: {
				model: model,
				type: type
			},
			success: function(data) {
                console.log(data);
				$('.loader').hide();
                if(data.mess){
                    $('#chackmodel').html(data.mess);
                    $('.vendor-button').hide();
                    $('.mobile-data').html(' ');
                }
                else{
                    $('.mobile-data').html(data);
                    $('.vendor-button').show();
                }
               
				// console.log('data',data);
			},
			error: function(xhr, status, error) {
				$('.loader').hide();
				console.error('AJAX request failed:', status, error);
			}
		});
	});
</script>
@endsection