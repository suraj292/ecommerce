<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('admin_assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('admin_assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('admin_assets/images/favicon.ico')}}" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @yield('style')
    <livewire:styles />
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
        <livewire:admin.component.navbar />
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <a href="#" class="nav-link">
                        <div class="nav-profile-image">
                            <img src="{{asset('admin_assets/images/faces/face1.jpg')}}" alt="profile">
                            <span class="login-status online"></span>
                            <!--change to offline or busy as needed-->
                        </div>
                        <div class="nav-profile-text d-flex flex-column">
                            <span class="font-weight-bold mb-2 text-uppercase">{{ session('admin') }}</span>
                            <span class="text-secondary text-small">{{ session('admin') == 'admin' ? 'Master Control' : 'editor' }}</span>
                        </div>
                        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                        <span class="menu-title">Home</span>
                        <i class="menu-arrow"></i>
                        <i class="mdi mdi-home menu-icon"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="{{route('slider')}}">Slider</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{route('collection_banner')}}">Collection banner</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#products" aria-expanded="false" aria-controls="products">
                        <span class="menu-title">Products</span>
                        <i class="menu-arrow"></i>
                        <i class="mdi mdi-package-variant menu-icon"></i>
                    </a>
                    <div class="collapse" id="products">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="{{route('product_category')}}">Category</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{route('sub_category')}}">Sub Category</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{route('admin.color')}}">Product Colors</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{route('admin.products')}}">Products</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="false" aria-controls="users">
                        <span class="menu-title">Users</span>
                        <i class="menu-arrow"></i>
                        <i class="mdi mdi-account-multiple menu-icon"></i>
                    </a>
                    <div class="collapse" id="users">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="{{route('product_category')}}">Verified</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{route('sub_category')}}">Unverified</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.collection') }}">
                        <span class="menu-title">Collections</span>
                        <i class="mdi mdi-animation menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.stocks') }}">
                        <span class="menu-title">Stocks</span>
                        <i class="mdi mdi-cart-plus menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.sale') }}">
                        <span class="menu-title">Sale / Offer</span>
                        <i class="mdi mdi-sale menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.giftCard') }}">
                        <span class="menu-title">Gift Card</span>
                        <i class="mdi mdi-cash-multiple menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('coupon') }}">
                        <span class="menu-title">Coupons</span>
                        <i class="mdi mdi-tag-multiple menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.orders') }}">
                        <span class="menu-title">Orders</span>
                        <i class="mdi mdi-clipboard-text menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item sidebar-actions">
                  <span class="nav-link">
                    <button class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add Product</button>
                  </span>
                </li>
            </ul>
        </nav>
        <!-- partial -->
{{--        {{$slot}}--}}
        @yield('content') @if( isset($slot) ) {{ $slot }} @endif
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{asset('admin_assets/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{asset('admin_assets/vendors/chart.js/Chart.min.js')}}"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('admin_assets/js/off-canvas.js')}}"></script>
<script src="{{asset('admin_assets/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('admin_assets/js/misc.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
{{--<script src="{{asset('admin_assets/js/dashboard.js')}}"></script>--}}
<script src="{{asset('admin_assets/js/todolist.js')}}"></script>
<!-- End custom js for this page -->
<!-- Alpine JS-->
{{--<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>--}}
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<script src="{{ mix('js/app.js') }}"></script>
<livewire:scripts />
@yield('script')
</body>
</html>
