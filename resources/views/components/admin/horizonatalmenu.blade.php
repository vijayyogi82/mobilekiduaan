<div class="main-navbar hor-menu sticky">
    <div class="container">
        <ul class="nav">
            
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.dashboard')}}"><i class="ti-home"></i>Dashboard</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.mobile.accessories')}}"><i class="ti-headphone"></i>Accessories</a>
            </li>

            <li class="nav-item">
                <a class="nav-link with-sub" href="javascript:void(0)"><i class="ti-mobile"></i></i>Mobiles</a>
                <ul class="nav-sub">
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="{{Route('admin.mobile.index')}}">New Mobiles</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="{{Route('admin.refurbnished.index')}}">Refurbnished Mobiles</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link with-sub" href="javascript:void(0)"><i class="ti-image"></i>Banners</a>
                <ul class="nav-sub">
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="{{route('admin.banner.slider')}}">slider</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="{{route('homes.index')}}">Banners</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="{{route('admin.banner.setting')}}">Banner setting</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('blogs.index')}}"><i class="ti-book"></i>Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.discount.index')}}"><i class="ti-money"></i>Discounts</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.plans')}}"><i class="ti-wallet"></i>plans</a>
            </li>

            <li class="nav-item">
                <a class="nav-link with-sub" href="#"><i class="ti-wallet"></i>Meta SEO</a>
                <ul class="nav-sub">
                    <li class="nav-sub-item">
                        <a href="{{ route('admin.seo_page', 'home') }}" class="nav-sub-link">Home Page</a>
                    </li>
                    <li class="nav-sub-item">
                        <a href="{{ route('admin.seo_page', 'mobile') }}" class="nav-sub-link">Mobile Page</a>
                    </li>
                    <li class="nav-sub-item">
                        <a href="{{ route('admin.seo_page', 'refurbished') }}" class="nav-sub-link">Refurbished Page</a>
                    </li>
                    <li class="nav-sub-item">
                        <a href="{{ route('admin.seo_page', 'accessories') }}" class="nav-sub-link">Accessories Page</a>
                    </li>
                    <li class="nav-sub-item">
                        <a href="{{ route('admin.seo_page', 'store') }}" class="nav-sub-link">Store Page</a>
                    </li>
                    <li class="nav-sub-item">
                        <a href="{{ route('admin.seo_page', 'blog') }}" class="nav-sub-link">Blog Page</a>
                    </li>
                    <li class="nav-sub-item">
                        <a href="{{ route('admin.seo_page', 'contact') }}" class="nav-sub-link">Contact Page</a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <a class="nav-link with-sub" href="javascript:void(0)"><i class="ti-id-badge"></i>Vendors</a>
                <ul class="nav-sub">
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="{{route('vendors.index')}}">Vendors</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="{{route('vendor.mobile.count')}}">Vendor Mobiles</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.setting')}}"><i class="ti-settings"></i>Setting</a>
            </li>

            

        </ul>
    </div>
</div>