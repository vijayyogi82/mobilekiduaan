@extends('layouts.app')

<!-- meta seo -->
@section('meta_title', $seo_meta->meta_title ?? '')
@section('meta_description', $seo_meta->meta_description ?? '')
@section('meta_keywords', $seo_meta->meta_keywords ?? '')
@section('canonical_url', $seo_meta->canonical_url ?? 'https://mobilekidukaan.in')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.js" ></script>
<style>
li.parsley-required {
   color: red;
}
.parsley-range{
    color: red;
}
</style>
<section class="body-content">
    <div class="container-fluid breadcrumb__area pt-3 pb-3 mb-5">
        <div class="container">
            <div class="col-12">
                <h2>{{$product->accessory ? $product->accessory->model_name : ''}}</h2>
            </div>
        </div>
    </div>
    <div class="container-fluid pb-4">
        <div class="row mx-3 p-0 white-bg">
            <div class="col-md-4 col-12 product-image-container p-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme product-image-slider">
                                @foreach(explode(",",$product->accessory->image) as $key=>$img)
                                    @if($img)
                                        @if (strpos($img, 'https://fdn2.gsmarena.com') !== false)
                                            <div class="item">
                                                <img src="{{$img}}" alt="{{$product->accessory ? $product->accessory->phone : ''}}">
                                            </div>
                                        @else  
                                            <div class="item">
                                                <img src="{{asset($img)}}" alt="{{$product->accessory ? $product->accessory->phone : ''}}">
                                            </div>
                                        @endif
                                    @else
                                        <div class="item">
                                            <img src="{{asset('assets/web/images/download.png')}}" alt="{{$product->accessory ? $product->accessory->phone : ''}}">
                                        </div>
                                    @endif
                                @endforeach    
                        </div> 
                        <div class="owl-carousel owl-theme thumb-image-slider mt-3">
                            @foreach(explode(",",$product->accessory->image) as $key=>$img)
                            
                                @if($img)
                                    @if (strpos($img, 'https://fdn2.gsmarena.com') !== false)
                                        
                                        <div class="item thumb-item">
                                            <img src="{{$img}}" alt="{{$product->accessory ? $product->accessory->phone : ''}}">
                                        </div>
                                    @else  
                                    
                                        <div class="item thumb-item">
                                            <img src="{{asset($img)}}" alt="{{$product->accessory ? $product->accessory->phone : ''}}">
                                        </div>
                                    @endif
                                    
                                @else
                                    <div class="item thumb-item">
                                        <img src="{{asset('assets/web/images/download.png')}}" alt="{{$product->accessory ? $product->accessory->phone : ''}}">
                                    </div>
                                    
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12 p-4">
                <div class="row">
                    <div class="col">
                        @if($product->accessory->driver_size)
                        <span class="product-attribute-title">Driver Size:</span>
                        <p>{{$product->accessory->driver_size}}</p>
                        @endif

                        @if($product->accessory->battery_life)
                            <span class="product-attribute-title">Battery Life:</span>
                            <p>{{$product->accessory->battery_life}}</p> 
                        @endif

                        @if($product->accessory->dial_shape)
                            <span class="product-attribute-title">Dial Shape:</span>
                            <p>{{$product->accessory->dial_shape}}</p>
                        @endif

                        @if($product->accessory->touch_screen)
                            <span class="product-attribute-title">Touch Screen:</span>
                            <p>{{$product->accessory->touch_screen}}</p>
                        @endif

                        @if($product->accessory->water_resistant)
                            <span class="product-attribute-title">Water Resistant:</span>
                            <p>{{$product->accessory->water_resistant}}</p>
                        @endif
                        @if($product->accessory->weight)
                            <span class="product-attribute-title">Weight:</span>
                            <p>{{$product->accessory->weight}}</p>
                        @endif
                        @if($product->accessory->capacity)
                            <span class="product-attribute-title">Capacity:</span>
                            <p>{{$product->accessory->capacity}}</p>
                        @endif
                        @if($product->accessory->display_resolution_size)
                            <span class="product-attribute-title">Display Resolution Size:</span>
                            <p>{{$product->accessory->display_resolution_size}}</p>
                        @endif

                        @if($product->accessory->transmission_Features)
                            <span class="product-attribute-title">Transmission Features:</span>
                            <p>{{$product->accessory->transmission_Features}}</p>
                        @endif

                        @if($product->accessory->battery)
                            <span class="product-attribute-title">Battery:</span>
                            <p>{{$product->accessory->battery}}</p>
                        @endif

                        @if($product->accessory->compatible_devices)
                            <span class="product-attribute-title">Compatible Devices:</span>
                            <p>{{$product->accessory->compatible_devices}}</p>
                        @endif

                        @if($product->accessory->part_number)
                            <span class="product-attribute-title">Part Number:</span>
                            <p>{{$product->accessory->part_number}}</p>
                        @endif

                        @if($product->accessory->mic)
                            <span class="product-attribute-title">Mic:</span>
                            <p>{{$product->accessory->mic}}</p>
                        @endif

                        @if($product->accessory->length)
                            <span class="product-attribute-title">Length:</span>
                            <p>{{$product->accessory->length}}</p>
                        @endif

                        @if($product->accessory->version)
                            <span class="product-attribute-title">Version:</span>
                            <p>{{$product->accessory->version}}</p>
                        @endif

                        @if($product->accessory->wireless_range)
                            <span class="product-attribute-title">Wireless Range:</span>
                            <p>{{$product->accessory->wireless_range}}</p>
                        @endif

                        @if($product->accessory->speed)
                            <span class="product-attribute-title">Speed:</span>
                            <p>{{$product->accessory->speed}}</p>
                        @endif

                        @if($product->accessory->card_type)
                            <span class="product-attribute-title">Card Type:</span>
                            <p>{{$product->accessory->card_type}}</p>
                        @endif

                        @if($product->accessory->connector_port)
                            <span class="product-attribute-title">Connector Port:</span>
                            <p>{{$product->accessory->connector_port}}</p>
                        @endif

                        @if($product->accessory->output_voltage)
                            <span class="product-attribute-title">Output Voltage:</span>
                            <p>{{$product->accessory->output_voltage}}</p>
                        @endif

                        @if($product->accessory->output_current)
                            <span class="product-attribute-title">Output Current:</span>
                            <p>{{$product->accessory->output_current}}</p>
                        @endif

                        @if($product->accessory->charging_time)
                            <span class="product-attribute-title">Charging Time:</span>
                            <p>{{$product->accessory->charging_time}}</p>
                        @endif

                        @if($product->accessory->charging_cable)
                            <span class="product-attribute-title">Charging Cable:</span>
                            <p>{{$product->accessory->charging_cable}}</p>
                        @endif

                        @if($product->accessory->sales_package)
                            <span class="product-attribute-title">Sales Package:</span>
                            <p>{{$product->accessory->sales_package}}</p>
                        @endif
 
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12 p-4">
                <div class="row">
                    <div class="col">
                        <h4 class="vendor-options">Store Option</h4>
                        @if(count($venders)>0)
                            @foreach($venders as $vender)
                                <div class="vendor-option my-3 p-3 border rounded">
                                    <div class="row">
                                        <div class="col-7">
                                            <span class="vendor-price g9WBQb_{{$vender->vender_id}}">₹{{ explode(';', $vender->memory_price)[0] }}</span><br>
                                            <a href="#" class="vendor-link" target="_blank" rel="noopener">{{$vender->user ? $vender->user->shop_name : ''}}</a><br>
                                            @if(isset($geoLocationDistance[$vender->user->id]) && isset($geoLocationDistance[$vender->user->id]['distance']))
                                                <span class="small">{{$geoLocationDistance[$vender->user->id]['distance']}}</span>
                                            @else
                                            <span class="small">0KM</span>
                                            @endif
                                        </div>
                                        <div class="col-5 text-right">
                                            <a href="#" type="button" class="btn vendor-button FkMp mySizeChart_{{$vender->User ? $vender->User->id : ''}}" data-product_id="{{$vender->User ? $vender->User->id : ''}}" data-toggle="modal" data-target="#exampleModalCenter">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
