<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- seo meta -->
    <meta name="title" content="@yield('meta_title')">
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keywords')">
    <link rel="canonical" href="@yield('canonical_url', 'https://mobilekidukaan.in')">

    <title>Mobile Ki Dukaan</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="shortcut icon" href="{{asset('assets/web/images/logo2.png')}}" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <meta name="twitter:image" content="{{asset('assets/web/images/logo_but.jpeg')}}"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Flex:opsz,wght@8..144,100..1000&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/css/style.css')}}">
    
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-RPQWDXQRR2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-RPQWDXQRR2');
    </script>
  
  	<!-- Meta Pixel Code -->
    <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '484345264559491');
      fbq('track', 'PageView');
    </script>
  
    <noscript>
      <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=484345264559491&ev=PageView&noscript=1"/>
  	</noscript>
    <!-- End Meta Pixel Code -->
  

  	@stack('styles')
</head>
<style>
    .navbar-fixed {
        z-index: 100;
        position: fixed;
        width: 100%;
        background-color: white;
    }
</style>
<body>
<header class="header-nav">
    <div class="container header-container">
        <div class="row align-items-center">
            <div class="col-2 col-md-2 logo">
                <a href="{{ route('user.index') }}">
                    <!-- english  logo -->
                    <!-- <img src="{{asset('assets/web/images/logo-desktop-150.png')}}" alt="Mobile Ki Dukan" title="Mobile Ki Dukan" class="logo-desktop"> -->
                    <!-- hindi logo desktop-->
                    <img src="{{asset('assets/web/images/new-hindi-logo-resize.png')}}" alt="Mobile Ki Dukan" title="Mobile Ki Dukan" class="logo-desktop">
                    
                    <img src="{{asset('assets/web/images/logo-mobile-50.png')}}" alt="Mobile Ki Dukan" title="Mobile Ki Dukan" class="logo-mobile">

                    
                </a>
            </div>
            <div class="col-10 col-md-7 search-box">
                <form class="form-inline my-2 my-lg-0 justify-content-center w-100 bb-form-quick-search" action="{{route('search.submit', ['category' => 'mobile'])}}" role="search" id="bb-form-quick-search">
                  @csrf
                    <div class="custom-input-group w-100">
                        <input class="form-control custom-search-input searchInput" type="search" name="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn custom-search-btn" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="searchResults">

                    </div>
                </form>
            </div>
            <div class="col-6 col-md-3 d-flex justify-content-end login-box">
                @if(Auth::user())
                  @if(Auth::user()->role == 0)
                    <div class="login-container text-right">
                        <div class="profile-img">
                            <img src="{{asset('assets/web/images/profile-img-40.png')}}" alt="Profile Image">
                        </div>
                        <div class="header-login text-left">
                            <span>{{ Auth::user()->name }}</span><br>
                            <span><strong>Welcome</strong></span><br>
                            <a class="text-dark" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                               <strong> Logout </strong>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="get" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                    @else
                    <div class="login-container text-right">
                        <div class="profile-img">
                            <img src="{{asset('assets/web/images/profile-img-40.png')}}" alt="Profile Image">
                        </div>
                        <a href="{{Route('vendor.dashboard')}}">
                            <div class="header-login text-left">
                                <span>{{ Auth::user()->name }}</span><br>
                                <span><strong>Welcome</strong></span><br>
                            </div>
                        </a>
                    </div>
                   @endif 
                @else
                    <div class="login-container text-right">
                        <div class="profile-img">
                            <img src="{{asset('assets/web/images/profile-img-40.png')}}" alt="Profile Image">
                        </div>
                        <div class="header-login text-left">
                            <span>Hello Guest</span><br>
                            <span><strong><a class="text-dark" href="{{ route('login') }}">Login / Register</a></strong></span>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</header>
<!-- Navigation Menu -->
<nav class="navbar navbar-expand-lg navbar-light bg-light navigation-menu">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link {{ request()->routeIs('user.index') ? 'active' : '' }}" 
                    href="{{ route('user.index') }}">Home
                </a>
                <a class="nav-item nav-link {{ request()->routeIs('user.productCategories') && request()->query('type') == '' ? 'active' : '' }}" 
                    href="{{(route('user.productCategories','mobile'))}}">Mobiles
                </a>
                <a class="nav-item nav-link {{ request()->routeIs('user.productCategories') && request()->query('type') == 'used' ? 'active' : '' }}" 
                    href="{{(route('user.productCategories','mobile?type=used'))}}">Refurbished Mobile
                </a>
                <a class="nav-item nav-link {{ request()->routeIs('vendor.mobileAssessries') && request()->route('category_name') === 'accessory' ? 'active' : '' }}" 
                    href="{{ route('vendor.mobileAssessries', 'accessory') }}">Mobile Accessories
                </a>
                <a class="nav-item nav-link {{ request()->routeIs('user.vendor') ? 'active' : '' }}" 
                    href="{{Route('user.vendor')}}">Store
                </a>
                <a class="nav-item nav-link {{ request()->routeIs('user.blog') ? 'active' : '' }}" 
                    href="{{Route('user.blog')}}">Blog
                </a>
                <a class="nav-item nav-link {{ request()->routeIs('user.contact') ? 'active' : '' }}" 
                    href="{{Route('user.contact')}}">Contact Us
                </a>
            </div>
        </div>
        <span class="navbar-text d-none d-md-block">
            <a href="tel:+917023878974" class="phone-link">
                <i class="fas fa-phone phone-icon"></i>
                <span>+91 7023878974</span>
            </a>
        </span>
    </div>
</nav>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.searchInput').on('keyup', function() {
            var search = $(this).val();
            var url = "{{ route('search') }}";
            console.log('search', search);
            if (search != '') {
                $.ajax({
                    url: url,
                    method: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "search": search
                    },
                    success: function(data) {
                        console.log('data',data)
                        $('.searchResults').html(data);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }else{
                $('.searchResults').html('');
            }
        });

        $('.custom-search-input').on('click' ,function() {
            $('.searchResults').html('');
        })
        $('.header-container').on('click' ,function() {
            $('.searchResults').html('');
        })
    });

    $(window).scroll(function () {
    console.log($(window).scrollTop())
    if ($(window).scrollTop() > 63) {
        $('.header-nav').addClass('navbar-fixed');
    }
    if ($(window).scrollTop() < 64) {
        $('.header-nav').removeClass('navbar-fixed');
    }
    });
</script>
  
  
  @stack('scripts')
