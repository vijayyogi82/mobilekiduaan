<div class="card-body">
    <nav class='animated bounceInDown bg-prime vendor-menu'>
        <ul>
            <li class="{{ request()->routeIs('vendor.dashboard') ? 'active' : '' }}">
                <a href="{{route('vendor.dashboard')}}"
                    class="{{ request()->routeIs('vendor.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home mr-2"></i>&nbsp;Overview
                </a>
            </li>
            <li class='sub-menu'>
                <a href="#settings" aria-expanded="false">
                    <i class="fas fa-mobile-alt mr-2"></i>&nbsp;Mobile
                    <div class='fa fa-caret-down right'></div>
                </a>
                <ul>
                    <!-- New -->
                    <li class='sub-menu'>
                        <a href="#settings" aria-expanded="false">
                            <i class="fas fa-mobile-alt mr-2"></i>&nbsp;New
                            <div class='fa fa-caret-down right'></div>
                        </a>
                        <ul>
                            <li class="{{ request()->routeIs('vendor.mobileIndex') ? 'active' : '' }}">
                                <a href="{{route('vendor.mobileIndex')}}">Mobile list</a>
                            </li>
                            <li class="{{ request()->routeIs('vendor.bulk.mobiles.add') ? 'active' : '' }}">
                                <a href="{{route('vendor.bulk.mobiles.add')}}">Bulk Upload</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Refurbished -->
                    <li class='sub-menu'>
                        <a href="#settings" aria-expanded="false">
                            <i class="fas fa-mobile-alt mr-2"></i>&nbsp;Refurbished
                            <div class='fa fa-caret-down right'></div>
                        </a>
                        <ul>
                            <li class="{{ request()->routeIs('vendor.refurbished_mobile') ? 'active' : '' }}">
                                <a href="{{route('vendor.refurbished_mobile')}}">Mobile list</a>
                            </li>
                            <li class="{{ request()->routeIs('vendor.refurbnished.bulk.mobiles.add') ? 'active' : '' }}">
                                <a href="{{route('vendor.refurbnished.bulk.mobiles.add')}}">Bulk Upload</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Accessories -->
                    <li class="{{ request()->routeIs('vendor.refurbished_mobile') ? 'active' : '' }}">
                        <a href="{{route('vendor.accessories')}}">Mobile Accessories</a>
                    </li>
                </ul>
            </li>

            <li class="{{ request()->routeIs('vendor.bannerCreate') ? 'active' : '' }}">
                <a href="{{route('vendor.bannerCreate')}}">
                    <i class="fas fa-image mr-2"></i>&nbsp;Banners</a>
                </li>
            <li class="{{ request()->routeIs('vendor.account') || request()->routeIs('vendor.changePassword') ? 'active' : '' }}">
                <a href="{{route('vendor.account')}}" class="{{ request()->routeIs('vendor.account') ? 'active' : '' }}">
                    <i class="fas fa-user mr-2"></i>&nbsp;Profile
                </a>
            </li>
            <li><a href="{{ route('logout') }}"><i class="fas fa-power-off mr-2"></i>&nbsp;Logout</a></li>
        </ul>
    </nav>
</div>