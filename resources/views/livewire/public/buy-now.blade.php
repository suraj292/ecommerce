<div>
    <div class="hidden-hight-div"></div>
    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Buy Now</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">home /</a></li>
                            <li class="breadcrumb-item active" aria-current="page">buy</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="checkout-page">
                <div class="checkout-form">
                    <form>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                @if(is_null($user))
                                    <livewire:public.component.checkout-user-auth2 />
                                @elseif(!$user->mobile_verified_at )
                                    <livewire:public.component.checkout-user-auth2 />
                                    <div class="accordion-item mt-2">
                                        <div id="headingOne">
                                            <h2 class="accordion-header">
                                                <button class="w-100 py-3 text-start accordion-btn">
                                                    <span class="px-1 rounded accordion-span">2</span>&nbsp;&nbsp;&nbsp; DELIVERY ADDRESS
                                                </button>
                                            </h2>
                                        </div>
                                    </div>
                                @else
                                    <livewire:public.component.checkout-address />
                                @endif
                            </div>

                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <div class="checkout-details shadow">
                                    <div class="order-box">
                                        <div class="title-box">
                                            <div>Product <span>Total</span></div>
                                        </div>
                                        <ul class="qty">

                                            <span style="display: none;">
                                                {{ $costWithoutCoupon = 0, $costWithoutOffer = 0 }}
                                            </span>

{{--                                            @foreach($cart as $product)--}}
                                                <li class="text-capitalize">{{ $cart['title'] }} × {{ $cart['quantity'] }}

                                                    @if($cart['offer_price'])

                                                        <span>
                                                                &#8377; {{ $price = $cart['offer_price'] * $cart['quantity'] }}
                                                                <del>&#8377; {{ $cart['price'] * $cart['quantity'] }}</del>
                                                            </span>
                                                        <span style="display: none;"> {{ $withoutOffer = 0 }}</span>

                                                    @else

                                                        <span>
                                                                &#8377; {{ $withoutOffer = $price = $cart['price'] * $cart['quantity'] }}
                                                            </span>

                                                    @endif

                                                    <span style="display: none;">
                                                        {{ $costWithoutCoupon += $price, $costWithoutOffer += $withoutOffer }}
                                                    </span>
                                                </li>
{{--                                            @endforeach--}}

                                        </ul>
                                        <ul class="sub-total">
                                            @if($coupon && $costWithoutOffer * $coupon['value'] > 0)
                                                <li style="display: none;">
                                                    {{ $couponDiscount = $costWithoutOffer * $coupon['value'] / 100, $maxCouponDiscount = $coupon['max_amount'] }}
                                                    {{ $maxCouponDiscount < $couponDiscount ? $discount=$maxCouponDiscount : $discount=$couponDiscount }}
                                                </li>

                                                <li>Subtotal <span class="count">&#8377; {{ $total = $costWithoutCoupon - $discount }}</span></li>

                                                <li>Net Amount <span class="count">&#8377; {{ $netAmount = round($total * 100/118) }}</span></li>
                                                <li>GST (18%) <span class="count">&#8377; {{ round($total - $netAmount) }}</span></li>

                                                <li style="color: #00a20c;">COUPON ({{ strtoupper($coupon['code']) }})
                                                    <span class="count" style="color: #00a20c;">- &#8377; {{ round($discount) }} ({{ $coupon['value'] }}%)</span>
                                                </li>
                                            @else
                                                <li>Subtotal <span class="count">&#8377; {{ $total = $costWithoutCoupon }}</span></li>

                                                <li style="display: none;">
                                                    {{ $netAmount = $costWithoutCoupon * 100/118, $gst = $costWithoutCoupon - $netAmount }}
                                                </li>

                                                <li>Net Amount <span class="count">&#8377; {{ round($netAmount) }}</span></li>
                                                <li>GST (18%) <span class="count">&#8377; {{ round($gst) }}</span></li>
                                            @endif
                                        </ul>
                                        <ul class="total">
                                            <li>Total <span class="count">&#8377; {{ $total }}</span></li>
                                        </ul>
                                        @if($coupon)
                                            {{ Illuminate\Support\Facades\Cookie::queue('total', $total, 60) }}
                                        @else
                                            {{ Illuminate\Support\Facades\Cookie::queue('total', null, 60) }}
                                        @endif

                                        {{--    Coupon Starts   --}}
                                        <div class="coupon-code">
                                            <p role="button">Have Coupon?</p>
                                            @error('couponCode')<p class="text-danger" style="margin-top: -10px;">{{ $message }}</p>@enderror
                                            @if(session()->has('invalid_coupon'))<p class="text-danger" style="margin-top: -10px;">{{ session('invalid_coupon') }}</p>@endif
                                            @if(session()->has('used_coupon'))<p class="text-danger" style="margin-top: -10px;">{{ session('used_coupon') }}</p>@endif
                                            @if(session()->has('offer_not_applicable'))<p class="text-danger" style="margin-top: -10px;">{{ session('offer_not_applicable') }}</p>@endif
                                        </div>
                                        <form class="row enter-code" wire:submit.prevent="submitCoupon">
                                            <div class=" row enter-code" style="display: none;">
                                                <div class="col-6">
                                                    <input class="text-uppercase" type="text" placeholder="Coupon Code" wire:model.lazy="couponCode">
                                                </div>
                                                <div class="col-2">
                                                    <button class="btn btn-solid btn-sm me-3" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                        <script>
                                            $(document).ready(function (){
                                                $(".coupon-code").on('click', function (){
                                                    $(".coupon-code").hide();
                                                    $(".enter-code").show();
                                                });
                                            });
                                        </script>
                                        {{--    Coupon Ends   --}}
                                    </div>
                                    <div class="payment-box">
                                        <div class="text-end">
                                            <a wire:click="placeOrder" class="btn-solid btn">Place Order</a>
                                            @if(session()->has('address_not_selected'))
                                                <p class="text-danger mt-2">{{ session('address_not_selected') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->

</div>
@section('style')
    <link href="{{ asset('assets/css/bootstrap-social.css') }}" rel="stylesheet" >
    <style>
        .dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0; /* remove the gap so it doesn't close */
        }
        .btn-selected{border: none; background: #2874f0; color: white; font-size: 15px; font-weight: bold;}
        .btnSpnSlct{background-color: white; color: #2874f0; font-weight: normal; border-radius: 2px;}
        .accordion-btn{border: none; /*border: #0a0a0a12 1px solid;*/ background: white; color: gray; font-size: 15px; box-shadow: 0 10px 20px 0 #f3f3f3a6; font-weight: bold;}
        .accordion-span{background-color: #dbdbdb85; color: #2874f0; font-weight: normal; border-radius: 2px;}
        .mainLoginInput{
            font-family: FontAwesome, serif;
        }
    </style>
@endsection
