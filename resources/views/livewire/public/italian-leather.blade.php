<div>
    <div class="hidden-hight-div"></div>
    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>collection</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">home /</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Italian Leather</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- section start -->
    <section class="section-b-space ratio_asos">
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="collection-content col">
                        <div class="page-main-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- Top banner wrapper -->
                                    <div class="top-banner-wrapper">
                                        <a href="#"><img src="{{asset('assets/images/mega-menu/2.jpg')}}" class="img-fluid blur-up lazyload" alt=""></a>
                                        <div class="top-banner-content small-section">
                                            <h4>BIGGEST DEALS ON TOP BRANDS</h4>
                                            <p>The trick to choosing the best wear for yourself is to keep in mind your
                                                body type, individual style, occasion and also the time of day or
                                                weather.
                                                In addition to eye-catching products from top brands, we also offer an
                                                easy 30-day return and exchange policy, free and fast shipping across
                                                all pin codes, cash or card on delivery option, deals and discounts,
                                                among other perks. So, sign up now and shop for westarn wear to your
                                                heart’s content on Multikart. </p>
                                        </div>
                                    </div>
                                    <!-- End Top banner wrapper -->

                                    <!-- Start Content -->
                                    <div class="collection-product-wrapper">
                                        <!-- Product Filters -->
                                        <div class="container">
                                            <div class="row">
                                                <!-- <div class="col-12"> -->
                                                <div class="col-sm-12 col-md-10 mb-2">
{{--                                                    @if($sub_categories->count() > 0)--}}
{{--                                                        <ul class="list-group list-group-horizontal-md text-center">--}}
{{--                                                            @foreach($sub_categories as $subCategory)--}}
{{--                                                                <li class="list-group-item mlm" wire:click="filterBySubCategory({{ $subCategory->id }})">--}}
{{--                                                                    {{ $subCategory->sub_category }}--}}
{{--                                                                </li>--}}
{{--                                                            @endforeach--}}
{{--                                                        </ul>--}}
{{--                                                    @endif--}}
                                                </div>
                                                <div class="col-sm-12 col-md-2">
                                                    <select class="list-group btn btn-light mx-auto py-2 px-3 border" wire:model="selectFilter">
                                                        <option value="relevant">Relevant</option>
                                                        <option value="ASC">Price: High to Low</option>
                                                        <option value="DESC">Price: Low to High</option>
                                                    </select>
                                                </div>
                                                <!-- </div> -->
                                            </div>
                                        </div>
                                        <!-- Products -->
                                        <div class="product-wrapper-grid">
                                            <div class="row margin-res" wire:ignore>
                                                {{--for-each start--}}
                                                @foreach($products as $product)
                                                <div class="col-xl-3 col-6 col-grid-box">
                                                    <div class="product-box">
                                                        <br>
                                                        <div class="img-wrapper">
                                                            @if($product->sale)
                                                                <div class="lable-block">
                                                                    <span class="lable4">on sale</span>
                                                                </div>
                                                            @endif
                                                            <div class="front">
                                                                <a href="{{ route('product_details', \Illuminate\Support\Str::slug($product->title)) }}" class="bg-size blur-up lazyloaded" style="background-image: url(&quot;http://127.0.0.1:8000/storage/product/small/55TqmSLo30tSu7Ez07PZ1T0TbP4q1d8jxxyg2c5X.jpg&quot;); background-size: cover; background-position: center center; display: block;">
                                                                    <img src="{{ asset('storage/product/small/'.explode(',', $product->product_color_img->images)[0]) }}" class="img-fluid blur-up lazyload bg-img" alt="" style="display: none;">
                                                                </a>
                                                            </div>
                                                            <div class="back">
                                                                <a href="{{ route('product_details', \Illuminate\Support\Str::slug($product->title)) }}" class="bg-size blur-up lazyloaded" style="background-image: url(&quot;http://127.0.0.1:8000/storage/product/small/EddGyO9ekV1XTRAaVJkoUklYf0vZhB3rtD2k4r13.jpg&quot;); background-size: cover; background-position: center center; display: block;">
                                                                    <img src="{{ asset('storage/product/small/'.explode(',', $product->product_color_img->images)[1]) }}" class="img-fluid blur-up lazyload bg-img" alt="" style="display: none;">
                                                                </a>
                                                            </div>

                                                            <div class="cart-info cart-wrap">
                                                                <button data-bs-target="#addtocart" title="Add to cart" wire:click="addToCart({{ $product->id }})">
                                                                    <i class="ti-shopping-cart"></i>
                                                                </button>
                                                                <a href="javascript:void(0)" title="Add to Wishlist" wire:click="addToWishlist({{ $product->id }})">
                                                                    <i class="ti-heart" aria-hidden="true"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="product-detail">
                                                            <div>

                                                                <a href="http://127.0.0.1:8000/product/tempor-aut-vero-dolo">
                                                                    <h6>{{ $product->title }}</h6>
                                                                </a>

                                                                <h4>
                                                                    @if($product->offer_price)
                                                                        ₹ {{ $product->offer_price }}
                                                                        <del style="color: orangered;">₹ {{ $product->price }}</del>
                                                                    @else
                                                                        ₹ {{ $product->price }}
                                                                    @endif
                                                                </h4>

                                                                <!--  Product Color  -->

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                {{--for-each end--}}
                                            </div>
                                        </div>

                                        <!--  PAGINATION  -->
                                        <div class="product-pagination">
                                            <div class="theme-paggination-block">
                                                <div class="container-fluid p-0">
                                                    <div class="row">
                                                        <div class="col-xl-6 col-md-6 col-sm-12">
                                                            <nav aria-label="Page navigation">
                                                                <ul class="pagination">
                                                                    <li class="page-item"><a class="page-link" href="#"
                                                                                             aria-label="Previous"><span
                                                                                aria-hidden="true"><i
                                                                                    class="fa fa-chevron-left"
                                                                                    aria-hidden="true"></i></span> <span
                                                                                class="sr-only">Previous</span></a></li>
                                                                    <li class="page-item active"><a class="page-link"
                                                                                                    href="#">1</a></li>
                                                                    <li class="page-item"><a class="page-link"
                                                                                             href="#">2</a></li>
                                                                    <li class="page-item"><a class="page-link"
                                                                                             href="#">3</a></li>
                                                                    <li class="page-item">
                                                                        <a class="page-link" href="#" aria-label="Next">
                                                                            <span aria-hidden="true"></span>
                                                                            <span class="sr-only">Next <i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </nav>
                                                        </div>
                                                        <div class="col-xl-6 col-md-6 col-sm-12">
                                                            <div class="product-search-count-bottom">
                                                                <h5>Showing Products 1-24 of 10 Result</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
