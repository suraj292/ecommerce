<div class="dashboard">
    <div class="page-title">
        <h2>My Orders</h2>
    </div>
    <div class="welcome-msg">
{{--        <p>Hello, {{ strtoupper($user->name) }} !</p>--}}
        <p>From your My Account Dashboard you have the ability to view a snapshot of your recent
            account activity and update your account information. Select a link below to view or
            edit information.</p>
    </div>
    <div class="box-account box-info">
        <div class="row">
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-title">
                        <h3><strong>Orders</strong></h3>
                    </div>
                    <div class="box-content">
                        @forelse($orders as $order)
                            @foreach($userCarts->find(explode(',', $order->product_user_cart_ids)) as $userCrt)
                        <a class="card my-3 shadow-sm" style="border: none;" href="{{ route('track-order', ['order'=>$order->id, 'product'=>\Illuminate\Support\Str::slug($userCrt->title)]) }}">
                            <div class="card-body">
                                <div class="row" >
                                    <div class="col-sm-12 col-md-1 my-auto">
                                        <img src="{{asset('storage/product/small/'.$userCrt->image)}}" alt="product" class="rounded" style="width: 50px;">
                                    </div>
                                    <div class="col-sm-12 col-md-4 my-auto">
                                        <p>
                                            {{ $userCrt->title }}
                                            <br>
                                            <strong>Qty</strong>: {{ $userCrt->quantity }}
                                            <br>
                                            Color: <img class="rounded-circle"
                                                src="{{ asset('storage/color_image/'.$color->find($userCrt->select_product_color_id)->color_image) }}" style="width: 25px;">
                                        </p>
                                    </div>
                                    <div class="col-sm-12 col-md-1 my-auto">
                                        <p>&#8377; {{ $userCrt->offer_price > 0 ? $userCrt->offer_price : $userCrt->price }}</p>
                                    </div>
                                    <div class="col-sm-12 col-md-6 text-center my-auto">
                                        @switch($order->delivery_status)
                                            @case(1)
                                            <span class="text-success font-weight-bold">Preparing</span>
                                            @break

                                            @case(2)
                                            <span class="text-info font-weight-bold">Shipped</span>
                                            @break

                                            @case(3)
                                            <span class="text-secondary font-weight-bold">Delivered</span>
                                            @break

                                            @default
                                            <span class="text-danger font-weight-bold">Cancelled</span>
                                        @endswitch
                                    </div>
                                </div>
                            </div>
                        </a>
                            @endforeach
                        @empty
                            <h4 class="text-center pt-3">empty</h4>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
