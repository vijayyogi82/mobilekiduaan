@extends('layouts.app')
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
                <h2><b>Search</b></h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <!--===== #Mobiles =====-->
            <div class="col-md-6">
                <!-- desktop banner -->
                <img src="{{asset('assets/web/images/banner_2_desktop_handset.png')}}" class="img-fluid p-2 banner-image d-none d-lg-block">
                <!-- mobile banner -->
                <img src="{{asset('assets/web/images/banner_desktop handset_Mobile2.png')}}" class="img-fluid p-2 banner-image d-lg-none d-block">
                <h5 class="m-1">Mobiles</h5>

                <div class="row product-list mx-1" id="change-product">
                    @foreach($products['mobiles'] as $mobile)
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
                                ₹{{$price}} <span class="mop">₹{{$mrp}}</span> <span class="discount">{{round($present)}}% OFF</span>
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

             <!--===== #accessories =====-->
             <div class="col-md-6">
               <!-- desktop banner -->
               <img src="{{asset('assets/web/images/banner 2_acc_desktop.png')}}" class="img-fluid p-2 banner-image d-none d-lg-block">
                <!-- mobile banner -->
                <img src="{{asset('assets/web/images/banner_desktop acc _Mobile.png')}}" class="img-fluid p-2 banner-image d-lg-none d-block">
                <h5 class="m-1">Accessories</h5>

                <div class="row product-list mx-1" id="change-product">
                    @foreach($products['accessories'] as $mobile)
                    <div class="col-md-3 col-6 px-2">
                        <div class="item-box">
                            <div class="item-image">
                                @php
                                $image =explode(',',$mobile->accessory->image);
                                $mobileName = str_replace(' ', '-', strtolower($mobile->Accessory->model_name));
                                $id = $mobile->id;
                                @endphp
                                <a href="{{ route('vendor.assessries', ['name' => $mobileName, 'id' => $id]) }}">
                                    @if(count($image)>0)
                                      <img src="{{$image[0]}}" loading="lazy" alt="{{$image[0]}}" data-ll-status="loaded">
                                    @else
                                         <img src="data:image/png;base64,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">
                                    @endif
                                </a>
                            </div>
                            <div class="item-price">
                                @php
                                    $get_present_data = getPresent($mobile);
                                    $present = $get_present_data['present'];
                                    $price = $get_present_data['price'];
                                    $mrp = $get_present_data['mrp'];
                                @endphp
                                ₹{{$price}} <span class="mop">₹{{$mrp}}</span> <span class="discount">{{round($present)}}% OFF</span>
                            </div>
                            <div class="item-name">
                                <a href="{{ route('vendor.assessries', ['name' => $mobileName, 'id' => $id]) }}" class="product-link">
                                    {{$mobile->Accessory ? $mobile->Accessory->model_name : ''}}
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div> 
            </div>
        </div>
    </div>
</section>
@endsection