
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
                                                          class="btn btn-outline btn-block">
                                {{ $subCategory->sub_category }}</a>
                        </div>
                    @endforeach
{{--                    <div class="col-md-2 col-sm-6"><a href="#" class="btn btn-outline btn-block">burn bag</a></div>--}}
                </div>
            </section>
        </div>
        <!-- Products -->
        <div class="row" id="row">
            <!-- Product one -->
            @forelse($products as $product)
            <div class="col-sm-6 col-md-3">
                <div class="prod">
                    <div id="product-card">
                        <div id="front-side">
                            <div class="shadow"></div>
                            <img src="https://webdevtrick.com/wp-content/uploads/jordan.jpg" alt="" />
                            <div class="image_overlay"></div>
                            <a id="detailsV" href="{{ route('product_details', str_replace(' ', '-', $product->details->title)) }}">
                                View details
                            </a>
                            <div class="details">
                                <div class="details-container">
                                    <span class="price">₹{{ $product->details->offer_price == null ? $product->details->price : $product->details->offer_price }}</span>
                                    <span class="title text-capitalize" title="{{ $product->details->title }}">{{ \Illuminate\Support\Str::limit($product->details->title, 17) }}</span>
                                    <p class="text-capitalize">{{ $product->category_name.' & '.$product->sub_category_name }}</p>

                                    <div class="select-option">
                                        <strong>SIZES</strong>
                                        <span>{{ $product->details->dimension }}</span>
                                        <strong>COLORS</strong>
                                        <div class="colors">
                                            @foreach($product->details->product_all_img as $color)
{{--                                            <div><img src="{{ storage_path('/color_image/'.$color->color) }}"></div>--}}
                                            <div><img src="{{ asset('storage/color_image/'.$color->color) }}"></div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    <script>
        $(document).ready(function() {
            // show details
            $(".prod > div").hover(
                function() {
                    $(this).addClass("animate");
                    $("div.NextIMG, div.PreIMG").addClass("visible");
                },
                function() {
                    $(this).removeClass("animate");
                    $("div.NextIMG, div.PreIMG").removeClass("visible");
                }
            );

            // front flip
            $("#back-flip").click(function() {
                $("#product-card")
                    .removeClass("flip180")
                    .addClass("flip190");
                setTimeout(function() {
                    $("#product-card")
                        .removeClass("flip190")
                        .addClass("flip90");

                    $("#back-side div.shadow")
                        .css("opacity", 0)
                        .fadeTo(100, 1, function() {
                            $("#back-side, #back-side div.shadow").hide();
                            $("#front-side, #front-side div.shadow").show();
                        });
                }, 50);

                setTimeout(function() {
                    $("#product-card")
                        .removeClass("flip90")
                        .addClass("flip-10");
                    $("#front-side div.shadow")
                        .show()
                        .fadeTo(100, 0);
                    setTimeout(function() {
                        $("#front-side div.shadow").hide();
                        $("#product-card")
                            .removeClass("flip-10")
                            .css("transition", "100ms ease-out");
                        $("#cx, #cy").removeClass("s1 s2 s3");
                    }, 100);
                }, 150);
            });

            // Carousel

            var carousel = $("#carousel ul");
            var carouselSlideWidth = 335;
            var carouselWidth = 0;
            var isAnimating = false;

            // building width of casousel
            $("#carousel li").each(function() {
                carouselWidth += carouselSlideWidth;
            });
            $(carousel).css("width", carouselWidth);

            // Next Image
            $("div.NextIMG").on("click", function() {
                var currentLeft = Math.abs(parseInt($(carousel).css("left")));
                var newLeft = currentLeft + carouselSlideWidth;
                if (newLeft == carouselWidth || isAnimating === true) {
                    return;
                }
                $("#carousel ul").css({
                    left: "-" + newLeft + "px",
                    transition: "300ms ease-out"
                });
                isAnimating = true;
                setTimeout(function() {
                    isAnimating = false;
                }, 300);
            });

            // Previous Image
            $("div.PreIMG").on("click", function() {
                var currentLeft = Math.abs(parseInt($(carousel).css("left")));
                var newLeft = currentLeft - carouselSlideWidth;
                if (newLeft < 0 || isAnimating === true) {
                    return;
                }
                $("#carousel ul").css({
                    left: "-" + newLeft + "px",
                    transition: "300ms ease-out"
                });
                isAnimating = true;
                setTimeout(function() {
                    isAnimating = false;
                }, 300);
            });
        });

    </script>