@if($visitor_status == 0)
<div class="modal fade ebcf_modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ebcf_modal-content" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="visiterForm" method="POST" action="{{Route('user.visiterSave')}}" accept-charset="UTF-8"  data-parsley-validate="">
            @csrf
            <div class="row">
                <div class="mb-3 position-relative col-sm-6">
                    <label for="name" class="form-label">Name</label>
                    <input class="form-control" id="name" placeholder="Enter Name" name="name" type="text" required="required">
                    <input class="form-control" id="product_id" name="product_id" type="text" value="{{$product->id}}" hidden>
                    <input class="form-control vender_id" name="vender_id" type="text" hidden>
                </div>
                <div class="mb-3 position-relative col-sm-6">
                    <label for="email" class="form-label">Email</label>
                    <input class="form-control" name="email" type="email" placeholder="Enter Email" id="email" required="required">
                </div>
                <div class="mb-3 position-relative col-sm-6">
                    <label for="phone" class="form-label">Phone</label>
                    <input class="form-control" name="phone" type="number" data-parsley-minlength="10" data-parsley-maxlength="10"  placeholder="Enter Phone" id="phone" required="required">
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endif
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" ></script>
<script>
    $(document).ready(function() { 
        $('.FkMp').click(function() {
            var  vender_id = $(this).data('product_id');
            $('.vender_id').val(vender_id);
            var vendor_status = '{{$visitor_status}}';
            if(vendor_status == 0){
                    var $ebModal = $('#      ');
                    var $ebBtn = $('.FkMp');
                    var $ebSpan = $('.ebcf_close').first();
                    
                    $ebBtn.on('click', function() {
                        $ebModal.css('display', 'block');
                    });

                    $ebSpan.on('click', function() {
                        $ebModal.css('display', 'none');
                    });

                    $(window).on('click', function(event) {
                        if ($(event.target).is($ebModal)) {
                            $ebModal.css('display', 'none');
                        }
                    });
            }else{
                var url = "{{route('user.visitor')}}" 
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {vender_id:vender_id},
                    success: function(response) {
                        $('#vendor_email').html(response.email);
                        $('#vendor_phone').html(response.phone);
                        $('#vendor_address').html(response.address);
                        $('.bb-shop-banner-name').html(response.shop_name);
                        console.log(response.shop_name);
                        var shopName = response.shop_name ? response.shop_name.replace(/\s+/g, '-').toLowerCase() : '';
                        var id = response.id;

                        // Construct the URL
                        var baseUrl = 'https://mobilekidukaan.in/';
                        var completeUrl = baseUrl + shopName;

                        $('.vindor-page').attr('href', completeUrl);
                        window.location.href =completeUrl;

                    },
                    error: function(response) {
                        // Handle error
                        alert('An error occurred. Please try again.');
                        console.log(response);
                    }
                });

            }

        });
   });
