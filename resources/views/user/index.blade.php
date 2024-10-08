@extends('layouts.app')

<!-- meta seo -->
@section('meta_title', $seo_meta->meta_title ?? '')
@section('meta_description', $seo_meta->meta_description ?? '')
@section('meta_keywords', $seo_meta->meta_keywords ?? '')
@section('canonical_url', $seo_meta->canonical_url ?? url()->current())

@section('content')
<style>
    .owl-dots {
        display: none;
    }
</style>

<!-- seo h1-->
<h1 class="d-none">Get Mobile Phones &amp; Accessories at Best Price | Mobile ki Dukaan</h1>

<section class="body-content">
    <!-- Image Slider web -->
    <div class="container-fluid p-0  d-none d-lg-block">
        <div class="owl-carousel owl-theme">
            @if(!empty($sliders))
            @foreach($sliders as $slider_item)
            <div class="item">
                <img src="{{asset($slider_item->image)}}" alt="Slider Image 1" class="img-responsive">
            </div>
            @endforeach
            @else
            <div class="item">
                <img src="{{asset('assets/web/images/banner_1.png')}}" alt="Slider Image 1" class="img-responsive">
            </div>
            <div class="item">
                <img src="{{asset('assets/web/images/banner_2.png')}}" alt="Slider Image 2" class="img-responsive">
            </div>
            <div class="item">
                <img src="{{asset('assets/web/images/banner_3.png')}}" alt="Slider Image 3" class="img-responsive">
            </div>
            <div class="item">
                <img src="{{asset('assets/web/images/banner_4.png')}}" alt="Slider Image 4" class="img-responsive">
            </div>
            @endif
        </div>
    </div>
   <!-- mobile -->
    <div class="container-fluid p-0  d-lg-none d-block">
        <div class="owl-carousel owl-theme 12">
            @if(!empty($sliders))
            @foreach($sliders as $slider_item)
            <div class="item">
                <img src="{{asset($slider_item->image)}}" alt="Slider Image 1" class="img-responsive">
            </div>
            @endforeach
            @else
            <div class="item">
                <img src="{{asset('assets/web/images/banner 1 Mobile.png')}}" alt="Slider Image 1" class="img-responsive">
            </div>
            <div class="item">
                <img src="{{asset('assets/web/images/banner 3 mobile.png')}}" alt="Slider Image 2" class="img-responsive">
            </div>
            <div class="item">
                <img src="{{asset('assets/web/images/Banner 2 Mobile.png')}}" alt="Slider Image 3" class="img-responsive">
            </div>
            <div class="item">
                <img src="{{asset('assets/web/images/banner_3_mobile.png')}}" alt="Slider Image 4" class="img-responsive">
            </div>
            @endif
        </div>
    </div>

    <div class="container">
        <x-product :title="'Trending Mobile Phones'"  :product="$mobiles"/>
    </div>
    <div class="container-fluid p-0">
        <div class="row ad-banner1 text-center m-0">
            <div class="col-12 p-0">
                <!-- desktop -->
                @if(!empty($bannerlocation1))
                <img src="{{asset($bannerlocation1->image)}}" class="img-fluid d-none d-lg-block" alt="Ad Banner">
                @else
                <img src="{{asset('assets/web/images/B1 _desktop.png')}}" class="img-fluid d-none d-lg-block" alt="Ad Banner">
                @endif

                <!-- mobile -->
                @if(!empty($bannerlocation1))
                <img src="{{asset($bannerlocation1->image)}}" class="img-fluid d-block d-lg-none" alt="Ad Banner">
                @else
                <img src="{{asset('assets/web/images/b2.png')}}" class="img-fluid d-lg-none d-block" alt="Ad Banner">
                @endif
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <x-product :title="'New Launch Mobile'" :product="$under_fifteen_thousand"/>
    </div>

    <div class="container-fluid p-0 mt-4">
        <div class="row ad-banner1 text-center m-0">
            <div class="col-12 p-0">
                <!-- desktop -->
                @if(!empty($bannerlocation2))
                <img src="{{asset($bannerlocation2->image)}}" class="img-fluid d-none d-lg-block" alt="Ad Banner">
                @else
                <img src="{{asset('assets/web/images/B2 _desktop.png')}}" class="img-fluid d-none d-lg-block" alt="Ad Banner">
                @endif

                <!-- mobile -->
                @if(!empty($bannerlocation2))
                <img src="{{asset($bannerlocation2->image)}}" class="img-fluid d-block d-lg-none" alt="Ad Banner">
                @else
                <img src="{{asset('assets/web/images/b1.png')}}" class="img-fluid d-lg-none d-block" alt="Ad Banner">
                @endif
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <x-product :title="'Refurbished Mobile'"  :product="$refurbished_mobiles"/>
    </div>

    <div class="container-fluid p-0 mt-4">
        <div class="row ad-banner1 text-center m-0">
            <div class="col-12 p-0">
                <!-- desktop -->
                @if(!empty($bannerlocation3))
                <img src="{{asset($bannerlocation3->image)}}" class="img-fluid d-none d-lg-block" alt="Ad Banner">
                @else
                <img src="{{asset('assets/web/images/B3_desktop.png')}}" class="img-fluid d-none d-lg-block" alt="Ad Banner">
                @endif

                <!-- mobile -->
                @if(!empty($bannerlocation3))
                <img src="{{asset($bannerlocation3->image)}}" class="img-fluid d-block d-lg-none" alt="Ad Banner">
                @else
                <img src="{{asset('assets/web/images/b3.png')}}" class="img-fluid d-lg-none d-block" alt="Ad Banner">
                @endif
            </div>
        </div>
    </div>
    <div class="container-fluid mt-5" style="padding-left: 15px; padding-right: 15px;">
        <div class="mobile-under">
            <div class="row">
                <div class="col-12">
                    <h3 class="header-h3"><b>Mobile Accessories</b></h3>
                </div>
            </div>

            <div class="row accessories">
                <div class="col-md-4 col-12 accessories-list">
                    <h4><b>Earbuds</b></h4>    
                    @foreach($earbuds as $earbud) 
                        @php
                             $image =explode(',',$earbud->accessory->image);
                             $mobileName = str_replace(' ', '-', strtolower($earbud->accessory->model_name));
                             $id = $earbud->id;
                        @endphp
                        <div class="row accessory-row">
                            <div class="col-3 accessory-img">
                                <a href="{{ route('vendor.assessries', ['name' => $mobileName, 'id' => $id]) }}">
                                    @if(count($image)>0)
                                      <img src="{{$image[0]}}" class="img-fluid" alt="">
                                    @else
                                       <img src="{{asset('assets/web/images/download.png')}}" alt="">
                                    @endif  
                                </a>
                            </div>
                            <div class="col-9 accessory-info">
                                <a href="{{ route('vendor.assessries', ['name' => $mobileName, 'id' => $id]) }}" style="color: black;">
                                    <span class="accessory-title">{{$earbud->accessory ? $earbud->accessory->model_name : ''}}</span>
                                </a>
                                <span class="accessory-price">₹{{$earbud ? $earbud->memory_price : ''}}</span>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-md-4 col-12 accessories-list">
                    <h4><b>Wireless Headphone</b></h4>   
                    @foreach($headphones as $headphone) 
                        @php
                             $image =explode(',',$headphone->accessory->image);
                             $mobileName = str_replace(' ', '-', strtolower($headphone->accessory->model_name));
                             $id = $headphone->id;
                        @endphp
                        <div class="row accessory-row">
                            <div class="col-3 accessory-img">
                                <a href="{{ route('vendor.assessries', ['name' => $mobileName, 'id' => $id]) }}">
                                    @if(count($image)>0)
                                      <img src="{{$image[0]}}" class="img-fluid" alt="">
                                    @else
                                       <img src="{{asset('assets/web/images/download.png')}}" alt="">
                                    @endif 
                                </a>
                            </div>
                            <div class="col-9 accessory-info">
                                <a href="{{ route('vendor.assessries', ['name' => $mobileName, 'id' => $id]) }}" style="color: black;">
                                    <span class="accessory-title">{{$headphone->accessory ? $headphone->accessory->model_name : ''}}</span>
                                </a>
                                <span class="accessory-price">₹{{$headphone ? $headphone->memory_price : ''}}</span>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-md-4 col-12 accessories-list">
                    <h4><b>Power Bank</b></h4>    
                    @foreach($powerbanks as $powerbank) 
                        @php
                            $image =explode(',',$powerbank->accessory->image);
                            $mobileName = str_replace(' ', '-', strtolower($powerbank->accessory->model_name));
                            $id = $powerbank->id;
                        @endphp
                        <div class="row accessory-row">
                            <div class="col-3 accessory-img">
                                <a href="{{ route('vendor.assessries', ['name' => $mobileName, 'id' => $id]) }}">
                                    @if(count($image)>0)
                                        <img src="{{$image[0]}}" class="img-fluid" alt="">
                                    @else
                                    <img src="{{asset('assets/web/images/download.png')}}" alt="">
                                    @endif
                                </a>
                            </div>
                            <div class="col-9 accessory-info">
                                <a href="{{ route('vendor.assessries', ['name' => $mobileName, 'id' => $id]) }}" style="color: black;">
                                    <span class="accessory-title">{{$powerbank->accessory ? $powerbank->accessory->model_name : ''}}</span>
                                </a>
                                    <span class="accessory-price">₹{{$powerbank ? $powerbank->memory_price : ''}}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5 px-4">
        <div class="row">
            <div class="col-md-12">
                @if(isset($seo_meta))
                    @if($seo_meta->footer_content)
                    <h6>Top Stories:</h6>
                    <p> {!! $seo_meta->footer_content  ?? ' ' !!} </p>
                    @endif
                @endif
            </div>
        </div>
    </div>

</section>
@endsection