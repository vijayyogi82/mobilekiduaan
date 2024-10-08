<style>
    a.menu-item.active {
        color: #1bb7cb;
    }
</style>
<footer class="pt-4">
    <div class="container-fluid footer-container mt-5 mx-5">
        <div class="row">
            <div class="col-md-3 col-12 mb-4">
                <a href="{{ route('user.index') }}" style="display: block;">
                     <!-- english logo  -->
                    <!-- <img src="{{asset('assets/web/images/logo-white-150.png')}}" alt="Mobile Ki Dukan" class="logo-img"> -->
                    
                    <!-- hindi logo -->
                    <img src="{{asset('assets/web/images/mkd-Hindi-logo-03.png')}}" alt="Mobile Ki Dukan" class="logo-img">
                </a>
                <p class="intro-footer">At Mobile Ki Dukaan, we bridge the gap between local vendors and customers, creating a thriving community of buyers and sellers. Join us today to experience the best of local shopping.</p>
            </div>
            <div class="col-md-3 col-12 mb-4">
                <div class="row">
                    <div class="col-6">
                        <span class="menu-title">Menu</span>
                        <ul class="list-unstyled footer-menu">
                            <li><a href="{{(route('user.productCategories','Mobile'))}}">New Mobile</a></li>
                            <li><a href="{{(route('user.productCategories','Mobile?type=used'))}}">Refurbished Mobile</a></li>
                            <li><a href="{{(route('vendor.mobileAssessries','accessory'))}}">Mobile Accessories</a></li>
                            <li><a href="{{Route('user.vendor')}}">Store</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="{{Route('user.contact')}}">Contact Us</a></li>
                            <li><a href="{{Route('vendorRegister')}}">Store Registration </a></li>
                        </ul>        
                    </div>

                    <div class="col-6">
                        <span class="menu-title">Information</span>
                        <ul class="list-unstyled footer-menu">
                             <li><a href="{{Route('terms_and_conditions')}}">Terms And Conditions</a></li>
                             <li><a href="{{Route('terms_and_conditions_vendor')}}">Term & Con. Vendor</a></li>
                            <li><a href="{{Route('cookie_policy')}}">Privacy Policy</a></li>
                            <li><a href="{{Route('user.contact')}}">Contact Us</a></li>
                        </ul>  

                        <div class="mt-2">
                            <span class="menu-title">Social media</span>
                            <ul class="list-unstyled footer-menu">
                                <li><a target="_blank" href="https://www.facebook.com/mkdmobiledukan">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="15px" fill="white">
                                        <path d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z"/>
                                    </svg>&nbsp;&nbsp;Facebook</a>
                                </li>
                                <li><a target="_blank" href="https://www.instagram.com/mobilekidukaan_/?fbclid=IwY2xjawFSX3FleHRuA2FlbQIxMAABHUQI8Qwt7drq0MDRZpGbrV_4waEZQP9EhYPPhsTsm_ZC30Ca5Zl7AnsokQ_aem_IwDB3Ant0Igqqg10FUsTww">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" height="15px" fill="white">
                                        <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                                    </svg>&nbsp;&nbsp;Instagram</a>
                                </li>
                                <li><a target="_blank" href="https://www.linkedin.com/authwall?trk=bf&trkInfo=AQGYQr5PsBAiVgAAAZH5ayugJDZcryZ_KuRjzRg8DZs_zTD_2ATS3mYBuhVYI1mCTSRUJM9K7M76EYDDhhSFSs2dVpLrsLMSIEDgtzxcNjVm84YBJUeLZKugvzVMf8J33oudCFE=&original_referer=&sessionRedirect=https%3A%2F%2Fwww.linkedin.com%2Fcompany%2Fmobile-ki-dukan%2F">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" height="15px" fill="white">
                                        <path d="M100.3 448H7.4V148.9h92.9zM53.8 108.1C24.1 108.1 0 83.5 0 53.8a53.8 53.8 0 0 1 107.6 0c0 29.7-24.1 54.3-53.8 54.3zM447.9 448h-92.7V302.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V448h-92.8V148.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V448z"/>
                                    </svg>&nbsp;&nbsp;Linkedin</a>
                                </li>
                                <li><a target="_blank" href="https://www.threads.net/@mobilekidukaan_?xmt=AQGz0GePHlNwH4uHXe0rAqa8Jhfh6MRZyfFibZ0ugfUTsjs">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" height="15px" fill="white">
                                        <path d="M331.5 235.7c2.2 .9 4.2 1.9 6.3 2.8c29.2 14.1 50.6 35.2 61.8 61.4c15.7 36.5 17.2 95.8-30.3 143.2c-36.2 36.2-80.3 52.5-142.6 53h-.3c-70.2-.5-124.1-24.1-160.4-70.2c-32.3-41-48.9-98.1-49.5-169.6V256v-.2C17 184.3 33.6 127.2 65.9 86.2C102.2 40.1 156.2 16.5 226.4 16h.3c70.3 .5 124.9 24 162.3 69.9c18.4 22.7 32 50 40.6 81.7l-40.4 10.8c-7.1-25.8-17.8-47.8-32.2-65.4c-29.2-35.8-73-54.2-130.5-54.6c-57 .5-100.1 18.8-128.2 54.4C72.1 146.1 58.5 194.3 58 256c.5 61.7 14.1 109.9 40.3 143.3c28 35.6 71.2 53.9 128.2 54.4c51.4-.4 85.4-12.6 113.7-40.9c32.3-32.2 31.7-71.8 21.4-95.9c-6.1-14.2-17.1-26-31.9-34.9c-3.7 26.9-11.8 48.3-24.7 64.8c-17.1 21.8-41.4 33.6-72.7 35.3c-23.6 1.3-46.3-4.4-63.9-16c-20.8-13.8-33-34.8-34.3-59.3c-2.5-48.3 35.7-83 95.2-86.4c21.1-1.2 40.9-.3 59.2 2.8c-2.4-14.8-7.3-26.6-14.6-35.2c-10-11.7-25.6-17.7-46.2-17.8H227c-16.6 0-39 4.6-53.3 26.3l-34.4-23.6c19.2-29.1 50.3-45.1 87.8-45.1h.8c62.6 .4 99.9 39.5 103.7 107.7l-.2 .2zm-156 68.8c1.3 25.1 28.4 36.8 54.6 35.3c25.6-1.4 54.6-11.4 59.5-73.2c-13.2-2.9-27.8-4.4-43.4-4.4c-4.8 0-9.6 .1-14.4 .4c-42.9 2.4-57.2 23.2-56.2 41.8l-.1 .1z"/>
                                    </svg>&nbsp;&nbsp;Threads</a>
                                </li>
                                <li><a target="_blank" href="https://x.com/mobilekidukaan">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="15px" fill="white">
                                        <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/>
                                    </svg>&nbsp;&nbsp;x.com</a>
                                </li>
                                <li><a target="_blank" href="https://whatsapp.com/channel/0029Va8dFQN3mFYFXFh4T53P">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" height="15px" fill="white">
                                        <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
                                    </svg>&nbsp;&nbsp;Whatsapp</a>
                                </li>
                                <li><a target="_blank" href="https://www.youtube.com/@mobilekidukaannearby">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" height="13px" fill="white">
                                        <path d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z"/>
                                    </svg>&nbsp;&nbsp;Youtube</a>
                                </li>
                            </ul>  
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-2 col-12 mb-4 footer-menu">
                <span class="menu-title" style="display: block;">Talk To Us</span>
                <span style="display: block; font-weight: 100;">Got Questions? Call us</span><br>
                <a href="tel:+91 7023878974">+91 7023878974</a>
                <div class="d-flex">
                    <span class="mr-2"><i class="fas fa-envelope"></i></span>
                    <p><a href="mailto: Info@mobilekidukaan.in"> Info@mobilekidukaan.in</a></p>
                </div>
                <div class="d-flex">
                    <span class="mr-2"><i class="fa fa-building"></i></span>
                    <p>Bizcepts solutions Pvt Ltd</p>
                </div>
            </div>

            <div class="col-md-3 col-12 mb-4">
                <span style="display: block; font-weight: 100;">Sign up to receive the latest deals on mobile phones</span>
                <br>
                <form action="" data-parsley-validate="" novalidate="">
                    <div class="d-sm-flex">
                        <div class="form-group mg-b-0">
                            <input class="form-control wd-sm-250" name="email" placeholder="Enter email" required="" type="email">
                        </div>
                        <div class="mg-sm-l-10 mg-t-10 mg-sm-t-25">
                            <button class="btn ripple login-button pd-x-20" type="submit">Subscribe</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row pb-5">
            <div class="col-12">
                <span style="display: block; font-weight: 100; font-size: 0.8rem;">© 2024 All Rights Reserved</span>
            </div>
        </div>
    </div>
