@extends('layouts.app')
@section('content')
<section class="body-content">
    <div class="container">
        <div class="row pt-4">
            <div class="col-12">
                <div class="panel profile-cover">
                    <div class="profile-cover__action">
                        @if($banners)
                        <img src="{{asset($banners->img)}}"  alt="{{$banners->img}}">
                        @else
                        <img src="{{asset('assets/web/images/store-banner-bg-img.jpg')}}">
                        @endif
                    </div>
                    <div class="profile-cover__img">
                        <img src="{{asset( $user->profile ? $user->profile :'assets/web/images/store-logo.jpg')}}" alt="img">
                        <h3 class="header-h3">{{$user->shop_name}}</h3>
                    </div>
                    <div class="profile-cover__info">
                        <div class="nav">
                            <ul>
                                <li style=" list-style: none;">  {{$user ? $user->address : ''}}</li>
                                <li style=" list-style: none;"> Phone: <a href="tel:+91{{$user ? $user->phone : ''}}" style="color: #2a2a2a;">{{$user ? $user->phone : ''}}</a></li>
                                <li style=" list-style: none;"> Email:{{$user ? $user->email : ''}}</li>

                                <div class="share-container mt-2">
                                    <!-- Share button -->
                                    <button id="shareBtn" class="btn btn-light btn-sm">
                                        <i class="fas fa-share"></i> Share Profile
                                    </button>
                                </div>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <x-product :title="'Top Sale'" :product="$products" />
        <div class="container-fluid p-0">
            <div class="row ad-banner1 text-center m-0">
                <div class="col-12 p-0">
                    <img src="{{asset('assets/web/images/B2 _desktop.png')}}" class="img-fluid d-none d-lg-block" alt="Ad Banner">
                      <!-- mobile -->
                    <img src="{{asset('assets/web/images/b1.png')}}" class="img-fluid d-lg-none d-block" alt="Ad Banner">
                </div>
            </div>
        </div>
        @if(count($refurbisheds)>0)
        <div class="container mt-5">
            <x-product :title="'Refurbished Mobile'" :product="$refurbisheds" />
        </div>
        @endif
        <div class="container-fluid p-0 mt-4">
            <div class="row ad-banner1 text-center m-0">
                <div class="col-12 p-0">
                    <img src="{{asset('assets/web/images/B3_desktop.png')}}" class="img-fluid d-none d-lg-block" alt="Ad Banner">
                        <!-- mobile -->
                    <img src="{{asset('assets/web/images/b3.png')}}" class="img-fluid d-lg-none d-block" alt="Ad Banner">
                </div>
            </div>
        </div>
    </div>
    @if(count($accessory)>0)
        <div class="container-fluid mt-5" style="padding-left: 15px; padding-right: 15px;">
            <div class="top-sale">
                <div class="row">
                    <div class="col-12">
                        <h3 class="header-h3">Mobile Accessories</h3>
                    </div>
                </div>    
                <div class="row product-list">
                    @foreach($accessory as $data)
                    <div class="col-md-2 col-6 px-2">
                        <div class="item-box">
                            <div class="item-image">
                            @php
                                $mobileName = str_replace(' ', '-', strtolower($data->accessory->model_name));
                                $id = $data->id;
                            @endphp
                            <a href="{{ route('vendor.assessries', ['name' => $mobileName, 'id' => $id]) }}">
                                @if($data->accessory->image)
                                    <img  src = "{{ explode(';',$data->accessory->image)[0] }}" alt = "shoe image">
                                @else
                                    <img src="{{asset('assets/web/images/download.png')}}" alt="{{$data->accessory->model_name}}">
                                @endif
                            </a>
                            </div>
                            @php
                                $get_present_data = getPresent($data);
                                $present = $get_present_data['present'];
                                $price = $get_present_data['price'];
                                $mrp = $get_present_data['mrp'];
                            @endphp
                            <div class="item-price">
                            ₹{{$price}} <span class="mop">₹{{$mrp}}</span> <span class="discount">{{round($present)}}% OFF</span>
                            </div>
                            <div class="item-name">
                            <a href="{{ route('vendor.assessries', ['name' => $mobileName, 'id' => $id]) }}" class="link">{{$data->accessory->model_name}} </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>    
            </div>
        </div>
    @endif
</section>


<script>
    $(document).ready(function() {
        document.getElementById('shareBtn').addEventListener('click', function() {
            const shareUrl = '{{ url()->current() }}';
            const shareTitle = 'Check out {{$user->shop_name ?? ''}} on MobileKidukaan';
            const shareText = 'I found this profile on MobileKidukaan. Check it out!';
            
            if (navigator.share) {
                navigator.share({
                    title: shareTitle,
                    text: shareText,
                    url: shareUrl,
                }).then(() => {
                    console.log('Thanks for sharing!');
                }).catch((error) => {
                    console.log('Error sharing:', error);
                });
            } else {
                let fallbackHtml = `
                    <div class="fallback-share-buttons">
                        <p>Share on:</p>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=${shareUrl}" target="_blank">Facebook</a>
                        <a href="https://twitter.com/intent/tweet?text=${encodeURIComponent(shareText)}&url=${shareUrl}" target="_blank">Twitter</a>
                        <a href="https://api.whatsapp.com/send?text=${encodeURIComponent(shareText)}%20${shareUrl}" target="_blank">WhatsApp</a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=${shareUrl}&title=${encodeURIComponent(shareTitle)}" target="_blank">LinkedIn</a>
                        <a href="mailto:?subject=${encodeURIComponent(shareTitle)}&body=${encodeURIComponent(shareText)}%20${shareUrl}">Email</a>
                    </div>
                `;
                document.querySelector('.share-container').innerHTML += fallbackHtml;
            }
        });
    });
</script>
@endsection