</script>
<script>
    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }
    $(document).ready(function() {
        $('#visiterForm').on('submit', function(e) {
            e.preventDefault(); 
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    
                
                 $('#vendor_email').html(response.email);
                 $('#vendor_phone').html(response.phone);
                 $('#vendor_address').html(response.address);
                 $('.bb-shop-banner-name').html(response.shop_name);
                 
                 // setCookie

                var visitor_phone= $('#phone').val();
                var visitor_name = $('#name').val();
                var visitor = {
                        phone: visitor_phone,
                        name: visitor_name,
                    };
                var visitorString = JSON.stringify(visitor);

                 setCookie("visitor", visitorString,1000);

                    var shopName = response.shop_name ? response.shop_name.replace(/\s+/g, '-').toLowerCase() : '';

                    var id = response.id;

                    // Construct the URL
                    var baseUrl = 'https://mobilekidukaan.in/';
                    var completeUrl = baseUrl + shopName;

                    $('.vindor-page').attr('href', completeUrl);
                    window.location.href =completeUrl;

                },
                error: function(response) {
                    // Handle error
                    alert('An error occurred. Please try again.');
                    console.log(response);
                }
            });
        });
    });
</script>

<!-- sliders -->
<script>
    $(document).ready(function() {
        $('.size_click').on('click', function() {
            var url = "{{Route('user.sharchPrice')}}";
            var mobile_id = "{{$product->accessory->id}}";
            var side_ram = $(this).data('side_ram');
            var key_id = $(this).data('key_id');
            console.log('key_id',key_id,'mobile_id',mobile_id);
            $.ajax({
                url:url,
                type: 'GET',
                data: {
                    mobile_id:mobile_id,
                    side_ram:side_ram,
                    key_id:key_id,
                },
                success: function(response) {
                    
                    response.forEach(item =>{
                        $('.g9WBQb_'+item.id).html('₹'+item.price);
                        console.log('price',item.price);    
                    })
                   
                },
                error: function(response) {
                    console.log('error',response);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {

        var sync1 = $(".product-image-slider");
        var sync2 = $(".thumb-image-slider");

        sync1.owlCarousel({
            items: 1,
            slideSpeed: 2000,
            nav: true,
            autoplay: false,
            dots: false,
            loop: true,
            responsiveRefreshRate: 200,
            navText: [
                '<i class="fas fa-chevron-left"></i>',
                '<i class="fas fa-chevron-right"></i>'
            ]
        }).on('changed.owl.carousel', syncPosition);

        sync2.owlCarousel({
            items: 4,
            dots: false,
            nav: true,
            navText: [
                '<i class="fas fa-chevron-left"></i>',
                '<i class="fas fa-chevron-right"></i>'
            ],
            smartSpeed: 200,
            slideSpeed: 500,
            slideBy: 4,
            responsiveRefreshRate: 100
        }).on('changed.owl.carousel', syncPosition2);

        sync2.on("click", ".owl-item", function(e) {
            e.preventDefault();
            var number = $(this).index();
            sync1.data('owl.carousel').to(number, 300, true);
        });

        function syncPosition(el) {
            var count = el.item.count - 1;
            var current = Math.round(el.item.index - (el.item.count / 2) - .5);

            if (current < 0) {
                current = count;
            }
            if (current > count) {
                current = 0;
            }

            sync2.find(".owl-item").removeClass("current").eq(current).addClass("current");
            var onscreen = sync2.find('.owl-item.active').length - 1;
            var start = sync2.find('.owl-item.active').first().index();
            var end = sync2.find('.owl-item.active').last().index();

            if (current > end) {
                sync2.data('owl.carousel').to(current, 100, true);
            }
            if (current < start) {
                sync2.data('owl.carousel').to(current - onscreen, 100, true);
            }
        }

        function syncPosition2(el) {
            if (el.type === "changed") {
                var number = el.item.index;
                sync1.data('owl.carousel').to(number, 100, true);
            }
        }
    });
</script>
@endsection