</footer>


<!-- Mobile Bottom Menu -->
<div class="mobile-bottom-menu d-md-none">
    <a href="{{(route('user.productCategories','mobile'))}}" class="menu-item  {{ request()->routeIs('user.productCategories','mobile') ? 'active' : '' }}">
        <i class="fas fa-mobile-alt"></i>
        <span>Mobiles</span>
    </a>
    <a href="{{(route('vendor.mobileAssessries','accessory'))}}" class="menu-item {{ request()->routeIs('vendor.mobileAssessries','accessory') ? 'active' : '' }}">
        <i class="fas fa-headphones-alt"></i>
        <span>Accessories</span>
    </a>
    @if(Auth::user())
       @if(Auth::user()->role == 0)
        <a href="{{ route('login') }}" class="menu-item">
                <i class="fas fa-user"></i>
                    <span href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</span>            <form id="logout-form" action="{{ route('logout') }}" method="get" style="display: none;">
                    @csrf
                </form>
            </a>   
        @else 
            <a href="{{Route('vendor.dashboard')}}" class="menu-item {{ request()->routeIs('vendor.dashboard') ? 'active' : '' }}">
                <i class="fas fa-user"></i>
                <span>Vendor</span>
            </a>
        @endif
    @else
       <a href="{{ route('login') }}" class="menu-item  {{ request()->routeIs('login') ? 'active' : '' }}">
            <i class="fas fa-user"></i>
            <span>Login</span>
        </a>
    @endif
    <a href="#" class="menu-item" id="open-nav-menu">
        <i class="fas fa-bars"></i>
        <span>Menu</span>
    </a>
