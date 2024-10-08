@extends('layouts.app')

<!-- meta seo -->
@section('meta_title', $seo_meta->meta_title ?? '')
@section('meta_description', $seo_meta->meta_description ?? '')
@section('meta_keywords', $seo_meta->meta_keywords ?? '')
@section('canonical_url', $seo_meta->canonical_url ?? 'https://mobilekidukaan.in')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.min.css">
<style>
    .product-link {
        color: #000;
        text-decoration: none;
        transition: color 0.2s ease;
    }
    .product-link:hover {
        text-decoration: none;
        color: #1ecbe1; 
    }
</style>
<section class="body-content">
    <div class="container-fluid breadcrumb__area pt-3 pb-3 mb-5">
        <div class="container">
            <div class="col-12">
                @if($type == 1)
                   <h2><b>Refurbished Mobile </b></h2>
                   @else
                   <h2><b>Mobile Phone</b></h2>
                @endif
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">

            <div class="col-md-3 filter-column" id="filter-column">

                <button type="button" class="close d-block d-md-none" id="close-filter" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <div class="row white-bg">
                    <div class="col-12 mt-3">
                        <h3 class="search-title"><b>Brands</b></h3>
                        <div>
                            <ul class="list-unstyled">
                                @if(count($brands)>0)
                                    @foreach($brands as $key=>$brand)
                                    @php
                                        $isChecked = in_array($brand->brand, $brands_search);
                                    @endphp
                                    <li class="mb-2">
                                        <div class="form-check">
                                            <label class="ckbox">
                                                <input id="attribute-brand-{{$brand->id}}" type="checkbox" class="attribute-brand" data-brand_id="{{$brand->brand}}" {{$isChecked ? 'checked':''}}>
                                                <span>{{$brand->brand}}</span>
                                            </label>
                                        </div>
                                    </li>
                                    @endforeach   
                                @endif
                            </ul>
                        </div>

                    </div>

                    <div class="col-12 mt-3">
                        <h3 class="search-title"><b>Memory Storage</b></h3>
                        <div>
                            <ul class="list-unstyled">
                            @if(count($memory_internals)>0)
                                    @php
                                        $unique_memory_internals = array_unique(array_map(function($data) {
                                        return trim(explode(" ", $data['memory_internal'])[0]);
                                        }, $memory_internals->toArray()));

                                        
                                    @endphp
                                    @foreach($unique_memory_internals as $memory_internal)
                                    @php
                                        $isChecked = in_array($memory_internal, $size_search);
                                    @endphp
                                        <li class="mb-2">
                                            <div class="form-check">
                                                <label class="ckbox" for="attribute-{{$loop->index}}">
                                                    <input type="checkbox" id="attribute-{{$loop->index}}" name="size[]" value="{{$memory_internal}}" class="attribute-size" data-size_id="{{$memory_internal}}"  {{$isChecked ? 'checked':''}}><span>{{$memory_internal}}</span>
                                                </label>
                                            </div>
                                        </li>
                                @endforeach
                            @endif
                            </ul>
                        </div>

                    </div>
                    <div class="col-12 mt-3">
                        <h3 class="search-title"><b>Headphone Jack 3.5 mm</b></h3>
                        <div>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <div class="form-check">
                                        <label class="ckbox">
                                            <input type="checkbox" id="headphone-jack" {{$jack  == '1' ? 'checked' : ' '}}><span>Yes</span>    
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="col-12 mt-3">
                        <h3 class="search-title"><b>Front Camara</b></h3>
                        <div>
                            <ul class="list-unstyled">
                            @if(count($selfie_cameras)>0)
                                    @php
                                        $unique_selfie_cameras = array_unique(array_map(function($data) {
                                        return trim(explode(",", $data['selfie_camera_single'])[0]);
                                        }, $selfie_cameras->toArray()));
                                    @endphp
                                    @foreach($unique_selfie_cameras as $selfie_camera)
                                        @php
                                            $isCheckedCamara= in_array($selfie_camera, $camara);
                                        @endphp
                                        @if($selfie_camera)
                                            <li class="mb-2">
                                                <div class="form-check">
                                                    <label class="ckbox"  for="camera-{{$loop->index}}">
                                                        <input type="checkbox"  id="camera-{{$loop->index}}" name="camara[]" value="{{$selfie_camera}}" class="camera-single" data-camera_id="{{$selfie_camera}}"  {{$isCheckedCamara ? 'checked':''}}><span>{{$selfie_camera}}</span>
                                                    </label>
                                                </div>
                                            </li>
                                        @endif   
                                   @endforeach
                            @endif
                            </ul>
                        </div>

                    </div>

                    <div class="col-12 mt-3">
                        <h3 class="search-title"><b>SIM Slot</b></h3>
                        <div>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <div class="form-check">
                                        <label class="ckbox" >
                                            <input type="checkbox"   name="sim[]" class="sim" data-sim_id="Single SIM"> <span>Single SIM</span>
                                        </label>
                                    </div>
                                </li>
                                <li class="mb-2">
                                    <div class="form-check">
                                        <label class="ckbox" >
                                            <input type="checkbox" name="sim[]" class="sim" data-sim_id="Dual SIM"><span>Dual SIM</span>
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <h3 class="search-title"><b>Screen Size</b></h3>
                        <div>
                            <ul class="list-unstyled">
                            @if(count($display_sizes)>0)
                                    @php
                                        $unique_display_sizes = array_unique(array_map(function($data) {
                                        return trim(explode(",", $data['display_size'])[0]);
                                        }, $display_sizes->toArray()));
                                    @endphp
                                    @foreach($unique_display_sizes as $display_s)
                                        @php
                                            $isCheckedDisplay = in_array($display_s, $diaplay);
                                        @endphp
                                        @if($display_s)
                                            <li class="mb-2">
                                                <div class="form-check">
                                                    <label class="ckbox"  for="display-{{$loop->index}}">
                                                        <input type="checkbox"  id="display-{{$loop->index}}" name="display[]" value="{{$display_s}}" class="display" data-display_id="{{$display_s}}" {{$isCheckedDisplay ? 'checked':' '}}><span>{{$display_s}}</span>
                                                    </label>
                                                </div>
                                            </li>
                                        @endif   
                                   @endforeach
                            @endif
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-9">
                <!-- desktop banner -->
                <img src="{{asset('assets/web/images/banner_2_desktop_handset.png')}}" class="img-fluid p-2 banner-image d-none d-lg-block">
                <!-- mobile banner -->
                <img src="{{asset('assets/web/images/banner_desktop handset_Mobile2.png')}}" class="img-fluid p-2 banner-image d-lg-none d-block">
                
                <div class="col-12">
                    <button class="btn vendor-button" id="filter-toggle-button">Show/Hide Filters</button>
                </div>
                <div class="row product-list mx-1" id="change-product">

                    @foreach($products as $mobile)
                    <div class="col-md-3 col-6 px-2">
                        <div class="item-box">
                            <div class="item-image">
                                @php
                                    $mobileName = str_replace(' ', '_',$mobile->Mobile->phone);
                                    $id = $mobile->id;
                                @endphp
                                @if($mobile->Mobile->picture_url_big)
                                    <a href="{{ route('user.product', ['name' => $mobileName, 'id' => $id]) }}">
                                        @if (strpos(explode(';',$mobile->Mobile->picture_url_big)[0], 'https://fdn2.gsmarena.com') !== false)
                                        <img src="{{ explode(';',$mobile->Mobile->picture_url_big)[0] }}" loading="lazy" alt="{{$mobile->Mobile->name}}" data-ll-status="loaded">
                                        @else
                                            <img src="{{ asset(explode(';',$mobile->Mobile->picture_url_big)[0])}}" loading="lazy" alt="{{$mobile->Mobile->name}}" data-ll-status="loaded">
                                        @endif
                                    </a>
                                @else
                                <a href="{{ route('user.product', ['name' => $mobileName, 'id' => $id]) }}">
                                    <img src="data:image/png;base64,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">
                                </a>
                                @endif
                            </div>
                            <div class="item-price">
                                @php
                                    $get_present_data = getPresent($mobile);
                                    $present = $get_present_data['present'];
                                    $price = $get_present_data['price'];
                                    $mrp = $get_present_data['mrp'];
                                @endphp
                                <b>₹{{$price }}</b><span class="mop">₹{{$mrp}}</span> <span class="discount">{{round($present)}}% OFF </span>
                            </div>
                            <div class="item-name">
                                <a href="{{ route('user.product', ['name' => $mobileName, 'id' => $id]) }}" class="product-link">
                                    {{$mobile->mobile ? $mobile->mobile->phone : ''}}
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div> 
            </div>    
        </div>
    </div>

    @if(isset($seo_meta) && !empty($seo_meta->footer_content))
    <div class="container-fluid mt-5 px-4">
        <div class="row">
            <div class="col-md-12">
                <h6>Top Stories:</h6>
                <p> {!! $seo_meta->footer_content !!} </p>
            </div>
        </div>
    </div>
    @endif

