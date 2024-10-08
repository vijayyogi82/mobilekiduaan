@extends('layouts.app')

<!-- meta seo -->
@section('meta_title', $seo_meta->meta_title ?? '')
@section('meta_description', $seo_meta->meta_description ?? '')
@section('meta_keywords', $seo_meta->meta_keywords ?? '')
@section('canonical_url', $seo_meta->canonical_url ?? url()->current())

@section('content')
<style>
    .shopname {
        color: black;
    }
    .shopname:hover {
        color: #1ecbe1;
        text-decoration: none;
    }
</style>
<section class="body-content">
    <div class="container-fluid breadcrumb__area pt-3 pb-3 mb-5">
        <div class="container">
            <div class="col-12">
                <h2>Store List</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row store-list mx-1">
                    @if(isset($vendors) && count($vendors) > 0)
                        @foreach($vendors as $key=>$vendor)
                         @php
                           $user = $vendor->id;
                         @endphp
                        <div class="col-md-4 col-12 store-box">
                            <div class="row">
                                <div class="col-3 store-logo-box">
                                    @if($vendor->profile)
                                    <a href="{{route('user.vendorDetail', Str::slug($vendor->shop_name)) }}">
                                        <img src="{{asset($vendor->profile)}}" alt="img" class="store-logo shopname">
                                    </a>
                                    @else
                                    <a href="{{route('user.vendorDetail', Str::slug($vendor->shop_name)) }}">
                                        <img src="{{asset('assets/web/images/store-logo.jpg')}}" alt="img"
                                            class="store-logo shopname">
                                    </a>
                                    @endif
                                </div>
                                <div class="col-9 p-2">
                                    <span class="product-attribute-title">
                                        <a href="{{route('user.vendorDetail', Str::slug($vendor->shop_name)) }}"
                                            class="shopname">{{$vendor->shop_name ?? ''}}</a>
                                    </span>
                                    <p class="m-0">{{$vendor->city ?? ''}}</p>
                                    @if(isset($geoLocationDistance[$user]) && isset($geoLocationDistance[$user]['distance']))
                                        <span class="small">{{$geoLocationDistance[$user]['distance']}}</span>
                                    @else
                                        <!-- <span class="small">0KM</span> -->
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
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
@endsection