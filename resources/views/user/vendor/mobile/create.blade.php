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
                                <h3 class="main-content-title">Add Mobile</h3>
                            </div>
                        </div>
                        <form method="POST" action="{{Route('vendor.mobile.save')}}" accept-charset="UTF-8">
                            @csrf
                            
                            <div class="mobile-data">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="">Brand</label>
                                                <select class="form-control select_brand custom-select-input js-example-basic-single" id="brand" name="brand" required="" data-select2-id="brand" tabindex="-1" aria-hidden="true">
                                             
                                                    <option data-select2-id="2">Select Brand</option>
                                                    @foreach($brands as $brand)
                                                      <option value="{{$brand->brand}}">{{$brand->brand}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="col-6">
                                                <label>Model</label>
                                                <select class="form-control select2" id="model" name="model" required=""
                                                     tabindex="-1" aria-hidden="true">
                                                </select>
                                            </div>
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

<script>
   $(document).ready(function() {
    // Initialize Select2 on your selects
    $('#brand').select2();
    $('#model').select2();

    // Handle brand change
    $(document).on('change', '#brand', function() {
        var brand = $(this).val();
        var url = "{{ route('vendor.mobileModelSearch') }}";
        
        $.ajax({
            url: url,
            method: 'GET',
            data: { brand: brand },
            success: function(data) {
                // Update model dropdown
                $('#model').html(data);

                // Reinitialize Select2 for the updated model dropdown
                $('#model').select2();
            },
            error: function(xhr, status, error) {
                console.error('AJAX request failed:', status, error);
            }
        });
    });

    // Handle model change
    $(document).on('change', '#model', function() {
        var model = $(this).val();
        var type = 'new';
        $('.loader').show();
        var url = "{{ route('vendor.moblieData') }}";
        
        $.ajax({
            url: url,
            method: 'GET',
            data: { model: model, type: type },
            success: function(data) {
                $('.loader').hide();
                if (data.mess) {
                    $('#chackmodel').html(data.mess);
                    $('.vendor-button').hide();
                    location.reload();
                } else {
                    $('.mobile-data').html(data);
                    $('.vendor-button').show();
                }
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


