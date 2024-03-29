<div>
    <div class="hidden-hight-div"></div>
    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>cart</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Confirm Payment</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--section start-->
    <section class="cart-section section-b-space">
        <div class="container">
            @if(!is_null($cart))
                <div class="row">
                    <div class="col-sm-12">
                        <div class="cart_counter">
                            <div class="countdownholder">
                                Your cart will be expired in<span id="timer"></span> minutes!
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <table class="table cart-table">
                                    <thead>
                                    <tr>
                                        <th> Product </th>
                                        <th> Color </th>
                                        <th> Amount </th>
                                        <th> Total </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <span style="display: none;">
                                        {{ $subtotal = 0, $savings = 0 }}
                                        {{ $productWithoutOffer = 0, $maximumAmount=0 }}
                                    </span>
{{--                                    @foreach($cart as $product)--}}
                                        <tr>
                                            <td>
                                                <a href="{{ route('product_details', Str::slug($cart['title'])) }}">
                                                    <img src="{{asset('storage/product/small/'.$cart['image'])}}" alt="Cart Product" style="height: 50px;">
                                                    {{ $cart['title'] }} <span style="color: #0a0a0a; text-transform: none;">x {{ $cart['quantity'] }}</span>
                                                </a>
                                            </td>
                                            <td>
{{--                                                <img src="{{ asset('storage/color_image/'.$getColor['color_image']) }}" width="30px">--}}
                                            </td>
                                            <td style="color: orangered; font-size: 20px;">
                                                @if($cart['offer_price'])
                                                    {{--    this span for calculating total saving of offer product     --}}
                                                    <span style="display: none;">
                                                        {{ $offerSavings = $cart['price'] - $cart['offer_price'], $couponOffer = 0 }}
                                                        {{ $totalAmount = $cart['price'] * $cart['quantity'] }}
                                                    </span>

                                                    &#8377; {{ $cost = $cart['offer_price'] }} <del style="font-size: 14px;">&#8377; {{ $cart['price'] }}</del>
                                                @else
                                                    <span style="display: none;">
                                                        {{ $offerSavings = 0, $couponOffer = $totalAmount = $cart['price'] * $cart['quantity'] }}
                                                    </span>

                                                    &#8377; {{ $cost = $cart['price'] }}
                                                @endif
                                            </td>
                                            <td style="color: orangered;">
                                                &#8377; {{ $price = $cart['quantity'] * $cost }}
                                            </td>
                                        </tr>
                                        <span style="display: none;">
                                            {{ $subtotal += $price, $savings += $offerSavings }}
                                            {{ $productWithoutOffer += $couponOffer, $maximumAmount += $totalAmount }}
                                        </span>
                                        {{--                                        {{ $collections []= collect([ 'productId'=>$product->product_id, 'productQty'=>$product->quantity, 'productColor'=>$product->product_color_id ]) }}--}}
{{--                                    @endforeach--}}
                                    </tbody>
                                </table>
                                {{--                                {{ dd($collections) }}--}}
                                <div class="row justify-content-end">
                                    <div class="col-sm-12 col-md-6 col-lg-4">
                                        <div class="checkout-details pt-4">
                                            <div class="order-box">
                                                <ul class="qty" style="border: none;">
                                                    <li style="display: none;">
                                                        {{ $netAmount = $subtotal * 100/118, $gst = $subtotal - $netAmount }}
                                                    </li>
                                                    <li>Net Amount <span>&#8377; {{ round($netAmount) }}</span></li>
                                                    <li>GST (18%) <span>&#8377; {{ round($gst) }}</span></li>
                                                    @if($coupon && $productWithoutOffer * $coupon['value'] > 0)
                                                        {{--    this li for cappin coupon max discount      --}}
                                                        <li style="display: none;">
                                                            {{ $maxCouponDiscount = $coupon['max_amount'], $couponDiscount = $productWithoutOffer * $coupon['value'] / 100 }}
                                                            {{ $maxCouponDiscount < $couponDiscount ? $discount=$maxCouponDiscount : $discount=$couponDiscount }}
                                                        </li>

                                                        <li style="color: #00a20c;">Coupon ({{ strtoupper($coupon['code']) }})
                                                            <span style="color: #00a20c;">&#8377; {{ $discount }} ({{ $coupon['value'] }}%)</span>
                                                        </li>
                                                    @endif
                                                    @if($productWithoutOffer > 0 && $coupon)
                                                        <li style="color: #00a20c;">Total Saving <span style="color: #00a20c;">&#8377; {{ $savings + $discount }}</span></li>
                                                    @elseif($savings > 0)
                                                        <li style="color: #00a20c;">Total Saving <span style="color: #00a20c;">&#8377; {{ $savings }}</span></li>
                                                    @endif
                                                    {{-- if prepaid selected --}}
                                                    <li style="display: block;" class="prepaidCh">Total
                                                        <span style="color: orangered;" >
                                                            &#8377; {{ $finalCost = $total != null ? $total : $subtotal }}
                                                            @if($finalCost != $maximumAmount)
                                                            <del>&#8377; {{ $maximumAmount }}</del>
                                                            @endif
                                                        </span>
                                                    </li>
                                                    {{-- if cod selected --}}
                                                    <li style="display: none;" class="codCh">Cod Charges <span>₹ {{ $codFinalAmount = round($finalCost * 0.027) }}</span></li>
                                                    <li style="display: none;" class="codCh">Total
                                                        <span style="color: orangered;">
                                                            ₹ {{ round($finalCost + $codFinalAmount) }}
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-4">
                                        <div class="payment-box">
                                            <div class="upper-box">
                                                <div class="payment-options">
                                                    <ul>
                                                        <li>
                                                            <div class="radio-option">
                                                                <input type="radio" name="payment-group" id="payment-2">
                                                                <label for="payment-2">Cash On Delivery
                                                                    <span class="small-text">Please send a check to Store
                                                                    Name, Store Street, Store Town, Store State /
                                                                    County, Store Postcode.
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="radio-option paypal">
                                                                <input type="radio" name="payment-group" id="payment-3" checked>
                                                                <label for="payment-3"> Debit / Credit Card / Net-Banking / UPI / Wallet
                                                                    <span class="image"><img src="{{ asset('assets/images/paypal.png') }}" alt=""></span>
                                                                </label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="text-end">
                                                {{--<a href="#" class="btn-solid btn">Place Order</a>--}}
                                                <form {{--wire:submit.prevent="getRazorpayResponse"--}} id="prepaid">
                                                    <script src="https://checkout.razorpay.com/v1/checkout.js"
                                                            data-key="{{ env('RAZORPAY_KEY') }}"
                                                            data-amount="{{ $finalCost * 100 }}"
                                                            data-buttontext="Confirm & Pay"
                                                            data-name="HouseOfBhavana"
                                                            data-description="Rozerpay"
                                                            {{--data-image="https://www.itsolutionstuff.com/frontTheme/images/logo.png"--}}
                                                            data-prefill.name="{{ $user->name }}"
                                                            data-prefill.contact="{{ $user->mobile }}"
                                                            data-prefill.email="{{ $user->email }}"
                                                        {{--data-theme.color="#ff7529"--}}
                                                    >
                                                    </script>
                                                </form>
                                                <div id="cod" style="display: none;">
                                                    <a href="#" class="btn-solid btn" wire:click="checkoutCod">Confirm</a>
                                                </div>
                                            </div>
                                            <script>
                                                $(document).ready(function (){
                                                    $(".razorpay-payment-button").addClass(' btn-solid btn');
                                                    $("#payment-2").on('click', function (){
                                                        $("#prepaid").hide();
                                                        $("#cod").show();
                                                        $(".codCh").show();
                                                        $(".prepaidCh").hide();
                                                    });
                                                    $("#payment-3").on('click', function (){
                                                        $("#cod").hide();
                                                        $("#prepaid").show();
                                                        $(".codCh").hide();
                                                        $(".prepaidCh").show();
                                                    });
                                                });
                                            </script>
                                        </div>
                                    </div>
                                    <span style="display: none;">
                                        {{ $couponCode = $coupon['code'] ?? null , $couponValue = $discount ?? null }}
                                        {{ $data = collect(['total'=>$finalCost,'gst'=>round($gst),'couponCode'=>$couponCode, 'couponValue'=>$couponValue]) }}
                                        {{ \Illuminate\Support\Facades\Cookie::queue('confirmPayment', $data, 5) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @endif
        </div>
    </section>
    <!--section end-->
</div>
@section('style')
    <style>
        .ti-trash{font-size: 22px;}
        .ti-trash:hover{color: red;}
    </style>
@endsection
@section('script')
    <script src="{{ asset('assets/js/timer1.js') }}"></script>
@endsection
