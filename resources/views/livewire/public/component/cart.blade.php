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
                            <li class="breadcrumb-item active">cart</li>
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
{{--                            Your cart will be expired in<span id="timer"></span> minutes!--}}
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea, incidunt?
                        </div>
                        <a href="{{ route('checkout') }}" class="cart_checkout btn btn-solid btn-xs">check out</a>
                    </div>
                </div>
                <div class="col-sm-12 table-responsive-xs">
                    <table class="table cart-table">

                        <thead>
                        <tr class="table-head">
                            <th scope="col">image</th>
                            <th scope="col">product name</th>
                            <th scope="col">price</th>
                            <th scope="col">quantity</th>
                            <th scope="col">action</th>
                            <th scope="col">total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <span style="display: none;">
                            {{ $subtotal=0 }}
                        </span>
                        @foreach($cart as $key => $cartProduct)
                        <tr>
                            <td>
                                <a href="#"><img src="{{asset('storage/product/small/'.$cartProduct['image'])}}" alt="Cart Product"></a>
                            </td>
                            <td>
                                <a href="#">{{ $cartProduct['title'] }}</a>
                                <div class="mobile-cart-content row">
                                    <div class="col">
                                        <div class="qty-box">
                                            <div class="input-group">
                                                <input type="text" name="quantity" class="form-control input-number" value="1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        @if($cartProduct['offer_price'])
                                            <h2 class="td-color">&#8377; {{ $price = $cartProduct['offer_price'] }}</h2>
                                        @else
                                            <h2 class="td-color">&#8377; {{ $price = $cartProduct['price'] }}</h2>
                                        @endif
                                    </div>
                                    <div class="col">
                                        <h2 class="td-color">
                                            @auth()
                                                <a class="icon" wire:click="dProductCart({{ $cartProduct['product_id'] }})">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            @endauth
                                            @guest()
                                                <a class="icon" wire:click="dProductCart({{ $key }})">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            @endguest
                                        </h2>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if($cartProduct['offer_price'])
                                    <h2>&#8377; {{ $price = $cartProduct['offer_price'] }}</h2>
                                @else
                                    <h2>&#8377; {{ $price = $cartProduct['price'] }}</h2>
                                @endif
                            </td>
                            <td>
                                <div class="qty-box">
{{--                                    <div class="input-group">--}}
{{--                                        <input type="number" name="quantity" class="form-control input-number"--}}
{{--                                               value="{{ $cartProduct['quantity'] }}">--}}
{{--                                    </div>--}}
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <button type="button" class="btn"
                                                @auth()
                                                    wire:click="decrement({{ $cartProduct['product_id'] }})"
                                                @endauth
                                                @guest()
                                                    wire:click="decrement({{ $key }})"
                                                @endguest
                                            >
                                                <i class="ti-minus"></i>
                                            </button>
                                        </span>
                                            <input type="text" class="form-control" value="{{$cartProduct['quantity']}}">
                                        <span class="input-group-prepend">
                                            <button type="button" class="btn"
                                                    @auth()
                                                    wire:click="increment({{ $cartProduct['product_id'] }})"
                                                    @endauth
                                                    @guest()
                                                    wire:click="increment({{ $key }})"
                                                    @endguest
                                            >
                                                <i class="ti-plus"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @auth()
                                    <a class="icon" role="button" wire:click="dProductCart({{ $cartProduct['product_id'] }})">
                                        <i class="ti-trash"></i>
                                    </a>
                                @endauth
                                @guest()
                                    <a class="icon" role="button" wire:click="dProductCart({{ $key }})">
                                        <i class="ti-trash"></i>
                                    </a>
                                @endguest
                            </td>
                            <td>
                                <h2 class="td-color">&#8377;{{$cartProduct['quantity'] * $price }}</h2>
                                <span style="display: none;">
                                    {{ $subtotal += $cartProduct['quantity'] * $price }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>

                    </table>
                    <div class="table-responsive-md">
                        <table class="table cart-table ">
                            <tfoot>
                            <tr>
                                <td>total price :</td>
                                <td>
                                    <h2>&#8377;{{ $subtotal }}</h2>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
            <div class="row cart-buttons">
                <div class="col-6"><a href="#" class="btn btn-solid">continue shopping</a></div>
                <div class="col-6"><a href="{{ route('checkout') }}" class="btn btn-solid">check out</a></div>
            </div>
            @else
                <div class="row">
                    <div class="col-sm-12">
                        <div class="cart_counter">
                            <div class="countdownholder">
                                {{--Your cart will be expired in<span id="timer"></span> minutes!--}}
                                Cart is Empty add Product to Checkout.
                            </div>
                            <a href="{{ route('home') }}" class="cart_checkout btn btn-solid btn-xs">Show now</a>
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