@endsection
@section('style')
    <style>
        #row > div{
            margin-top: -70px;
        }
        .prod{
            position: relative;
            perspective: 800px;
            width:340px;
            height:500px;
            transform-style: preserve-3d;
            transition: transform 5s;
            /*position:absolute;*/
            top:80px;
            left:50%;
            margin-left:-167px;
        }
        #front-side, #back-side{
            width:335px;
            height:500px;
            background:#fff;
            position:absolute;
            left:-5px;
            top:-5px;
            -webkit-transition: all 100ms ease-out;
            -moz-transition: all 100ms ease-out;
            -o-transition: all 100ms ease-out;
            transition: all 100ms ease-out;
        }
        #product-card.animate #back-side, #product-card.animate #front-side{
            top:0;
            left:0;
            -webkit-transition: all 100ms ease-out;
            -moz-transition: all 100ms ease-out;
            -o-transition: all 100ms ease-out;
            transition: all 100ms ease-out;
        }
        #product-card{
            width:325px;
            height:490px;
            position:absolute;
            top:10px;
            left:10px;
            overflow:hidden;
            transform-style: preserve-3d;
            -webkit-transition:  100ms ease-out;
            -moz-transition:  100ms ease-out;
            -o-transition:  100ms ease-out;
            transition:  100ms ease-out;
        }
        div#product-card.flip-10{
            -webkit-transform: rotateY( -10deg );
            -moz-transform: rotateY( -10deg );
            -o-transform: rotateY( -10deg );
            transform: rotateY( -10deg );
            transition:  50ms ease-out;
        }
        div#product-card.flip90{
            -webkit-transform: rotateY( 90deg );
            -moz-transform: rotateY( 90deg );
            -o-transform: rotateY( 90deg );
            transform: rotateY( 90deg );
            transition:  100ms ease-in;
        }
        div#product-card.flip190{
            -webkit-transform: rotateY( 190deg );
            -moz-transform: rotateY( 190deg );
            -o-transform: rotateY( 190deg );
            transform: rotateY( 190deg );
            transition:  100ms ease-out;
        }
        div#product-card.flip180{
            -webkit-transform: rotateY( 180deg );
            -moz-transform: rotateY( 180deg );
            -o-transform: rotateY( 180deg );
            transform: rotateY( 180deg );
            transition:  150ms ease-out;
        }
        #product-card.animate{
            top:5px;
            left:5px;
            width:335px;
            height:500px;
            box-shadow:0px 13px 21px -5px rgba(0, 0, 0, 0.3);
            -webkit-transition:  100ms ease-out;
            -moz-transition:  100ms ease-out;
            -o-transition:  100ms ease-out;
            transition:  100ms ease-out;
        }
        .details-container{
            background:#fff;
            position:absolute;
            top:386px;
            left:0;
            width:100%;
            height:300px;
            padding:27px 35px 35px;
            -webkit-transition: all 200ms ease-out;
            -moz-transition: all 200ms ease-out;
            -o-transition: all 200ms ease-out;
            transition: all 200ms ease-out;
        }
        #product-card.animate .details-container{
            top:272px;
            -webkit-transition: all 200ms ease-out;
            -moz-transition: all 200ms ease-out;
            -o-transition: all 200ms ease-out;
            transition: all 200ms ease-out;
        }
        .details-container .title{
            font-size:22px;
            color:#393c45;
        }
        .details-container p{
            font-size:16px;
            color:#b1b1b3;
            padding:2px 0 20px 0;
        }
        .details-container .price{
            float:right;
            color:#ff5757;
            font-size:22px;
            font-weight:600;
        }
        .image_overlay{
            position:absolute;
            top:0;
            left:0;
            width:100%;
            height:100%;
            background:#ff5757;
            opacity:0;
        }
        #product-card.animate .image_overlay{
            opacity:0.7;
            -webkit-transition: all 200ms ease-out;
            -moz-transition: all 200ms ease-out;
            -o-transition: all 200ms ease-out;
            transition: all 200ms ease-out;
        }
        .select-option{
            padding:2px 0 0;
        }
        .select-option strong{
            font-weight:700;
            color:#393c45;
            font-size:14px;
        }
        .select-option span{
            color:#969699;
            font-size:14px;
            display:block;
            margin-bottom:8px;
        }
        #detailsV{
            position:absolute;
            top:112px;
            left:50%;
            margin-left:-85px;
            border:2px solid #fff;
            color:#fff;
            font-size:19px;
            text-align:center;
            text-transform:uppercase;
            font-weight:700;
            padding:10px 0;
            width:172px;
            opacity:0;
            -webkit-transition: all 200ms ease-out;
            -moz-transition: all 200ms ease-out;
            -o-transition: all 200ms ease-out;
            transition: all 200ms ease-out;
        }
        #detailsV:hover{
            background:#fff;
            color:#ff5757;
            cursor:pointer;

        }
        #product-card.animate #detailsV{
            opacity:1;
            width:152px;
            font-size:15px;
            margin-left:-75px;
            top:115px;
            -webkit-transition: all 200ms ease-out;
            -moz-transition: all 200ms ease-out;
            -o-transition: all 200ms ease-out;
            transition: all 200ms ease-out;
        }
        div.colors div{
            margin-top:3px;
            width:15px;
            height:15px;
            margin-right:5px;
            float:left;
        }
        div.colors div span{
            width:15px;
            height:15px;
            display:block;
            border-radius:50%;
        }
        div.colors div span:hover{
            width:17px;
            height:17px;
            margin:-1px 0 0 -1px;
        }
        div.blueC span{background:#2ab1ce;}
        div.yellowC span{background:#fd9d08;}
        div.redC span{background:#ff3838;}
        div.whiteC span{
            background:#fff;
            width:14px;
            height:14px;
            border:1px solid #e8e9eb;
        }
        div.shadow{
            width:335px;height:520px;
            opacity:0;
            position:absolute;
            top:0;
            left:0;
            z-index:3;
            display:none;
            background: -webkit-linear-gradient(left,rgba(0,0,0,0.1),rgba(0,0,0,0.2));
            background: -o-linear-gradient(right,rgba(0,0,0,0.1),rgba(0,0,0,0.2));
            background: -moz-linear-gradient(right,rgba(0,0,0,0.1),rgba(0,0,0,0.2));
            background: linear-gradient(to right, rgba(0,0,0,0.1), rgba(0,0,0,0.2));
        }
        #back-side div.shadow{
            z-index:10;
            opacity:1;
            background: -webkit-linear-gradient(left,rgba(0,0,0,0.2),rgba(0,0,0,0.1));
            background: -o-linear-gradient(right,rgba(0,0,0,0.2),rgba(0,0,0,0.1));
            background: -moz-linear-gradient(right,rgba(0,0,0,0.2),rgba(0,0,0,0.1));
            background: linear-gradient(to right, rgba(0,0,0,0.2), rgba(0,0,0,0.1));
        }
        #back-flip:hover #cx, #back-flip:hover #cy{
            background:#979ca7;
            -webkit-transition: all 250ms ease-in-out;
            -moz-transition: all 250ms ease-in-out;
            -ms-transition: all 250ms ease-in-out;
            -o-transition: all 250ms ease-in-out;
            transition: all 250ms ease-in-out;
        }
        #carousel ul{
            position:absolute;
            top:0;
            left:0;
        }
        #carousel li{
            width:335px;
            height:500px;
            float:left;
            overflow:hidden;
        }
        #carousel .x, #carousel .y{
            height:2px;
            width:15px;
            background:#ff5757;
            position:absolute;
            top:31px;
            left:17px;
            -ms-transform: rotate(45deg);
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
        }
        #carousel .x{
            -ms-transform: rotate(135deg);
            -webkit-transform: rotate(135deg);
            transform: rotate(135deg);
            top:21px;
        }
        #carousel .NextIMG .x{
            -ms-transform: rotate(45deg);
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
        }
        #carousel .NextIMG .y{
            -ms-transform: rotate(135deg);
            -webkit-transform: rotate(135deg);
            transform: rotate(135deg);
        }
        .colors img{
            width: 100%;
            border-radius: 3px;
        }
    </style>
@endsection
