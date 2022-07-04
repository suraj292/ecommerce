<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="multikart">
    <meta name="keywords" content="multikart">
    <meta name="author" content="multikart">
    <link rel="icon" href="{{asset('assets/images/favicon/5.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon/5.png')}}" type="image/x-icon">
    <title>House Of Bhavana</title>

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Yellowtail&amp;display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Recursive:wght@400;500;600;700;800;900&amp;display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&amp;display=swap" rel="stylesheet">

    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/slick-theme.css')}}">

    <!-- Animate icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/animate.css')}}">

    <!-- Themify icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/themify-icons.css')}}">

    <!-- Bootstrap css -->
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
{{--    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/fontawesome.css')}}">--}}

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">

    <!--  jquery  -->
{{--    <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>--}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Custome css -->
    <style>
        .manu-hover-effect:hover{
            background-color: whitesmoke;
            transition:800ms;
        }
    </style>
    @yield('style')

    <livewire:styles />
</head>

<body class="">
<!-- header start -->
<livewire:public.component.header />
<!-- header end -->

        {{$slot}}

<!-- footer start -->
<footer class="footer-light">
    <div class="light-layout">
        <div class="container">
            <section class="small-section border-section border-top-0">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="subscribe">
                            <div>
                                <h4>KNOW IT ALL FIRST!</h4>
                                <p>Never Miss Anything From Multikart By Signing Up To Our Newsletter.</p>
                            </div>
                        </div>
                    </div>
                    <livewire:public.component.subscribe />
                </div>
            </section>
        </div>
    </div>
    <section class="section-b-space light-layout">
        <livewire:public.component.footer />
    </section>
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="footer-end">
                        <p><i class="fa fa-copyright" aria-hidden="true"></i> 2017-18 themeforest powered by
                            pixelstrap</p>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="payment-card-bottom">
                        <ul>
                            <li>
                                <a href="#"><img src="{{asset('assets/images/icon/visa.png')}}" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{asset('assets/images/icon/mastercard.png')}}" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{asset('assets/images/icon/paypal.png')}}" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{asset('assets/images/icon/american-express.png')}}" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{asset('assets/images/icon/discover.png')}}" alt=""></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer end -->


<!-- offer section start -->
<div class="sale-box" data-bs-toggle="modal" data-bs-target="#blackfriday">
    <div class="heading-right">
        <h3>Black Friday</h3>
    </div>
</div>
<!-- offer section end -->


<!--modal popup start-->
<div class="modal fade bd-example-modal-lg blackfriday-modal" id="blackfriday" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="modal-bg">
                                <div class="side-lines"><span></span></div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="confetti">
                                    <div class="confetti-piece"></div>
                                    <div class="confetti-piece"></div>
                                    <div class="confetti-piece"></div>
                                    <div class="confetti-piece"></div>
                                    <div class="confetti-piece"></div>
                                    <div class="confetti-piece"></div>
                                    <div class="confetti-piece"></div>
                                    <div class="confetti-piece"></div>
                                    <div class="confetti-piece"></div>
                                    <div class="confetti-piece"></div>
                                    <div class="confetti-piece"></div>
                                    <div class="confetti-piece"></div>
                                    <div class="confetti-piece"></div>
                                </div>
                                <div class="content">
                                    <h1>Black</h1>
                                    <h1>Friday</h1>
                                    <h2>sale</h2>
                                    <div class="discount">get
                                        <span>30%</span>
                                        off
                                        <span class="plus">+</span>
                                        <span>FREE SHIPPING</span>
                                    </div>
                                    <div class="btn btn-solid">USE CODE: <span>BLACK</span></div>
                                    <p>*check shipping conditions in our website</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--modal popup end-->


<!-- Quick-view modal popup start-->
<div class="modal fade bd-example-modal-lg theme-modal" id="quick-view" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content quick-view-modal">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-lg-6 col-xs-12">
                        <div class="quick-view-img"><img src="{{asset('assets/images/pro3/1.jpg')}}" alt=""
                                                         class="img-fluid blur-up lazyload"></div>
                    </div>
                    <div class="col-lg-6 rtl-text">
                        <div class="product-right">
                            <h2>Women Pink Shirt</h2>
                            <h3>$32.96</h3>
                            <ul class="color-variant">
                                <li class="bg-light0"></li>
                                <li class="bg-light1"></li>
                                <li class="bg-light2"></li>
                            </ul>
                            <div class="border-product">
                                <h6 class="product-title">product details</h6>
                                <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium
                                    doloremque laudantium</p>
                            </div>
                            <div class="product-description border-product">
                                <div class="size-box">
                                    <ul>
                                        <li class="active"><a href="javascript:void(0)">s</a></li>
                                        <li><a href="javascript:void(0)">m</a></li>
                                        <li><a href="javascript:void(0)">l</a></li>
                                        <li><a href="javascript:void(0)">xl</a></li>
                                    </ul>
                                </div>
                                <h6 class="product-title">quantity</h6>
                                <div class="qty-box">
                                    <div class="input-group"><span class="input-group-prepend"><button type="button"
                                                                                                       class="btn quantity-left-minus" data-type="minus" data-field=""><i
                                                    class="ti-angle-left"></i></button> </span>
                                        <input type="text" name="quantity" class="form-control input-number"
                                               value="1"> <span class="input-group-prepend"><button type="button"
                                                                                                    class="btn quantity-right-plus" data-type="plus" data-field=""><i
                                                    class="ti-angle-right"></i></button></span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-buttons"><a href="#" class="btn btn-solid">add to cart</a> <a
                                    href="#" class="btn btn-solid">view detail</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quick-view modal popup end-->

<!-- Add to cart modal popup start-->
<!-- Add to cart modal popup end-->


<!-- tap to top start -->
<div class="tap-top">
    <div><i class="fa fa-angle-double-up"></i></div>
</div>
<!-- tap to top end -->


<!-- latest jquery-->


<!-- menu js-->
<script src="{{asset('assets/js/menu.js')}}"></script>

<!-- lazyload js-->
<script src="{{asset('assets/js/lazysizes.min.js')}}"></script>

<!-- slick js-->
<script src="{{asset('assets/js/slick.js')}}"></script>
<script src="{{asset('assets/js/slick-animation.min.js')}}"></script>

<!-- Bootstrap js-->
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

<!-- Video js-->
<!--    <script src="assets/js/jquery.vide.min.js"></script>-->

<!-- Bootstrap Notification js-->
<script src="{{asset('assets/js/bootstrap-notify.min.js')}}"></script>

<!-- Theme js-->
{{--<script src="{{asset('assets/js/theme-setting.js')}}"></script>--}}
<script src="{{asset('assets/js/script.js')}}"></script>
<script src="{{asset('assets/js/custom-slick-animated.js')}}"></script>

<script>
    /*$(window).on('load', function () {
        setTimeout(function () {
            $('#blackfriday').modal('show');
        }, 2500);
    });

    function openSearch() {
        document.getElementById("search-overlay").style.display = "block";
    }

    function closeSearch() {
        document.getElementById("search-overlay").style.display = "none";
    }*/
</script>

<script type="text/javascript">
    $('.custom-slider-2').slick({
        infinite: true,
        slidesToShow: 1,
        autoplay: true,
        arrows: false,
    });
</script>

<livewire:scripts />
@yield('script')
</body>
</html>
