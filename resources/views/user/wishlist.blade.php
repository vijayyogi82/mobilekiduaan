@extends('layouts.app')
@section('content')
<main>
    <section class="breadcrumb__area include-bg pt-60 pb-60 mb-50 text-start"
        style="background-image: url(https://leadinsightcrm.in/storage/breadcrumb.jpg); background-color: rgba(245, 245, 245, 0);">
        <div class="container">
            <div class="breadcrumb__content p-relative z-index-1">
                <h3 class="breadcrumb__title">Wishlist</h3>
                <div class="breadcrumb__list js_breadcrumb_reduce_length_on_mobile">
                    <span>
                        <a href="{{ route('user.index') }}">Home</a>
                    </span>
                    <span>
                        Wishlist
                    </span>
                </div>
            </div>
        </div>
    </section>

    <section class="tp-wishlist-area">
        <div class="container">
            <div class="tp-cart-list mb-45">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="2" class="tp-cart-header-product">Product</th>
                            <th class="tp-cart-header-price">Price</th>
                            <th>Action</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($products) > 0)
                            @foreach ($products as $product)

                            @php
                            $mobileName = str_replace(' ', '_', $product->Mobile->phone);
                            $id = $product->id;
                            @endphp

                            <tr>
                                <td class="tp-cart-img">
                                    <a href="">
                                            @if (strpos($product->Mobile->picture_url_big, 'https://fdn2.gsmarena.com') !== false)
                                                <img  src="{{ explode(';', $product->Mobile->picture_url_big)[0] }}" class="entered loading" loading="lazy" alt="{{$product->Mobile->name}}" data-ll-status="loaded">
                                            @else  
                                                <img  src="data:image/png;base64,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" class="entered loading">
                                            @endif
                                    </a>
                                </td>
                                <td class="ps-3">
                                    <div class="tp-cart-title">
                                        <a href="" class="ms-0">
                                            {{$product->mobile ? $product->mobile->phone : ''}}
                                        </a>
                                    </div>
                                </td>
                                <td class="tp-cart-price">
                                    <div class="">
                                        <span class="" style="margin-left: -10px;">₹{{$product->price ?? ''}}</span>
                                    </div>
                                </td>

                                <td class="">
                                    <button class="tp-cart-action-btn" style="margin-left: -10px;">
                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M9.53033 1.53033C9.82322 1.23744 9.82322 0.762563 9.53033 0.46967C9.23744 0.176777 8.76256 0.176777 8.46967 0.46967L5 3.93934L1.53033 0.46967C1.23744 0.176777 0.762563 0.176777 0.46967 0.46967C0.176777 0.762563 0.176777 1.23744 0.46967 1.53033L3.93934 5L0.46967 8.46967C0.176777 8.76256 0.176777 9.23744 0.46967 9.53033C0.762563 9.82322 1.23744 9.82322 1.53033 9.53033L5 6.06066L8.46967 9.53033C8.76256 9.82322 9.23744 9.82322 9.53033 9.53033C9.82322 9.23744 9.82322 8.76256 9.53033 8.46967L6.06066 5L9.53033 1.53033Z"
                                                fill="currentColor"></path>
                                        </svg>
                                        <span>Remove</span>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            
        </div>
    </section>
</main>
@endsection