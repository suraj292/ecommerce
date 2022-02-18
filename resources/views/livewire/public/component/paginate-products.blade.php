<div class="row margin-res">
    @foreach($products as $product)
        {{--                                                    @if($product->product != null)--}}
        <div class="col-xl-3 col-6 col-grid-box">
            <div class="product-box">
                @if($product->italian == true)
                    <span style="color: whitesmoke; background-image: linear-gradient(to right, red , #ff6767);
                                                        padding: 1px 7px 1px 7px; border-radius: 1px 5px 0px 0px;"
                    >Italian Leather</span>
                @else
                    <br>
                @endif
                <div class="img-wrapper">
                    <div class="lable-block">
                        @if($product->created_at < now()->subDays(30)->toDateTimeString())
                            <span class="lable3">new</span>
                        @endif
                        @if($product->sale == true)
                            <span class="lable4">on sale</span>
                        @endif
                    </div>
                    <div class="front">
                        <a href="{{ route('product_details', Str::slug($product->title)) }}">
                            <img src="{{ asset('storage/product/small/'.explode(',', $product->product_color_img->images)[0]) }}"
                                 class="img-fluid blur-up lazyload bg-img" alt="">
{{--                            <img src="{{ asset('storage/product/'.explode(',', $product->product_color_img->images)[0]) }}"--}}
{{--                                 class="img-fluid blur-up lazyload bg-img" alt="">--}}
                        </a>
                    </div>
                    <div class="back">
                        <a href="{{ route('product_details', Str::slug($product->title)) }}">
                            <img src="{{ asset('storage/product/small/'.explode(',', $product->product_color_img->images)[1]) }}"
                                 class="img-fluid blur-up lazyload bg-img" alt="">
                        </a>
                    </div>
                    {{--@endif--}}
                    <div class="cart-info cart-wrap">
                        <button data-bs-target="#addtocart" title="Add to cart" wire:click="addToCart({{ $product->product_id }})">
                            <i class="ti-shopping-cart"></i>
                        </button>
                        <a href="javascript:void(0)" title="Add to Wishlist" wire:click="addToWishlist({{ $product->product_id }})">
                            <i class="ti-heart" aria-hidden="true"></i>
                        </a>
{{--                        <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View">--}}
{{--                            <i class="ti-search" aria-hidden="true"></i>--}}
{{--                        </a>--}}
{{--                        <a href="compare.html" title="Compare">--}}
{{--                            <i class="ti-reload" aria-hidden="true"></i>--}}
{{--                        </a>--}}
                    </div>
                </div>
                <div class="product-detail">
                    <div>
                        {{-- Ratings
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>--}}
                        <a href="{{ route('product_details', Str::slug($product->title)) }}">
                            <h6>{{ $product->title }}</h6>
                        </a>

                        <h4>
                            @if($product->offer_price)
                                &#x20b9; {{$product->offer_price}}
                                <del style="color: orangered;">&#x20b9; {{$product->price}}</del>
                            @else
                                &#x20b9; {{$product->price}}
                            @endif
                        </h4>

                        <!--  Product Color  -->{{--
                            <ul class="color-variant">
                                @foreach($product->product_all_img as $colors)
                                <li style="background-image: url({{ asset('storage/color_image/'.$colors->product_color) }});"></li>
                                @endforeach
                            </ul>--}}

                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!--  PAGINATION  -->
        {{ $products->links('partial.public.pagination') }}
{{--        {{ $products->links() }}--}}

</div>
