<div class="">
    <header class="header-2 manu-hover-effect custom-banner">
        <div class="mobile-fix-option"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="main-menu border-top-0" style="margin-bottom: -20px;">
                        <div class="menu-left">
                            <div class="">
                                <span>
                                    <i class="fa fa-bars sidebar-bar" aria-hidden="true" style="color: #ffffff00;"></i>
                                </span>
                            </div>
                        </div>
                        <div class="brand-logo layout2-logo" style="margin-left: 70px;">
                            <a href="{{route('home')}}">
                                <h2>BHAVANA</h2>
                            </a>
                        </div>
                        <div class="menu-right pull-right">
                            <div class="icon-nav">
                                <ul>
                                    <li class="onhover-div mobile-search">
                                        <div>
                                            <img src="{{ asset('assets/images/icon/search.png') }}" onclick="openSearch()"
                                                  class="img-fluid blur-up lazyload" alt="">
                                            <i class="ti-search" onclick="openSearch()"></i>
                                        </div>
                                        <div id="search-overlay" class="search-overlay">
                                            <div><span class="closebtn" onclick="closeSearch()"
                                                       title="Close Overlay">×</span>
                                                <div class="overlay-content">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <form>
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control"
                                                                               id="exampleInputPassword1"
                                                                               placeholder="Search a Product">
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary"><i
                                                                            class="fa fa-search"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="onhover-div mobile-setting">
                                        <div>
                                            <img src="{{ asset('assets/images/icon/setting.png') }}"
                                                 class="img-fluid lazyload" alt="">
                                            <i class="ti-settings"></i>
                                        </div>
                                        <div class="show-div setting">
                                            @auth()
                                                <h6 class="text-uppercase">{{ $user->name }}</h6>
                                                <ul>
                                                    <li><a href="{{ route('public.account') }}">Account</a></li>
                                                    <li><a href="{{ route('public.account').'/wallet' }}">Wallet</a></li>
                                                    <li><a href="{{ route('public.account').'/order' }}">My Orders</a></li>
                                                    <li><a href="" wire:click="logout">Logout</a></li>
                                                </ul>
                                            @endauth
                                            @guest()
                                                <h6>Account</h6>
                                                <ul class="list-inline">
                                                    <li>
                                                        <a href="{{ route('login') }}">
                                                            Sign in
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('register') }}">
                                                            Register
                                                        </a>
                                                    </li>
                                                </ul>
                                            @endguest
                                        </div>
                                    </li>
                                    <li class="onhover-div mobile-cart">
                                        <div>
                                            <img src="{{ asset('assets/images/icon/cart.png') }}"
                                                 class="img-fluid blur-up lazyload" alt=""><i
                                                class="ti-shopping-cart"></i>
                                        </div>
                                        @if(!is_null($cart))
                                            <span class="cart_qty_cls">{{ count($cart) }}</span>
                                            <ul class="show-div shopping-cart">
                                                <!-- Cart product -->
                                                <span style="display: none;">
                                                    {{ $subtotal=0 }}
                                            </span>
                                                @foreach($cart as $key => $cartProduct)
                                                    <li>
                                                        <div class="media">
                                                            <a href="#">
                                                                <img class="me-3" src="{{asset('storage/product/small/'.$cartProduct['image'])}}" alt="{{ $cartProduct['title'] }}">
                                                            </a>
                                                            <div class="media-body">
                                                                <a href="#">
                                                                    <h4>{{ $cartProduct['title'] }}</h4>
                                                                </a>
                                                                <h4>
                                                                    {{--                                                                <span>1 x $ 299.00</span>--}}
                                                                    <span>
                                                                {{ $cartProduct['quantity'] }}  x &#8377;
                                                                {{ $cartSubtotal = $cartProduct['offer_price'] > 0 ? $cartProduct['offer_price'] : $cartProduct['price'] }}
                                                                </span>
                                                                    <span style="display: none;">
                                                                    {{ $subtotal += $cartSubtotal * $cartProduct['quantity'] }}
                                                                </span>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                        <div class="close-circle">
                                                            @auth()
                                                                <a wire:click="dProductCart({{ $cartProduct['product_id'] }})">
                                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                                </a>
                                                            @endauth
                                                            @guest()
                                                                <a wire:click="dProductCart({{ $key }})">
                                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                                </a>
                                                            @endguest
                                                        </div>
                                                    </li>
                                                @endforeach
                                                <li>
                                                    <div class="total">
                                                        <h5>subtotal : <span>&#8377;{{ $subtotal }}</span></h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="buttons">
                                                        <a href="{{ route('cart') }}" class="view-cart">view cart</a>
                                                        <a href="{{ route('checkout') }}" class="checkout">checkout</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        @else
                                            <span class="cart_qty_cls">0</span>
                                            <ul class="show-div shopping-cart">
                                                <!-- if empty Cart product -->
                                                <li>
                                                    <div class="media">
                                                        <div class="media-body">
                                                            <h5>Your Cart is empty.</h5>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navigation Menu -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-nav-center">
                        <nav id="main-nav">
                            <div class="toggle-nav"><i class="fa fa-bars sidebar-bar" style="color: #0a0a0a;"></i></div>
                            <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                <li>
                                    <div class="mobile-back text-end">Back<i class="fa fa-angle-right ps-2"
                                                                             aria-hidden="true"></i></div>
                                </li>
{{--                                <li><a href="#">Home</a></li>--}}
                                <style>
                                    #hover-cls{
                                        font-size: 17px;
                                    }
                                </style>
                                <li class="mega" id="hover-cls" wire:ignore>
                                    <a href="#">SHOP</a>
                                    <ul class="mega-menu full-mega-menu" style="z-index: 2">
                                        <li>
                                            <div class="container">
                                                <div class="row">

                                                    <div class="col-4">
                                                        <div class="link-section">
                                                            <div class="menu-title">
                                                                <h5 class="text-uppercase">Category</h5>
                                                            </div>
                                                            <div class="menu-content">
                                                                <ul>
                                                                    @foreach($categories as $category)
                                                                        <li>
{{--                                                                            <a href="{{ route('products', \Illuminate\Support\Str::slug($category['product_category']) ) }}">--}}
                                                                            <a href="{{ route('products', ['category'=>str_replace(' ', '-', $category['product_category'])]) }}">
                                                                                {{ $category['product_category'] }}
{{--                                                                                <i class="fa fa-bolt icon-trend" aria-hidden="true"></i>--}}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
{{--                                                    @if($collections->count() > 0)--}}
                                                    <div class="col-4">
                                                        <div class="link-section">
                                                            <div class="menu-title">
                                                                <h5 class="text-uppercase">Collection</h5>
                                                            </div>
                                                            <div class="menu-content">
                                                                <ul>
                                                                    @foreach($collections as $collection)
                                                                        <li>
                                                                            <a href="{{ route('collection', Str::slug($collection['name'])) }}">
                                                                                {{ $collection['name'] }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
{{--                                                    @endif--}}
                                                    <div class="col-4">
                                                        <div class="link-section">
                                                            <div class="menu-title">
                                                                <h5>GENDER</h5>
                                                            </div>
                                                            <div class="menu-content">
                                                                <ul>
                                                                    <li>
{{--                                                                        <a href="{{ route('products', 'male') }}">Male</a>--}}
                                                                        <a href="#">Male</a>
                                                                    </li>
                                                                    <li>
{{--                                                                        <a href="{{ route('products', 'female') }}">Female</a>--}}
                                                                        <a href="#">Female</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-12">--}}
{{--                                                        <img src="../assets/images/menu-banner.jpg" class="img-fluid mega-img">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('leather&art') }}">Leather & art</a>
                                </li>
{{--                                <li><a href="#">value combo</a></li>--}}
{{--                                <li><a href="{{ route('blog') }}">Blogs</a></li>--}}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
