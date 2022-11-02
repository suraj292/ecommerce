<div>
{{--    <div class="hidden-hight-div"></div>--}}
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
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">collection</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- section start -->
    <section>
        <div class="collection-wrapper">
            <div class="container pt-5"  style="background-color: white;">
                <div class="row col-md-12">
                    <div class="col-lg-5 mx-auto" wire:ignore>
                        <div class="col-lg-12" id="zoomImage"></div>
                        <div class="col-lg-12 d-flex justify-content-center" id="thumb-image"></div>
                    </div>

                    <div class="col-lg-5 accordion-body mx-auto">
                        <div class="product-right product-description-box" id="test1">
                            <h2>{{ $product->title }}</h2>
                            <h4>
                                @if($product->offer_price)
                                    &#x20b9; {{$product->offer_price}}
                                    <del style="color: orangered;">&#x20b9; {{$product->price}}</del>
                                @else
                                    &#x20b9; {{$product->price}}
                                @endif
                            </h4>
                            <div class="accordion" id="accordionExample">

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Available Colors
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body" wire:ignore>
                                            <ul id="colorChange">
                                                @foreach( $color as $index => $productColor )
                                                <li role="button" wire:click="getProductColor({{ $index }})" id="getColor_0{{ $index }}">
                                                    <img src="{{ asset('storage/color_image/'.$productColor->getColor->color_image ) }}" alt="color" width="40px" class="rounded">
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed p-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            PRODUCT DESCRIPTION
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            {{ $product->description }}
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed p-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            DIMENSION
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            {{ $product->dimension }}
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button collapsed p-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                                            CARE INSTRUCTIONS
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            {{ $product->care_instruction }}
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFive">
                                        <button class="accordion-button collapsed p-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                                            SPECIFICATIONS
                                        </button>
                                    </h2>

                                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <ul class="list-group">
                                                @foreach(explode(',', $product->specification) as $specification)
                                                <li class="bullet-line-list">{{ $specification }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="qty-box mt-3">
                                <div class="row col-12">
                                    <div class="col-2">
                                        <span class="fs-6">Quantity:</span>
                                    </div>
                                    <div class="col-10">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <button type="button" class="btn" wire:click="decrement">
                                                    <i class="ti-angle-left"></i>
                                                </button>
                                            </span>
                                                <input type="text" class="form-control" wire:model="quantity">
                                            <span class="input-group-prepend">
                                                <button type="button" class="btn" wire:click="increment">
                                                    <i class="ti-angle-right"></i>
                                                </button>
                                            </span>
                                        </div>
                                        @if(session()->has('less_stock'))
                                        <span class="text-danger">{{ session('less_stock') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="product-buttons mt-3">
                                <a id="cartEffect" class="add-to-cart btn btn-solid hover-solid btn-animation" wire:click="addToCart({{ $product->product_id }})">add to cart</a>
                                <a wire:click="buyNow({{ $product->product_id }})" class="btn btn-solid">buy now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->

    <!-- product-tab starts / Reviews or comment -->

    <!-- product-tab ends -->

    <!-- product section start / related product -->
    <section class="section-b-space ratio_asos">
        <div class="container">
            <div class="row">
                <div class="col-12 product-related">
                    <h2>related products</h2>
                </div>
            </div>
            <div class="row search-product">
                <div class="col-xl-2 col-md-4 col-6">
                    <div class="product-box">
                        <div class="img-wrapper">
                            <div class="front">
                                <a href="#"><img src="{{ asset('assets/images/pro3/33.jpg') }}"
                                                 class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            </div>
                            <div class="back">
                                <a href="#"><img src="{{ asset('assets/images/pro3/34.jpg') }}"
                                                 class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            </div>
                            <div class="cart-info cart-wrap">
                                <button data-bs-target="#addtocart" title="Add to cart">
                                    <i class="ti-shopping-cart"></i>
                                </button>
                                <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View">
                                    <i class="ti-search" aria-hidden="true"></i></a>
                                <a href="compare.html" title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="product-detail">
                            <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                    class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                            <a href="product-page(no-sidebar).html">
                                <h6>Slim Fit Cotton Shirt</h6>
                            </a>
                            <h4>$500.00</h4>
                            <ul class="color-variant">
                                <li class="bg-light0"></li>
                                <li class="bg-light1"></li>
                                <li class="bg-light2"></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product section end -->
</div>
@section('style')
<script src="{{ asset('assets/js/jquery.elevatezoom2.js') }}"></script>
{{-- also remove zoom.js --}}
{{--<script src="{{ asset('assets/js/zoom-image.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/main2.js') }}"></script>--}}
<style>
    #thumb-image img{border:2px solid white;}
    /*Change the colour*/
    .active img{border:2px solid #c1c1c1 !important;}
    /*#thumb-image > div {*/
    /*    margin: auto;*/
    /*}*/
    .accordion-button{
        box-shadow: var(--theme-deafult) !important;
        padding: 10px 10px 10px 20px !important;
    }
    .accordion-button:not(.collapsed){
        color: whitesmoke;
        background-color: var(--theme-deafult);
        box-shadow: var(--theme-deafult) !important;
    }
</style>
@endsection
@section('script')
    <script>
        //  this data will load on startup
        //  this is zoom image
        const color = @json($color);
        let images = color[0]['images'].split(',');
        const zoomImage = function (){
            return `
                <img id="zoom_01"
                     src="http://127.0.0.1:8000/storage/product/small/${images[0]}"
                     data-zoom-image="http://127.0.0.1:8000/storage/product/large/${images[0]}"
                     class="img-fluid blur-up lazyload">
            `;
        };
        $('#zoomImage').append(zoomImage());
        //  this is li images 5
        image = images.map(function (img, i) {
            return `
                <div class="col-2">
                   <a type="button"
                    data-image="http://127.0.0.1:8000/storage/product/small/${img}"
                    data-zoom-image="http://127.0.0.1:8000/storage/product/large/${img}" id="image_0${i}">
                    <img src="http://127.0.0.1:8000/storage/product/small/${img}" width="60px" alt="Product Image"/>
                    </a>
                </div>
            `;
        });
        $('#thumb-image').append(image);

        //  settings for zoom item
        $('#zoom_01').elevateZoom({
            gallery: 'thumb-image',
            galleryActiveClass: 'active',
            imageCrossfade: true,
            containLensZoom : true,
            zoomType: "lens",
            cursor: "crosshair",
            lensSize: 200,
        });

        // this data will load on color change
        $(document).ready(function () {
            const color = @json($color);
            //each 5 images stored in color
            $('#colorChange li').on('click', function (){
                // getting ID of active li
                let colorId = $(this).attr('id');
                let image = null;
                $('#thumb-image').empty();
                for (let i=0; i<=color.length; i++){
                    if (colorId === 'getColor_0'+i){
                        const images = color[i]['images'].split(',');
                        image = images.map(function (img, i) {
                            return `
                            <div class="col-2">
                               <a type="button"
                                data-image="http://127.0.0.1:8000/storage/product/small/${img}"
                                data-zoom-image="http://127.0.0.1:8000/storage/product/large/${img}" id="image_0${i}">
                                <img src="http://127.0.0.1:8000/storage/product/small/${img}" width="60px" alt="Product Image"/>
                                </a>
                            </div>
                        `;
                        });
                        $('#thumb-image').append(image);
                        // console.log(image);
                        setTimeout(function () {
                            $('#image_00').trigger('click');
                        }, 800);
                    }
                }
                $('#zoom_01').elevateZoom({
                    gallery: 'thumb-image',
                    galleryActiveClass: 'active',
                    imageCrossfade: true,
                    containLensZoom : true,
                    zoomType: "lens",
                    cursor: "crosshair",
                    lensSize: 200,
                });
            });
        });
    </script>
@endsection
