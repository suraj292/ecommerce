
<div>
    <!-- Banner -->
    <section class="pt-0" wire:ignore>
        <div class="container-lg container ">
            <div class="full-banner custom-space p-right text-end">
                <img src="../assets/images/fashion/bottom-banner.jpg" alt="" class="bg-img lazyload">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-11">
                            <div class="banner-contain custom-size">
                                <h2>2018</h2>
                                <h3>fashion trends</h3>
                                <h4>special offer</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container" style="margin-bottom: 200px;">
        <!-- Sub-Category -->
        <div class="category-button">
            <section class="section-b-space border-section border-bottom-0">
                <div class="row partition1">
                    @foreach($sub_categories as $subCategory)
                        <div class="col-md-2 col-sm-6"><a
                                href="{{ route('products', ['category'=>str_replace('-', ' ', request('category')), 'filter'=>str_replace(' ', '-', $subCategory->sub_category)]) }}"
                                                          class="btn btn-outline">
                                {{ $subCategory->sub_category }}</a>
                        </div>
                    @endforeach
{{--                        <div class="col-md-2 col-sm-6">--}}
{{--                            <a href="#" class="btn btn-outline me-3">outline</a>--}}
{{--                        </div>--}}
{{--                    <div class="col-md-2 col-sm-6"><a href="#" class="btn btn-outline btn-block">burn bag</a></div>--}}
                </div>
            </section>
        </div>
        <!-- Products -->
        <div class="row">
            <!-- Product one -->
            @forelse($products as $product)
                <div class="col-md-3 col-sm-6">
                    <div class="tools-grey border-box ratio_square">
                        <div class="product-box product-wrap">
                            <div class="img-wrapper">
                                @if($product->details->sale)
                                    <div class="ribbon">
                                        <span>sale</span>
                                    </div>
                                @endif
                                    <div class="lable-block">
                                        <span class="lable4">new</span>
                                    </div>
                                <div class="front">
                                    <a href="{{ route('product_details', str_replace(' ', '-', $product->details->title)) }}">
                                        <img alt="" src="{{ asset('storage/product/small/'.explode(',', $product->details->product_all_img[0]->images)[0]) }}" class="img-fluid blur-up lazyload bg-img" width="100%">
                                    </a>
                                </div>
                                <div class="cart-info cart-wrap">
                                    <a href="javascript:void(0)" title="Add to Wishlist">
                                        <i class="fa fa-heart" aria-hidden="true"></i>
                                    </a>
                                    <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Buy now" wire:click="buyNow({{ $product->id }})">
                                        <i class="ti-shopping-cart"></i> Buy
                                    </button>
                                    <a title="Add to Cart" id="cartEffect" class="add-to-cart" wire:click="addToCart({{ $product->id }})">
                                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                    </a>
                                    <a class="mobile-quick-view" href="#" data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View">
                                        <i class="ti-search" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="quick-view-part">
                                    <a href="{{ route('product_details', str_replace(' ', '-', $product->details->title)) }}" title="Quick View" style="color: whitesmoke;">
                                        View Detail
                                    </a>
                                </div>
                            </div>
                            <div class="product-info pt-3">
                                <a href="{{ route('product_details', str_replace(' ', '-', $product->details->title)) }}">
                                    <h6>{{ $product->details->title }}</h6>
                                </a>
                                @if(is_null($product->details->offer_price))
                                    <h4>₹{{ $product->details->price }}</h4>
                                @else
                                    <h4>
                                        ₹{{ $product->details->offer_price }}
                                        <del style="color: orangered;">₹{{ $product->details->price }}</del>
                                    </h4>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="w-100 text-center p-5">
                    <h3>No Product added to this category</h3>
                </div>
            @endforelse
        </div>
    </div>
</div>
@section('script')
@endsection
@section('style')
@endsection
