<div class="">
    <header class="header-2 manu-hover-effect">
        <div class="mobile-fix-option"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="main-menu border-top-0" >
                        <div class="menu-left">
                            <div class="navbar">
                                <span>
                                    <i class="fa fa-bars sidebar-bar" aria-hidden="true" style="color: #ffffff00;"></i>
                                </span>
                            </div>
                        </div>
                        <div class="brand-logo layout2-logo">
                            <a href="{{route('home')}}">
                                <h2>BHAVANA</h2>
                            </a>
                        </div>
                        <div class="menu-right pull-right">
                            <div class="icon-nav">
                                <ul>
                                    <li class="onhover-div mobile-search">
                                        <div>
                                            <img src="/assets/images/icon/search.png" onclick="openSearch()"
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
                                            <img src="/assets/images/icon/setting.png"
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
                                                    <li><a wire:click="logout">Logout</a></li>
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
                                            <img src="assets/images/icon/cart.png"
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
                                <li><a href="#">Home</a></li>
                                <li class="mega" id="hover-cls">
                                    <a href="#">feature <div class="lable-nav">new</div></a>
                                    <ul class="mega-menu full-mega-menu">
                                        <li>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col mega-box">
                                                        <div class="link-section">
                                                            <div class="menu-title">
                                                                <h5>add to cart</h5>
                                                            </div>
                                                            <div class="menu-content">
                                                                <ul>
                                                                    <li><a href="nursery.html">cart modal
                                                                            popup</a></li>
                                                                    <li><a href="vegetables.html">qty.
                                                                            counter
                                                                            <i class="fa fa-bolt icon-trend"
                                                                               aria-hidden="true"></i></a>
                                                                    </li>
                                                                    <li><a href="bags.html">cart top</a>
                                                                    </li>
                                                                    <li><a href="shoes.html">cart bottom</a>
                                                                    </li>
                                                                    <li><a href="watch.html">cart left</a>
                                                                    </li>
                                                                    <li><a href="tools.html">cart right</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col mega-box">
                                                        <div class="link-section">
                                                            <div class="menu-title">
                                                                <h5>model</h5>
                                                            </div>
                                                            <div class="menu-content">
                                                                <ul>
                                                                    <li><a href="index.html">Newsletter</a>
                                                                    </li>
                                                                    <li><a href="index.html">exit<i
                                                                                class="ms-2 fa fa-bolt icon-trend"
                                                                                aria-hidden="true"></i></a>
                                                                    </li>
                                                                    <li><a href="christmas.html">christmas</a>
                                                                    </li>
                                                                    <li><a href="furniture-3.html">black
                                                                            friday</a></li>
                                                                    <li><a href="fashion-4.html">cyber
                                                                            monday</a></li>
                                                                    <li><a href="fashion-6.html">new
                                                                            year</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col mega-box">
                                                        <div class="link-section">
                                                            <div class="menu-title">
                                                                <h5>cookie bar</h5>
                                                            </div>
                                                            <div class="menu-content">
                                                                <ul>
                                                                    <li><a href="index.html">bottom<i
                                                                                class="ms-2 fa fa-bolt icon-trend"
                                                                                aria-hidden="true"></i></a>
                                                                    </li>
                                                                    <li><a href="fashion-4.html">bottom
                                                                            left</a></li>
                                                                    <li><a href="bicycle.html">bottom
                                                                            right</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="menu-title mt-2">
                                                                <h5>search</h5>
                                                            </div>
                                                            <div class="menu-content">
                                                                <ul>
                                                                    <li><a href="marketplace-demo-2.html">ajax
                                                                            search<i class="ms-2 fa fa-bolt icon-trend"
                                                                                     aria-hidden="true"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col mega-box">
                                                        <div class="link-section">
                                                            <div class="menu-title">
                                                                <h5>invoice template</h5>
                                                            </div>
                                                            <div class="menu-content">
                                                                <ul>
                                                                    <li><a target="_blank"
                                                                           href="invoice-1.html">invoice
                                                                            1</a></li>
                                                                    <li><a target="_blank"
                                                                           href="invoice-2.html">invoice
                                                                            2</a></li>
                                                                    <li><a target="_blank"
                                                                           href="invoice-3.html">invoice
                                                                            3</a></li>
                                                                    <li><a target="_blank"
                                                                           href="invoice-4.html">invoice
                                                                            4</a></li>
                                                                    <li><a target="_blank"
                                                                           href="invoice-5.html">invoice
                                                                            5</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col mega-box">
                                                        <div class="link-section">
                                                            <div class="menu-title">
                                                                <h5>email template</h5>
                                                            </div>
                                                            <div class="menu-content">
                                                                <ul>
                                                                    <li><a target="_blank"
                                                                           href="../email-template/email-order-success.html">order
                                                                            success</a></li>
                                                                    <li><a target="_blank"
                                                                           href="../email-template/email-order-success-two.html">order
                                                                            success 2</a></li>
                                                                    <li><a target="_blank"
                                                                           href="../email-template/email-template.html">email
                                                                            template</a></li>
                                                                    <li><a target="_blank"
                                                                           href="../email-template/email-template-two.html">email
                                                                            template 2</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="menu-title mt-2">
                                                                <h5>elements</h5>
                                                            </div>
                                                            <div class="menu-content">
                                                                <ul>
                                                                    <li><a href="elements.html">
                                                                            elements page<i
                                                                                class="ms-2 fa fa-bolt icon-trend"
                                                                                aria-hidden="true"></i>
                                                                        </a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <img src="../assets/images/menu-banner.jpg"
                                                             class="img-fluid mega-img">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">shop</a>
                                    <ul>
                                        <li><a href="category-page(top-filter).html">top filter<span
                                                    class="new-tag">new</span></a></li>
                                        <li><a href="category-page(modern).html">modern<span
                                                    class="new-tag">new</span></a></li>
                                        <li><a href="category-page.html">left sidebar</a></li>
                                        <li><a href="category-page(right).html">right sidebar</a></li>
                                        <li><a href="category-page(no-sidebar).html">no sidebar</a></li>
                                        <li><a href="category-page(sidebar-popup).html">sidebar popup</a>
                                        </li>
                                        <li><a href="category-page(metro).html">metro</a></li>
                                        <li><a href="category-page(full-width).html">full width</a></li>
                                        <li><a href="category-page(infinite-scroll).html">infinite
                                                scroll</a></li>
                                        <li><a href=category-page(3-grid).html>three grid</a></li>
                                        <li><a href="category-page(6-grid).html">six grid</a></li>
                                        <li><a href="category-page(list-view).html">list view</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">product</a>
                                    <ul>
                                        <li><a href="product-page(360-view).html">360 view <span
                                                    class="new-tag">new</span></a></li>
                                        <li><a href="product-page(video-thumbnail).html">video
                                                thumbnail<span class="new-tag">new</span></a></li>
                                        <li>
                                            <a href="#">sidebar</a>
                                            <ul>
                                                <li><a href="product-page.html">left sidebar</a></li>
                                                <li><a href="product-page(right-sidebar).html">right
                                                        sidebar</a>
                                                </li>
                                                <li><a href="product-page(no-sidebar).html">no sidebar</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">thumbnail image</a>
                                            <ul>
                                                <li><a href="product-page(left-image).html">left image</a>
                                                </li>
                                                <li><a href="product-page(right-image).html">right image</a>
                                                </li>
                                                <li><a href="product-page(image-outside).html">image
                                                        outside</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">three column</a>
                                            <ul>
                                                <li><a href="product-page(3-col-left).html">thumbnail
                                                        left</a>
                                                </li>
                                                <li><a href="product-page(3-col-right).html">thumbnail
                                                        right</a>
                                                </li>
                                                <li><a href="product-page(3-column).html">thubnail
                                                        bottom</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="product-page(4-image).html">four image</a></li>
                                        <li><a href="product-page(sticky).html">sticky</a></li>
                                        <li><a href="product-page(accordian).html">accordian</a></li>
                                        <li><a href="product-page(bundle).html">bundle</a></li>
                                        <li><a href="product-page(image-swatch).html">image swatch </a></li>
                                        <li><a href="product-page(vertical-tab).html">vertical tab</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">pages</a>
                                    <ul>
                                        <li>
                                            <a href="#">vendor</a>
                                            <ul>
                                                <li><a href="vendor-dashboard.html">vendor dashboard</a>
                                                </li>
                                                <li><a href="vendor-profile.html">vendor profile</a></li>
                                                <li><a href="become-vendor.html">become vendor</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">account</a>
                                            <ul>
                                                <li><a href="wishlist.html">wishlist</a></li>
                                                <li><a href="cart.html">cart</a></li>
                                                <li><a href="dashboard.html">Dashboard</a></li>
                                                <li><a href="login.html">login</a></li>
                                                <li><a href="register.html">register</a></li>
                                                <li><a href="contact.html">contact</a></li>
                                                <li><a href="forget_pwd.html">forget password</a></li>
                                                <li><a href="profile.html">profile</a></li>
                                                <li><a href="checkout.html">checkout</a></li>
                                                <li><a href="order-success.html">order success</a></li>
                                                <li><a href="order-tracking.html">order tracking<span
                                                            class="new-tag">new</span></a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">portfolio</a>
                                            <ul>
                                                <li><a href="">grid</a>
                                                    <ul>
                                                        <li><a href="grid-2-col.html">grid
                                                                2</a></li>
                                                        <li><a href="grid-3-col.html">grid
                                                                3</a></li>
                                                        <li><a href="grid-4-col.html">grid
                                                                4</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="">masonry</a>
                                                    <ul>
                                                        <li><a href="masonary-2-grid.html">grid 2</a></li>
                                                        <li><a href="masonary-3-grid.html">grid 3</a></li>
                                                        <li><a href="masonary-4-grid.html">grid 4</a></li>
                                                        <li><a href="masonary-fullwidth.html">full width</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="about-page.html">about us</a></li>
                                        <li><a href="search.html">search</a></li>
                                        <li><a href="review.html">review</a>
                                        </li>
                                        <li>
                                            <a href="#">compare</a>
                                            <ul>
                                                <li><a href="compare.html">compare</a></li>
                                                <li><a href="compare-2.html">compare-2</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="collection.html">collection</a></li>
                                        <li><a href="lookbook.html">lookbook</a></li>
                                        <li><a href="sitemap.html">site map</a>
                                        </li>
                                        <li><a href="404.html">404</a></li>
                                        <li><a href="coming-soon.html">coming soon</a></li>
                                        <li><a href="faq.html">FAQ</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">blog</a>
                                    <ul>
                                        <li><a href="blog-page.html">left sidebar</a></li>
                                        <li><a href="blog(right-sidebar).html">right sidebar</a></li>
                                        <li><a href="blog(no-sidebar).html">no sidebar</a></li>
                                        <li><a href="blog-details.html">blog details</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