</section>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.min.js"></script>
    <script>
    $(document).ready(function() {

        $('#filter-toggle-button').on('click', function() {
            $('#filter-column').toggle();
        });

        $('#close-filter').on('click', function() {
            $('#filter-column').hide();
        });

        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            autoplay: true, // Enable autoplay
            autoplayTimeout: 3000, // Set autoplay timeout in milliseconds (3 seconds)
            autoplayHoverPause: true, // Pause autoplay on hover
            dots: true,
            responsiveClass: true,
            navText: [
                '<i class="fas fa-chevron-left"></i>',
                '<i class="fas fa-chevron-right"></i>'
            ],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
    });
</script>
    <script>
        // Brands Search
        function getSelectedBrands() {
            var brands = [];
            $('.attribute-brand:checked').each(function() {
               brands.push($(this).data('brand_id'));
            });
            return brands;
        }
         $('.attribute-brand').on('change', function() {
               
               var brands = [];
               var brands_ajax = [];
               var  brand = $(this).data('brand_id');
               brands.push(brand);
               var brand_ajax = getSelectedBrands();

               productAjax(brand_ajax);
               updateURL(brands);
         });
 
        // Memory Storage Search
         function getSelectedSize() {
            var sizes = [];
            $('.attribute-size:checked').each(function() {
                sizes.push($(this).data('size_id'));
            });
            return sizes;
        }
        $('.attribute-size').on('change', function() {
            var sizes = [];
            // var sizes_ajax = [];
            var  size = $(this).data('size_id');
            sizes.push(size);
            var sizes_ajax = getSelectedSize();

            var brands = [];
            var brands_ajax = [];
            var  brand = $(this).data('brand_id');
            brands.push(brand);
            var brand_ajax = getSelectedBrands();


            productAjax(brand_ajax,sizes_ajax);
            updateURL(brands=null,sizes);
        });
       // jack
        $('#headphone-jack').on('change', function() {
           var jack =  $(this).is(':checked') ? 1 : 0;
            productAjax(brand_ajax=null,sizes_ajax=null,jack);
            updateURL(brands=null,sizes=null,jack);

        });
        //camara
        function getSelectedCamara() {
            var camaras = [];
            $('.camera-single:checked').each(function() {
               camaras.push($(this).data('camera_id'));
            });
            return camaras;
        }
         $('.camera-single').on('change', function() {
               
               var camaras = [];
               var camaras_ajax = [];
               var  camara = $(this).data('camera_id');
               camaras.push(camara);
               var camara_ajax = getSelectedCamara();

               var sizes = [];
                // var sizes_ajax = [];
                var  size = $(this).data('size_id');
                sizes.push(size);
                var sizes_ajax = getSelectedSize();

                var brands = [];
                var brands_ajax = [];
                var  brand = $(this).data('brand_id');
                brands.push(brand);
                var brand_ajax = getSelectedBrands();

               productAjax(brand_ajax,sizes_ajax,jack=null,camara_ajax);
               updateURL(brands=null,sizes=null,jack=null,camaras);
         });


        //  SIM slot
        function getSelectedSIM() {
            var sims = [];
            $('.sim:checked').each(function() {
               sims.push($(this).data('sim_id'));
            });
            return sims;
        }
        $('.sim').on('change', function() {
               var sims = [];
               var sims_ajax = [];
               var  sim = $(this).data('sim_id');
               sims.push(sim);
               var sim_ajax = getSelectedSIM();

               var camaras = [];
               var camaras_ajax = [];
               var  camara = $(this).data('camera_id');
               camaras.push(camara);
               var camara_ajax = getSelectedCamara();

               var sizes = [];
                // var sizes_ajax = [];
                var  size = $(this).data('size_id');
                sizes.push(size);
                var sizes_ajax = getSelectedSize();

                var brands = [];
                var brands_ajax = [];
                var  brand = $(this).data('brand_id');
                brands.push(brand);
                var brand_ajax = getSelectedBrands();

               productAjax(brand_ajax,sizes_ajax,jack=null,camara_ajax,sim_ajax);
               updateURL(brands=null,sizes=null,jack=null,camaras=null,sims);
         });

         //dispaly
         function getSelectedDisplay() {
            var sims = [];
            $('.display:checked').each(function() {
               sims.push($(this).data('display_id'));
            });
            return sims;
        }
        $('.display').on('change', function() {
               var displays = [];
               var displays_ajax = [];
               var  display = $(this).data('display_id');
               displays.push(display);
               var display_ajax = getSelectedDisplay();

               var sims = [];
               var sims_ajax = [];
               var  sim = $(this).data('sim_id');
               sims.push(sim);
               var sim_ajax = getSelectedSIM();

               var camaras = [];
               var camaras_ajax = [];
               var  camara = $(this).data('camera_id');
               camaras.push(camara);
               var camara_ajax = getSelectedCamara();

               var sizes = [];
                // var sizes_ajax = [];
                var  size = $(this).data('size_id');
                sizes.push(size);
                var sizes_ajax = getSelectedSize();

                var brands = [];
                var brands_ajax = [];
                var  brand = $(this).data('brand_id');
                brands.push(brand);
                var brand_ajax = getSelectedBrands();

               productAjax(brand_ajax,sizes_ajax,jack=null,camara_ajax,sim_ajax,display_ajax);
               updateURL(brands=null,sizes=null,jack=null,camaras=null,sims=null,displays);
         });


         function updateURL(brands=null,sizes=null,jack=null,camaras=null,sims=null,displays=null) {
            var url = new URL(window.location.href);
            if(jack){
                if(jack ==0){
                    url.searchParams.set('jack',jack);
                }
                else{
                    url.searchParams.set('jack',jack);
                }
            }
            if(displays){
                var currentdisplays = url.searchParams.getAll('display[]');

                displays.forEach(function(display) {
                    var index = currentdisplays.indexOf(display.toString());
                    if (index === -1) {
                    url.searchParams.append('display[]', display);
                    } else {
                        currentdisplays.splice(index, 1);
                    url.searchParams.delete('display[]',display);
                    }
                });

            }
            if(sims){
                var currentsims = url.searchParams.getAll('sim[]');

                sims.forEach(function(sim) {
                    var index = currentsims.indexOf(sim.toString());
                    if (index === -1) {
                    url.searchParams.append('sim[]', sim);
                    } else {
                        currentsims.splice(index, 1);
                    url.searchParams.delete('sim[]',sim);
                    }
                });

            }
            if(camaras){
                var currentcamaras = url.searchParams.getAll('camara[]');

                camaras.forEach(function(camara) {
                    var index = currentcamaras.indexOf(camara.toString());
                    if (index === -1) {
                    url.searchParams.append('camara[]', camara);
                    } else {
                        currentcamaras.splice(index, 1);
                        url.searchParams.delete('camara[]',camara);
                    }
                });

            }
            if(brands){
                var currentBrands = url.searchParams.getAll('brands[]');

                brands.forEach(function(brand) {
                    var index = currentBrands.indexOf(brand.toString());
                    if (index === -1) {
                    url.searchParams.append('brands[]', brand);
                    } else {
                    currentBrands.splice(index, 1);
                    url.searchParams.delete('brands[]',brand);
                    }
                });

            }
            if(sizes){
                var currentBrands = url.searchParams.getAll('size[]');

                sizes.forEach(function(size) {
                    var index = currentBrands.indexOf(size.toString());
                    if (index === -1) {
                    url.searchParams.append('size[]', size);
                    } else {
                    currentBrands.splice(index, 1);
                    url.searchParams.delete('size[]',size);
                    }
                });

            }
               
            history.pushState(null, '', url.toString());
         }
         
        function productAjax(brands=null,sizes_ajax=null,jack=null,camara_ajax=null,sim_ajax=null,display_ajax=null){
            var url = '{{ route("user.productCategories", ":category") }}';
            url = url.replace(':category', "{{ $category }}");
            $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                    brands : brands,
                    size : sizes_ajax,
                    jack : jack,
                    camara : camara_ajax,
                    sim : sim_ajax,
                    display : display_ajax,
                },
                    success: function(response) {
                        console.log('response',response);
                        $('#change-product').html(response.html);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
        }
    </script>
@endsection