<div class="main-panel">
    <div class="content-wrapper"  x-data="{ isOpen: false }">
        <div class="page-header">
            <h3 class="page-title"> Orders </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Orders</li>
                </ul>
            </nav>
        </div>
        <div class="row">
            {{--    CATEGORY    --}}
            <div class="col-md-12 col-sm-12 grid-margin stretch-card">
                <div class="card" wire:ignore>
                    <div class="card-body" style="/*max-height: 300px;*/ overflow-y: auto;">
                        <h4 class="card-title">Orders</h4>
                        <div class="mb-3">
                            <button type="button" class="btn btn-inverse-primary btn-fw">All</button>
                            <button type="button" class="btn btn-inverse-success btn-fw">New Order</button>
                            <button type="button" class="btn btn-inverse-info btn-fw">shipped</button>
                            <button type="button" class="btn btn-inverse-secondary btn-fw">delivered</button>
                            <button type="button" class="btn btn-inverse-danger btn-fw">Cancelled</button>
                        </div>
                        <table id="dtBasicExample" class="table table-striped table-bordered table-sm">
                            <thead>
                            <tr>
                                <th class="th-sm">Name
                                </th>
                                <th class="th-sm">Order No.
                                </th>
                                <th class="th-sm">Order Date
                                </th>
                                <th class="th-sm">Product Qty
                                </th>
                                <th class="th-sm">Total Price
                                </th>
                                <th class="th-sm">Payment Mthd
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <!--
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>
                            </tr>
                            -->
                            @foreach($orders as $order)
                                <tr wire:click="getOrders({{ $order->id }})">
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->order_number }}</td>
                                    <td>{{ $order->created_at->isoFormat('Do MMM YYYY') }}</td>
                                    {{--product qty--}}
                                    <td>{{ count(explode(',', $order->product_user_cart_ids)) }}</td>
                                    <td>&#8377; {{ $order->total_payable_cost }}</td>
                                    @if($order->razorpay_id)
                                        <td>Prepaid</td>
                                    @else
                                        <td>COD</td>
                                    @endif
                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th class="th-sm">Name
                                </th>
                                <th class="th-sm">Order No.
                                </th>
                                <th class="th-sm">Order Date
                                </th>
                                <th class="th-sm">Product Qty
                                </th>
                                <th class="th-sm">Total Price
                                </th>
                                <th class="th-sm">Payment Mthd
                                </th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @if($getOrders)
        <div class="row">
            {{--    CATEGORY    --}}
            <div class="col-md-12 col-sm-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body row">
                        <div class="row col-12 mb-2">
                            <div class="col-12 mb-2">
                                Current Status :
                                @switch($getOrders->delivery_status)
                                    @case(1)
                                    <span class="text-success">New Order</span>
                                    @break

                                    @case(2)
                                    <span class="text-info">Cancelled</span>
                                    @break

                                    @case(3)
                                    <span class="text-secondary">Cancelled</span>
                                    @break

                                    @default
                                    <span class="text-danger">Cancelled</span>
                                @endswitch
                            </div>
                            <div class="col-sm-12 col-md-4 text-left">
                                Name : {{ $getOrders->user->name }}
                            </div>
                            <div class="col-sm-12 col-md-4 text-center">
                                Email : {{ $getOrders->user->email }}
                            </div>
                            <div class="col-sm-12 col-md-4 text-right">
                                Mobile : {{ $getOrders->user->mobile }}
                            </div>

                            <div class="col-12 p-2 rounded m-1" style="background: #f1f1f1; padding-bottom: -10px;">
                                <b>Delivery Address</b> <br><br>
                                <table>
                                    <tr>
                                        <td>Name </td>
                                        <td>:</td>
                                        <td>{{ $DlAddress->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone </td>
                                        <td>:</td>
                                        <td>{{ $DlAddress->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>Pincode </td>
                                        <td>:</td>
                                        <td>{{ $DlAddress->pincode }}</td>
                                    </tr>
                                    <tr>
                                        <td>Locality </td>
                                        <td>:</td>
                                        <td>{{ $DlAddress->locality }}</td>
                                    </tr>
                                    <tr>
                                        <td>Address </td>
                                        <td>:</td>
                                        <td>{{ $DlAddress->address }}</td>
                                    </tr>
                                    <tr>
                                        <td>City </td>
                                        <td>:</td>
                                        <td>{{ $DlAddress->city }}</td>
                                    </tr>
                                    <tr>
                                        <td>State </td>
                                        <td>:</td>
                                        <td>{{ $DlAddress->state }}</td>
                                    </tr>
                                    @if($DlAddress->landmark)
                                    <tr>
                                        <td>Landmark </td>
                                        <td>:</td>
                                        <td>{{ $DlAddress->landmark }}</td>
                                    </tr>
                                    @endif
                                    @if($DlAddress->alternate_phone)
                                    <tr>
                                        <td>Alternate Number </td>
                                        <td>:</td>
                                        <td>{{ $DlAddress->alternate_phone }}</td>
                                    </tr>
                                    @endif
                                </table>
                            </div>
                        </div>

                        @foreach($items as $item)
                        <div class="card mb-3 rounded col-12">
                            <div class="card-body shadow row">
                                <div class="col-sm-12 col-md-1">
                                    <img src="{{asset('storage/product/small/'.$item->image)}}" alt="product" class="rounded" style="width: 70px;">
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <p>
                                        {{ $item->title }}
                                        <br>
                                        <strong>Qty</strong>: {{ $item->quantity }}
                                        <br>
                                        Color: <img src="{{ asset('storage/color_image/'.$color->find($item->product_color_id)->color_image) }}" style="width: 25px;">
                                    </p>
                                </div>
                                <div class="col-sm-12 col-md-1">
                                    <p>&#8377; {{ $item->offer_price > 0 ? $item->offer_price : $item->price }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="form-group col-12" style="margin-bottom: -10px !important;">
                            <button type="button" class="btn btn-success btn-fw float-right">SHIP</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.11.3/datatables.min.css"/>
    <style>
        table.dataTable thead .sorting:after,
        table.dataTable thead .sorting:before,
        table.dataTable thead .sorting_asc:after,
        table.dataTable thead .sorting_asc:before,
        table.dataTable thead .sorting_asc_disabled:after,
        table.dataTable thead .sorting_asc_disabled:before,
        table.dataTable thead .sorting_desc:after,
        table.dataTable thead .sorting_desc:before,
        table.dataTable thead .sorting_desc_disabled:after,
        table.dataTable thead .sorting_desc_disabled:before {
            bottom: .5em;
        }
    </style>
@endsection
@section('script')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.11.3/datatables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dtBasicExample').DataTable();
        } );
    </script>
@endsection
