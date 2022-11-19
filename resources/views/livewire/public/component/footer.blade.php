<div class="container">
    <div class="row footer-theme partition-f">
        <div class="col-lg-4 col-md-6">
            <div class="footer-title footer-mobile-title">
                <h4>about</h4>
            </div>
            <div class="footer-contant">
                <a href="{{ route('home') }}" class="footer-logo">
                    <!-- Logo -->
                    <img src="{{asset('assets/fixed-image/logo.png')}}" width="40px" alt="logo" style="margin-left: 28px;">
                    <h3 style="font-family: Trebuchet MS, Tahoma, sans-serif;">BHAVANA</h3>
                </a>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                    ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                </p>
                <div class="footer-social">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col offset-xl-1">
            <div class="sub-title">
                <div class="footer-title">
                    <h4>Categories</h4>
                </div>
                <div class="footer-contant">
                    <ul>
                        @foreach($categories as $category)
                            <li>
                                <a href="{{ route('products', ['category'=>str_replace(' ', '-', $category['product_category'])]) }}" class="text-uppercase">
                                    {{ $category['product_category'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="sub-title">
                <div class="footer-title">
                    <h4>Important links</h4>
                </div>
                <div class="footer-contant">
                    <ul>
                        <li><a href="#">shipping & return</a></li>
                        <li><a href="#">secure shopping</a></li>
                        <li><a href="#">gallary</a></li>
                        <li><a href="#">affiliates</a></li>
                        <li><a href="#">contacts</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="sub-title">
                <div class="footer-contant">
                    <div class="">
                        <img src="{{ asset('assets/fixed-image/Make_In_India.png') }}" alt="make in india" width="200px">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
