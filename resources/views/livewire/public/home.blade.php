<div>

    <!-- Home slider -->
    <section class="p-0 height-100 sm-responsive">
        <div class="slider-animate home-slider">
            @foreach($slides as $slider)
            <div>
                <div class="home">
                    <img src="{{asset('storage/slider/'.$slider->image)}}" alt="" class="bg-img blur-up lazyload">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <div class="slider-contain">
                                    <div>
                                        <h4 class="animated text-light" data-animation-in="fadeInUp">{{$slider->h4}}</h4>
                                        <h1 class="animated text-white" data-animation-in="fadeInUp"
                                            data-delay-in="0.3">{{$slider->h1}}</h1>
                                        @if(!is_null($slider->button_name))
                                        <a href="{{$slider->button_link}}" class="btn btn-solid animated" data-animation-in="fadeInUp"
                                           data-delay-in="0.5">{{$slider->button_name}}
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!-- Home slider end -->


    <!-- collection banner -->
    <section class="banner-padding absolute-banner banner-style-2 pb-0 ratio2_1">
        <div class="absolute-bg">
            <div class="container">
                <div class="row partition2">
                    @foreach($banners as $banner)
                    <div class="col-md-4"><!-- start -->
                        <a href="#">
                            <div class="collection-banner p-right text-center">
                                <div style="background-color: {{$banner->bg_color}};">
                                    <img src="" class="img-fluid blur-up lazyload bg-img" alt="">
                                </div>
                                <div class="absolute-img">
                                    <img src="{{asset('storage/slider/'.$banner->image)}}" class="img-fluid" alt="">
                                </div>
                                <div class="contain-banner banner-3">
                                    <div>
                                        <h4>{{$banner->offer}}</h4>
                                        <h2>{{$banner->item}}</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- collection banner end -->

    <!-- Product slider -->
    <div class="container ratio_square bag-product">
        <section class="section-b-space border-section border-top-0">
            <div class="row">
                <div class="col">
                    <div class="title2">
                        <h4>trend</h4>
                        <h2 class="title-inner2">TOP COLLECTION</h2>
                    </div>
                    <div class="product-4 product-m">
                        <div class="product-box product-wrap">
                            <div class="img-wrapper">
                                <div class="lable-block"><span class="lable3">new</span></div>
                                <div class="front">
                                    <a href="product-page(no-sidebar).html">
                                        <img alt="" src="assets/images/bags/7.jpg" class="img-fluid blur-up lazyload bg-img">
                                    </a>
                                </div>
                                <div class="back">
                                    <a href="product-page(no-sidebar).html">
                                        <img alt="" src="assets/images/bags/9.jpg" class="img-fluid blur-up lazyload bg-img">
                                    </a>
                                </div>
                                <div class="cart-detail">
                                    <a href="javascript:void(0)" title="Add to Wishlist">
                                        <i class="ti-heart" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View">
                                        <i class="ti-search" aria-hidden="true"></i>
                                    </a>
                                    <!--                                    <a href="compare.html" title="Compare">-->
                                    <!--                                        <i class="ti-reload" aria-hidden="true"></i>-->
                                    <!--                                    </a>-->
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                </div>
                                <a href="product-page(no-sidebar).html">
                                    <h6>Slim Fit Cotton Shirt</h6>
                                </a>
                                <h4>$600.00</h4>
                                <ul class="color-variant">
                                    <li class="bg-light0"></li>
                                    <li class="bg-light1"></li>
                                    <li class="bg-light2"></li>
                                </ul>
                                <div class="add-btn">
                                    <a href="javascript:void(0)" onclick="openCart()" class="btn btn-outline">
                                        <i class="ti-shopping-cart"></i> add to cart
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="product-box product-wrap">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="product-page(no-sidebar).html"><img alt=""
                                                                                 src="assets/images/bags/19.jpg"
                                                                                 class="img-fluid blur-up lazyload bg-img"></a>
                                </div>
                                <div class="back">
                                    <a href="product-page(no-sidebar).html"><img alt=""
                                                                                 src="assets/images/bags/20.jpg"
                                                                                 class="img-fluid blur-up lazyload bg-img"></a>
                                </div>
                                <div class="cart-detail"><a href="javascript:void(0)" title="Add to Wishlist"><i
                                            class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                                                                            data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i
                                            class="ti-search" aria-hidden="true"></i></a> <a href="compare.html"
                                                                                             title="Compare"><i class="ti-reload" aria-hidden="true"></i></a></div>
                            </div>
                            <div class="product-info">
                                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                </div>
                                <a href="product-page(no-sidebar).html">
                                    <h6>Slim Fit Cotton Shirt</h6>
                                </a>
                                <h4>$500.00 <del>$600.00</del></h4>
                                <ul class="color-variant">
                                    <li class="bg-light0"></li>
                                    <li class="bg-light1"></li>
                                    <li class="bg-light2"></li>
                                </ul>
                                <div class="add-btn">
                                    <a href="javascript:void(0)" onclick="openCart()" class="btn btn-outline">
                                        <i class="ti-shopping-cart"></i> add to cart
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="product-box product-wrap">
                            <div class="img-wrapper">
                                <div class="lable-block"><span class="lable3">new</span></div>
                                <div class="front">
                                    <a href="product-page(no-sidebar).html"><img alt=""
                                                                                 src="assets/images/bags/23.jpg"
                                                                                 class="img-fluid blur-up lazyload bg-img"></a>
                                </div>
                                <div class="back">
                                    <a href="product-page(no-sidebar).html"><img alt=""
                                                                                 src="assets/images/bags/24.jpg"
                                                                                 class="img-fluid blur-up lazyload bg-img"></a>
                                </div>
                                <div class="cart-detail"><a href="javascript:void(0)" title="Add to Wishlist"><i
                                            class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                                                                            data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i
                                            class="ti-search" aria-hidden="true"></i></a> <a href="compare.html"
                                                                                             title="Compare"><i class="ti-reload" aria-hidden="true"></i></a></div>
                            </div>
                            <div class="product-info">
                                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                </div>
                                <a href="product-page(no-sidebar).html">
                                    <h6>Slim Fit Cotton Shirt</h6>
                                </a>
                                <h4>$500.00</h4>
                                <ul class="color-variant">
                                    <li class="bg-light0"></li>
                                    <li class="bg-light1"></li>
                                    <li class="bg-light2"></li>
                                </ul>
                                <div class="add-btn">
                                    <a href="javascript:void(0)" onclick="openCart()" class="btn btn-outline">
                                        <i class="ti-shopping-cart"></i> add to cart
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="product-box product-wrap">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="product-page(no-sidebar).html"><img alt=""
                                                                                 src="assets/images/bags/1.jpg"
                                                                                 class="img-fluid blur-up lazyload bg-img"></a>
                                </div>
                                <div class="back">
                                    <a href="product-page(no-sidebar).html"><img alt=""
                                                                                 src="assets/images/bags/6.jpg"
                                                                                 class="img-fluid blur-up lazyload bg-img"></a>
                                </div>
                                <div class="cart-detail"><a href="javascript:void(0)" title="Add to Wishlist"><i
                                            class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                                                                            data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i
                                            class="ti-search" aria-hidden="true"></i></a> <a href="compare.html"
                                                                                             title="Compare"><i class="ti-reload" aria-hidden="true"></i></a></div>
                            </div>
                            <div class="product-info">
                                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                </div>
                                <a href="product-page(no-sidebar).html">
                                    <h6>Slim Fit Cotton Shirt</h6>
                                </a>
                                <h4>$500.00</h4>
                                <ul class="color-variant">
                                    <li class="bg-light0"></li>
                                    <li class="bg-light1"></li>
                                    <li class="bg-light2"></li>
                                </ul>
                                <div class="add-btn">
                                    <a href="javascript:void(0)" onclick="openCart()" class="btn btn-outline">
                                        <i class="ti-shopping-cart"></i> add to cart
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="product-box product-wrap">
                            <div class="img-wrapper">
                                <div class="lable-block"><span class="lable3">new</span></div>
                                <div class="front">
                                    <a href="product-page(no-sidebar).html"><img alt=""
                                                                                 src="assets/images/bags/23.jpg"
                                                                                 class="img-fluid blur-up lazyload bg-img"></a>
                                </div>
                                <div class="back">
                                    <a href="product-page(no-sidebar).html"><img alt=""
                                                                                 src="assets/images/bags/24.jpg"
                                                                                 class="img-fluid blur-up lazyload bg-img"></a>
                                </div>
                                <div class="cart-detail"><a href="javascript:void(0)" title="Add to Wishlist"><i
                                            class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                                                                            data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i
                                            class="ti-search" aria-hidden="true"></i></a> <a href="compare.html"
                                                                                             title="Compare"><i class="ti-reload" aria-hidden="true"></i></a></div>
                            </div>
                            <div class="product-info">
                                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                </div>
                                <a href="product-page(no-sidebar).html">
                                    <h6>Slim Fit Cotton Shirt</h6>
                                </a>
                                <h4>$500.00</h4>
                                <ul class="color-variant">
                                    <li class="bg-light0"></li>
                                    <li class="bg-light1"></li>
                                    <li class="bg-light2"></li>
                                </ul>
                                <div class="add-btn">
                                    <a href="javascript:void(0)" onclick="openCart()" class="btn btn-outline">
                                        <i class="ti-shopping-cart"></i> add to cart
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <style>
                        .left_arrow img, .right_arrow img{
                            width: 20px; display: block;
                        }
                        .left_arrow{
                            position: absolute;
                            left: -1%;
                            top: 50%; cursor: pointer; padding: 5px; border-radius: 20px;
                        }
                        .right_arrow{
                            position: absolute;
                            left: 95%; cursor: pointer; top: 50%; padding: 5px; border-radius: 20px;
                        }
                    </style>
                    <div class="left_arrow shadow-sm">
                        <a> <img src="assets/images/test/left-arrow.svg" class="left_a"> </a>
                    </div>
                    <div class="right_arrow shadow-sm">
                        <a> <img src="assets/images/test/right-arrow-angle.svg" class="right_a"> </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Product slider end -->

    <!-- category -->
    <div class="category-bg onerow-cat ratio3_2">
        <div class="container-fluid p-0">
            <div class="row order-section">
                <div class="col-sm-4 p-0">
                    <a href="#" class="">
                        <ul class="custom-slider-2">
                            <li><img alt="" src="assets/images/furniture/banner/7.jpg"
                                     class="img-fluid blur-up lazyload bg-img"></li>
                            <li><img alt="" src="assets/images/furniture/banner/6.jpg"
                                     class="img-fluid blur-up lazyload bg-img"></li>
                        </ul>
                    </a>
                </div>
                <div class="col-sm-4 p-0">
                    <div class="contain-block even">
                        <div>
                            <h6>new products</h6>
                            <a href="#">
                                <h2>zipper storage bag</h2>
                            </a><a href="#" class="btn btn-solid category-btn">-80% off</a>
                            <a href="#">
                                <h6><span>shop now</span></h6>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 p-0">
                    <a href="#" class="">
                        <ul class="custom-slider-2">
                            <li><img alt="" src="assets/images/furniture/banner/6.jpg"
                                     class="img-fluid blur-up lazyload bg-img"></li>
                            <li><img alt="" src="assets/images/furniture/banner/7.jpg"
                                     class="img-fluid blur-up lazyload bg-img"></li>
                        </ul>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- category end -->

    <!--    catalog-->
    <section>
        <div class="container">
            <div class="row text-center mb-md-5">
                <div class="col-md-3 mb-3">
                    <div class="shadow mx-5 mx-md-auto" style="height: 105px;">
                        <div class="card-body">
                            <h5 class="card-title">BHAVANA</h5>
                            <p class="card-text">Designer and managing partner.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="shadow mx-5 mx-md-auto" style="height: 105px;">
                        <div class="card-body">
                            <h5 class="card-title">SINCE 2016</h5>
                            <p class="card-text">Established PAN India base for sourcing and development of indian products.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="shadow mx-5 mx-md-auto" style="height: 105px;">
                        <div class="card-body">
                            <h5 class="card-title">MADE IN INDIA</h5>
                            <p class="card-text">Have strong base of certified production unit in every product category within India.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="shadow mx-5 mx-md-auto" style="height: 105px;">
                        <div class="card-body">
                            <h5 class="card-title">INNOVATION</h5>
                            <p class="card-text">We Design customize sourcing solution.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--    About us-->
    <div class="category-bg onerow-cat">
        <div class="p-5 text-center row bg-white">
            <div class="col-md-3">
                <img src="assets/images/test/profile.jpeg" alt="profile" style="width: 92%; height: 90%;" class=" shadow-lg">
            </div>

            <div class="col-md-9">
                <h3 class="border-bottom border-dark mx-auto pb-2 mb-3" style="width: 140px;">KNOW US</h3>
                <p class="h5 text-dark" style="text-align: justify;">
                    <b>'BHAVANA'</b> is the name of the brand as well as the name of the designer &amp; founder of the company
                    <b>HOUSE OF BHAVANA</b>. This brand came into existence when a freshly graduated girl saw a dream of
                    making it on her own. I have pursued Bachelor's degree in <b>Fashion Leather Goods and Accessories
                        Design</b> from FDDI- Noida.
                    <br><br>
                    Since childhood, I have been keen on arts and crafts &amp; sports activities so being creative and playing
                    around with things have always been a part of me. This brand is presented as a reflection of what I think
                    or how things can be enhanced in mundane life and the outcome I keep in front of the world.
                    <br><br>
                    Since we all know Leather is a very exquisite and elite material and is used by a niche class of people. It
                    has its natural beauty i.e., textures, oils, types etc. Leather is popular for its product quality, range,
                    versatility etc. and when all of these are combined with impeccable and finesse craftsmanship make us
                    drool over the product.
                </p>
            </div>

            <div class="col-md-12">

                <p class="h5 text-dark" style="text-align: justify;">The upsetting part is that finding genuine leather items are difficult because the market is flooded with
                    items made of artificial leather. To let you overcome this situation, here the brand <b>'BHAVANA'</b> comes in
                    handy. Our products are designed and made out of 100% genuine leather(natural). Our leather is from
                    established ventures that are environmentally viable. The ones who are interested in buying genuine
                    leather articles can put their trust in us even if they&#39;ve little knowledge of leather. <br> <br>

                    Our Products are designed and produced in house with an element of fun into it along with
                    functionality, elegance and simplicity. Our philosophy of creating products with functionality, maximum
                    utilization and user friendly while keeping ongoing trends as our priority. We source all leather &amp;
                    metalware items that are available in India which proudly make us fall into the &quot;Made in India&quot; category.
                    Even the smallest article is curated with the utmost sincerity and dedication to deliver value for the
                    money spent.
                </p>

            </div>
        </div>
    </div>

    <!-- slider and product -->

    <!-- slider and product -->


    <!-- service section start -->
    <div class="container section-t-space">
        <section class="service border-section small-section ">
            <div class="row">
                <div class="col-md-4 service-block">
                    <div class="media">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -117 679.99892 679">
                            <path
                                d="m12.347656 378.382812h37.390625c4.371094 37.714844 36.316407 66.164063 74.277344 66.164063 37.96875 0 69.90625-28.449219 74.28125-66.164063h241.789063c4.382812 37.714844 36.316406 66.164063 74.277343 66.164063 37.96875 0 69.902344-28.449219 74.285157-66.164063h78.890624c6.882813 0 12.460938-5.578124 12.460938-12.460937v-352.957031c0-6.882813-5.578125-12.464844-12.460938-12.464844h-432.476562c-6.875 0-12.457031 5.582031-12.457031 12.464844v69.914062h-105.570313c-4.074218.011719-7.890625 2.007813-10.21875 5.363282l-68.171875 97.582031-26.667969 37.390625-9.722656 13.835937c-1.457031 2.082031-2.2421872 4.558594-2.24999975 7.101563v121.398437c-.09765625 3.34375 1.15624975 6.589844 3.47656275 9.003907 2.320312 2.417968 5.519531 3.796874 8.867187 3.828124zm111.417969 37.386719c-27.527344 0-49.851563-22.320312-49.851563-49.847656 0-27.535156 22.324219-49.855469 49.851563-49.855469 27.535156 0 49.855469 22.320313 49.855469 49.855469 0 27.632813-22.21875 50.132813-49.855469 50.472656zm390.347656 0c-27.53125 0-49.855469-22.320312-49.855469-49.847656 0-27.535156 22.324219-49.855469 49.855469-49.855469 27.539063 0 49.855469 22.320313 49.855469 49.855469.003906 27.632813-22.21875 50.132813-49.855469 50.472656zm140.710938-390.34375v223.34375h-338.375c-6.882813 0-12.464844 5.578125-12.464844 12.460938 0 6.882812 5.582031 12.464843 12.464844 12.464843h338.375v79.761719h-66.421875c-4.382813-37.710937-36.320313-66.15625-74.289063-66.15625-37.960937 0-69.898437 28.445313-74.277343 66.15625h-192.308594v-271.324219h89.980468c6.882813 0 12.464844-5.582031 12.464844-12.464843 0-6.882813-5.582031-12.464844-12.464844-12.464844h-89.980468v-31.777344zm-531.304688 82.382813h99.703125v245.648437h-24.925781c-4.375-37.710937-36.3125-66.15625-74.28125-66.15625-37.960937 0-69.90625 28.445313-74.277344 66.15625h-24.929687v-105.316406l3.738281-5.359375h152.054687c6.882813 0 12.460938-5.574219 12.460938-12.457031v-92.226563c0-6.882812-5.578125-12.464844-12.460938-12.464844h-69.796874zm-30.160156 43h74.777344v67.296875h-122.265625zm0 0"
                                fill="#ff4c3b"></path>
                        </svg>
                        <div class="media-body">
                            <h4>free shipping</h4>
                            <p>free shipping world wide</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 service-block">
                    <div class="media">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                             id="Capa_1" x="0px" y="0px" viewBox="0 0 480 480" style="enable-background:new 0 0 480 480;"
                             xml:space="preserve" width="512px" height="512px">
                            <g>
                                <g>
                                    <g>
                                        <path
                                            d="M472,432h-24V280c-0.003-4.418-3.588-7.997-8.006-7.994c-2.607,0.002-5.05,1.274-6.546,3.41l-112,160     c-2.532,3.621-1.649,8.609,1.972,11.14c1.343,0.939,2.941,1.443,4.58,1.444h104v24c0,4.418,3.582,8,8,8s8-3.582,8-8v-24h24     c4.418,0,8-3.582,8-8S476.418,432,472,432z M432,432h-88.64L432,305.376V432z"
                                            fill="#ff4c3b"></path>
                                        <path
                                            d="M328,464h-94.712l88.056-103.688c0.2-0.238,0.387-0.486,0.56-0.744c16.566-24.518,11.048-57.713-12.56-75.552     c-28.705-20.625-68.695-14.074-89.319,14.631C212.204,309.532,207.998,322.597,208,336c0,4.418,3.582,8,8,8s8-3.582,8-8     c-0.003-26.51,21.486-48.002,47.995-48.005c10.048-0.001,19.843,3.151,28.005,9.013c16.537,12.671,20.388,36.007,8.8,53.32     l-98.896,116.496c-2.859,3.369-2.445,8.417,0.924,11.276c1.445,1.226,3.277,1.899,5.172,1.9h112c4.418,0,8-3.582,8-8     S332.418,464,328,464z"
                                            fill="#ff4c3b"></path>
                                        <path
                                            d="M216.176,424.152c0.167-4.415-3.278-8.129-7.693-8.296c-0.001,0-0.002,0-0.003,0     C104.11,411.982,20.341,328.363,16.28,224H48c4.418,0,8-3.582,8-8s-3.582-8-8-8H16.28C20.283,103.821,103.82,20.287,208,16.288     V40c0,4.418,3.582,8,8,8s8-3.582,8-8V16.288c102.754,3.974,185.686,85.34,191.616,188l-31.2-31.2     c-3.178-3.07-8.242-2.982-11.312,0.196c-2.994,3.1-2.994,8.015,0,11.116l44.656,44.656c0.841,1.018,1.925,1.807,3.152,2.296     c0.313,0.094,0.631,0.172,0.952,0.232c0.549,0.198,1.117,0.335,1.696,0.408c0.08,0,0.152,0,0.232,0c0.08,0,0.152,0,0.224,0     c0.609-0.046,1.211-0.164,1.792-0.352c0.329-0.04,0.655-0.101,0.976-0.184c1.083-0.385,2.069-1.002,2.888-1.808l45.264-45.248     c3.069-3.178,2.982-8.242-0.196-11.312c-3.1-2.994-8.015-2.994-11.116,0l-31.976,31.952     C425.933,90.37,331.38,0.281,216.568,0.112C216.368,0.104,216.2,0,216,0s-0.368,0.104-0.568,0.112     C96.582,0.275,0.275,96.582,0.112,215.432C0.112,215.632,0,215.8,0,216s0.104,0.368,0.112,0.568     c0.199,115.917,91.939,210.97,207.776,215.28h0.296C212.483,431.847,216.013,428.448,216.176,424.152z"
                                            fill="#ff4c3b"></path>
                                        <path
                                            d="M323.48,108.52c-3.124-3.123-8.188-3.123-11.312,0L226.2,194.48c-6.495-2.896-13.914-2.896-20.408,0l-40.704-40.704     c-3.178-3.069-8.243-2.981-11.312,0.197c-2.994,3.1-2.994,8.015,0,11.115l40.624,40.624c-5.704,11.94-0.648,26.244,11.293,31.947     c9.165,4.378,20.095,2.501,27.275-4.683c7.219-7.158,9.078-18.118,4.624-27.256l85.888-85.888     C326.603,116.708,326.603,111.644,323.48,108.52z M221.658,221.654c-0.001,0.001-0.001,0.001-0.002,0.002     c-3.164,3.025-8.148,3.025-11.312,0c-3.125-3.124-3.125-8.189-0.002-11.314c3.124-3.125,8.189-3.125,11.314-0.002     C224.781,213.464,224.781,218.53,221.658,221.654z"
                                            fill="#ff4c3b"></path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <div class="media-body">
                            <h4>24 X 7 service</h4>
                            <p>online service for new customer</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 service-block">
                    <div class="media">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                             id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512"
                             style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512px"
                             height="512px">
                            <g>
                                <g>
                                    <g>
                                        <path
                                            d="M498.409,175.706L336.283,13.582c-8.752-8.751-20.423-13.571-32.865-13.571c-12.441,0-24.113,4.818-32.865,13.569     L13.571,270.563C4.82,279.315,0,290.985,0,303.427c0,12.442,4.82,24.114,13.571,32.864l19.992,19.992     c0.002,0.001,0.003,0.003,0.005,0.005c0.002,0.002,0.004,0.004,0.006,0.006l134.36,134.36H149.33     c-5.89,0-10.666,4.775-10.666,10.666c0,5.89,4.776,10.666,10.666,10.666h59.189c0.014,0,0.027,0.001,0.041,0.001     s0.027-0.001,0.041-0.001l154.053,0.002c5.89,0,10.666-4.776,10.666-10.666c0-5.891-4.776-10.666-10.666-10.666l-113.464-0.002     L498.41,241.434C516.53,223.312,516.53,193.826,498.409,175.706z M483.325,226.35L226.341,483.334     c-4.713,4.712-11.013,7.31-17.742,7.32h-0.081c-6.727-0.011-13.025-2.608-17.736-7.32L56.195,348.746L302.99,101.949     c4.165-4.165,4.165-10.919,0-15.084c-4.166-4.165-10.918-4.165-15.085,0.001L41.11,333.663l-12.456-12.456     c-4.721-4.721-7.321-11.035-7.321-17.779c0-6.744,2.6-13.059,7.322-17.781L285.637,28.665c4.722-4.721,11.037-7.321,17.781-7.321     c6.744,0,13.059,2.6,17.781,7.322l57.703,57.702l-246.798,246.8c-4.165,4.164-4.165,10.918,0,15.085     c2.083,2.082,4.813,3.123,7.542,3.123c2.729,0,5.459-1.042,7.542-3.124l246.798-246.799l89.339,89.336     C493.128,200.593,493.127,216.546,483.325,226.35z"
                                            fill="#ff4c3b"></path>
                                        <path
                                            d="M262.801,308.064c-4.165-4.165-10.917-4.164-15.085,0l-83.934,83.933c-4.165,4.165-4.165,10.918,0,15.085     c2.083,2.083,4.813,3.124,7.542,3.124c2.729,0,5.459-1.042,7.542-3.124l83.934-83.933     C266.966,318.982,266.966,312.229,262.801,308.064z"
                                            fill="#ff4c3b"></path>
                                        <path
                                            d="M228.375,387.741l-34.425,34.425c-4.165,4.165-4.165,10.919,0,15.085c2.083,2.082,4.813,3.124,7.542,3.124     c2.731,0,5.459-1.042,7.542-3.124l34.425-34.425c4.165-4.165,4.165-10.919,0-15.085     C239.294,383.575,232.543,383.575,228.375,387.741z"
                                            fill="#ff4c3b"></path>
                                        <path
                                            d="M260.054,356.065l-4.525,4.524c-4.166,4.165-4.166,10.918-0.001,15.085c2.082,2.083,4.813,3.125,7.542,3.125     c2.729,0,5.459-1.042,7.541-3.125l4.525-4.524c4.166-4.165,4.166-10.918,0.001-15.084     C270.974,351.901,264.219,351.9,260.054,356.065z"
                                            fill="#ff4c3b"></path>
                                        <path
                                            d="M407.073,163.793c-2-2-4.713-3.124-7.542-3.124c-2.829,0-5.541,1.124-7.542,3.124l-45.255,45.254     c-2,2.001-3.124,4.713-3.124,7.542s1.124,5.542,3.124,7.542l30.17,30.167c2.083,2.083,4.813,3.124,7.542,3.124     c2.731,0,5.459-1.042,7.542-3.124l45.253-45.252c4.165-4.165,4.165-10.919,0-15.084L407.073,163.793z M384.445,231.673     l-15.085-15.084l30.17-30.169l15.084,15.085L384.445,231.673z"
                                            fill="#ff4c3b"></path>
                                        <path
                                            d="M320.339,80.186c2.731,0,5.461-1.042,7.543-3.126l4.525-4.527c4.164-4.166,4.163-10.92-0.003-15.084     c-4.165-4.164-10.92-4.163-15.084,0.003l-4.525,4.527c-4.164,4.166-4.163,10.92,0.003,15.084     C314.881,79.146,317.609,80.186,320.339,80.186z"
                                            fill="#ff4c3b"></path>
                                        <path
                                            d="M107.215,358.057l-4.525,4.525c-4.165,4.164-4.165,10.918,0,15.085c2.083,2.082,4.813,3.123,7.542,3.123     s5.459-1.041,7.542-3.123l4.525-4.525c4.165-4.166,4.165-10.92,0-15.085C118.133,353.891,111.381,353.891,107.215,358.057z"
                                            fill="#ff4c3b"></path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <div class="media-body">
                            <h4>online payment</h4>
                            <p>new online special festival offer</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- service section end -->


    <!-- blog section -->
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="title1  section-t-space">
                    <h4>Recent Story</h4>
                    <h2 class="title-inner1">from the blog</h2>
                </div>
            </div>
        </div>
    </div>
    <section class="blog pt-0 section-b-space gym-blog ratio2_3 slick-default-margin">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="slide-3 no-arrow">
                        <div class="col-md-12">
                            <a href="#">
                                <div class="basic-effect">
                                    <div>
                                        <img src="assets/images/furniture/blog/1.jpg"
                                             class="img-fluid blur-up lazyload bg-img" alt="">
                                        <span></span>
                                    </div>
                                </div>
                            </a>
                            <div class="blog-details">
                                <h4>25 January 2018</h4>
                                <a href="#">
                                    <p>Lorem ipsum dolor sit consectetur adipiscing elit, </p>
                                </a>
                                <h6>by: John Dio , 2 Comment</h6>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <a href="#">
                                <div class="basic-effect">
                                    <div>
                                        <img src="assets/images/furniture/blog/2.jpg"
                                             class="img-fluid blur-up lazyload bg-img" alt="">
                                        <span></span>
                                    </div>
                                </div>
                            </a>
                            <div class="blog-details">
                                <h4>25 January 2018</h4>
                                <a href="#">
                                    <p>Lorem ipsum dolor sit consectetur adipiscing elit, </p>
                                </a>
                                <h6>by: John Dio , 2 Comment</h6>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <a href="#">
                                <div class="basic-effect">
                                    <div>
                                        <img src="assets/images/furniture/blog/3.jpg"
                                             class="img-fluid blur-up lazyload bg-img" alt="">
                                        <span></span>
                                    </div>
                                </div>
                            </a>
                            <div class="blog-details">
                                <h4>25 January 2018</h4>
                                <a href="#">
                                    <p>Lorem ipsum dolor sit consectetur adipiscing elit, </p>
                                </a>
                                <h6>by: John Dio , 2 Comment</h6>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <a href="#">
                                <div class="basic-effect">
                                    <div>
                                        <img src="assets/images/furniture/blog/4.jpg"
                                             class="img-fluid blur-up lazyload bg-img" alt="">
                                        <span></span>
                                    </div>
                                </div>
                            </a>
                            <div class="blog-details">
                                <h4>25 January 2018</h4>
                                <a href="#">
                                    <p>Lorem ipsum dolor sit consectetur adipiscing elit, </p>
                                </a>
                                <h6>by: John Dio , 2 Comment</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog section end -->

</div>