</div>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
 <!-- Select2 -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>



 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ti-icons@0.1.2/css/themify-icons.min.css">

<script>
    $(document).ready(function() {
        $('#open-nav-menu').on('click', function() {
            $('.navigation-menu').toggle();
            $('.navbar-collapse').toggle();
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
   function setCookie(name, value, days) {
  var expires = "";
  if (days) {
    
    var date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    expires = "; expires=" + date.toUTCString();
  }
  document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

        document.addEventListener('DOMContentLoaded', (event) => {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                       var latitude = position.coords.latitude;
                       var longitude = position.coords.longitude;

                      setCookie("Longitude", longitude, 7); 
                      setCookie("Latitude", latitude, 7);  
                      if (!localStorage.getItem('locationRefreshed')) {
                            localStorage.setItem('locationRefreshed', 'true');
                            location.reload(); // Refresh the page
                        }
                                           
                    },
                    (error) => {
                        switch (error.code) {
                            case error.PERMISSION_DENIED:
                                console.error('User denied the request for Geolocation.');
                                break;
                            case error.POSITION_UNAVAILABLE:
                                console.error('Location information is unavailable.');
                                break;
                            case error.TIMEOUT:
                                console.error('The request to get user location timed out.');
                                break;
                            case error.UNKNOWN_ERROR:
                                console.error('An unknown error occurred.');
                                break;
                        }
                    }
                );
            } else {
                console.error('Geolocation is not supported by this browser.');
            }
        });
        if (window.location.protocol !== 'https:') {
               window.location.href = 'https://' + window.location.hostname +                          window.location.pathname + window.location.search;
         }



  
</script>

</body>
</html>
