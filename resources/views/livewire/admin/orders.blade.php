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
                <div class="card">
                    <div class="card-body" style="/*max-height: 300px;*/ overflow-y: auto;" wire:ignore>
                        <h4 class="card-title">Orders</h4>
                        <table id="dataTable" class="table table-striped table-bordered table-sm" >
                            <thead>
{{--                            <form>--}}
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputCity">Created Date From:</label>
                                        <input type="text" class="form-control" id="min">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputState">Created Date To:</label>
                                        <input type="text" class="form-control" id="max">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="dStatus">Order Status</label>
                                        <select id="dStatus" class="form-control">
                                            <option value selected>All</option>
                                            <option value="1">New Order</option>
                                            <option value="2">Shipped</option>
                                            <option value="3">delivered</option>
                                            <option value="4">Cancelled</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <br>
                                        <button type="button" class="btn btn-primary" id="search">search</button>
                                    </div>
                                </div>
{{--                            </form>--}}
                                <tr>
                                    <th class="th-sm">Name
                                    </th>
                                    <th class="th-sm">Order No.
                                    </th>
                                    <th class="th-sm">Order Date
                                    </th>
                                    <th class="th-sm">Total Cost
                                    </th>
                                    <th class="th-sm">Payment Method
                                    </th>
                                    <th style="display: none;">d status
                                    </th>
                                    <th class="th-sm">Dispatched</th>
                                </tr>
                            </thead>

                            <tbody>

                            @foreach($orders as $order)
                                <tr wire:click="getOrder({{ $order->id }})" style="cursor: pointer;">
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->order_number }}</td>
                                    <td>{{ $order->created_at->format('d M Y') }}</td>
                                    {{--product qty--}}
                                    {{--<td>{{ count(explode(',', $order->product_user_cart_ids)) }}</td>--}}
                                    <td>&#8377; {{ $order->total_payable_cost }}</td>
                                    <td>
                                        {{ $order->razorpay_id ? 'Prepaid' : 'COD' }}
                                    </td>
                                    <td style="display: none;">{{ $order->delivery_status }}</td>
                                    <td>{{ $order->dispatch ? 'yes' : 'No' }}</td>
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
                                    <th class="th-sm">Total Cost
                                    </th>
                                    <th class="th-sm">Payment Method
                                    </th>
                                    <th style="display: none;">d status
                                    </th>
                                    <th class="th-sm">Dispatched</th>
                                </tr>
                            </tfoot>
                        </table>

{{--                        <livewire:admin.component.order-table />--}}
                    </div>
                </div>
            </div>
        </div>

        @if(session()->has('order_shipped'))
        <div class="alert alert-success">
            {{ session('order_shipped') }}
        </div>
        @endif

        @if(session()->has('order_confirmed'))
        <div class="alert alert-success p-2">
            {{ session('order_confirmed') }}
        </div>
        @endif
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
                                    <span class="text-info">Shipped</span>
                                    @break

                                    @case(3)
                                    <span class="text-secondary">Delivered</span>
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
                                    @if($getOrders->coupon_discount)
                                    <tr>
                                        <td>Coupon Discount </td>
                                        <td>:</td>
                                        <td>&#8377; {{ $getOrders->coupon_discount }}</td>
                                    </tr>
                                    @endif
                                    @if($getOrders->cod_charge)
                                    <tr>
                                        <td>Cod Charges </td>
                                        <td>:</td>
                                        <td>&#8377; {{ $getOrders->cod_charge }}</td>
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
                                        Color: <img src="{{ asset('storage/color_image/'.$color->find($item->select_product_color_id)->color_image) }}" style="width: 25px;">
                                    </p>
                                </div>
                                <div class="col-sm-12 col-md-2">
                                    <p>&#8377; {{ $item->offer_price > 0 ? $item->offer_price : $item->price }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="form-group col-12" style="margin-bottom: -10px !important;">
{{--                            <button type="button" class="btn btn-success btn-fw float-right" wire:click="ship({{ $getOrders->id }})">SHIP</button>--}}
                            @if($getOrders->i_think_logistics_id)
                                @if($getOrders->delivery_status != 4)
                                <button type="button" class="btn btn-danger btn-fw float-right mr-2 courierModel" wire:click="orderCancel({{ $getOrders->i_think_logistics_id }})">Cancel</button>
                                @endif
{{--                                <button type="button" class="btn btn-primary btn-fw float-right mr-2 courierModel" data-toggle="modal" data-target="#exampleModalCenter">Track</button>--}}
                                <button type="button" class="btn btn-primary btn-fw float-right mr-2 courierModel" id="track">Track</button>
                                <button type="button" class="btn btn-primary btn-fw float-right mr-2 courierModel" wire:click="shipmentLabel({{ $getOrders->i_think_logistics_id }})">Shipment Label</button>
                                <button type="button" class="btn btn-primary btn-fw float-right mr-2 courierModel" wire:click="manifest({{ $getOrders->i_think_logistics_id }})">Manifest</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" wire:ignore>
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <style>
                                                        .card > div {
                                                            padding: 0;
                                                        }
                                                        .acoord-body{ padding: 20px;}
                                                    </style>
                                                    <div class="accordion" id="accordionExample">
{{--                                                        @if($logisticDetail)--}}
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne">
                                                                <h2 class="mb-0">
                                                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                        Details
                                                                    </button>
                                                                </h2>
                                                            </div>

                                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                                <div class="acoord-body">
                                                                    <p>
                                                                        AWB Number: {{ $logisticDetail['awb_no'] }}
                                                                        <br>
                                                                        Logistics: {{ $logisticDetail['logistic'] }}
                                                                        <br>
                                                                        Current Status: {{ $logisticDetail['current_status'] }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-header" id="headingTwo">
                                                                <h2 class="mb-0">
                                                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                        Last Scan details
                                                                    </button>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                                <div class="acoord-body">
                                                                    <p>
                                                                        Scan Location: {{ $logisticDetail['last_scan_details']['scan_location'] }}
                                                                        <br>
                                                                        Remark: {{ $logisticDetail['last_scan_details']['remark'] }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-header" id="headingThree">
                                                                <h2 class="mb-0">
                                                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                        Order Details
                                                                    </button>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                                <div class="acoord-body">
                                                                    <p>
                                                                        Order Type: {{ $logisticDetail['order_details']['order_type'] }}
                                                                        <br>
                                                                        Order Number: {{ $logisticDetail['order_details']['order_number'] }}
                                                                        <br>
                                                                        Physical Weight: {{ $logisticDetail['order_details']['phy_weight'] }}
                                                                        <br>
                                                                        Net Payment: {{ $logisticDetail['order_details']['net_payment'] }}
                                                                        <br>
                                                                        Shipment Length: {{ $logisticDetail['order_details']['ship_length'] }}
                                                                        <br>
                                                                        Shipment Width: {{ $logisticDetail['order_details']['ship_width'] }}
                                                                        <br>
                                                                        Shipment Height: {{ $logisticDetail['order_details']['ship_height'] }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-header" id="headingFour">
                                                                <h2 class="mb-0">
                                                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                                                                        Order Date Time
                                                                    </button>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                                                <div class="acoord-body">
                                                                    <p>
                                                                        Picked Date: {{ $logisticDetail['order_date_time']['pickup_date'] }}
                                                                        <br>
                                                                        Expected Delivery Date: {{ $logisticDetail['order_date_time']['expected_delivery_date'] }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-header" id="headingFive">
                                                                <h2 class="mb-0">
                                                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                                                                        Customer Details
                                                                    </button>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                                                <div class="acoord-body">
                                                                    <p>
                                                                        Customer Name: {{ $logisticDetail['customer_details']['customer_name'] }}
                                                                        <br>
                                                                        Customer Address: {{ $logisticDetail['customer_details']['customer_address1'] }}
                                                                        <br>
                                                                        Customer City: {{ $logisticDetail['customer_details']['customer_city'] }}
                                                                        <br>
                                                                        Customer State: {{ $logisticDetail['customer_details']['customer_state'] }}
                                                                        <br>
                                                                        Customer Pincode: {{ $logisticDetail['customer_details']['customer_pincode'] }}
                                                                        <br>
                                                                        Customer mobile: {{ $logisticDetail['customer_details']['customer_mobile'] }}
                                                                        <br>
                                                                        Customer Phone: {{ $logisticDetail['customer_details']['customer_phone'] }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-header" id="headingSix">
                                                                <h2 class="mb-0">
                                                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseThree">
                                                                        Scan Details
                                                                    </button>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                                                                <div class="acoord-body">
                                                                    @foreach($logisticDetail['scan_details'] as $scanDetail)
                                                                    <p>
                                                                        Scan Location: {{ $scanDetail['scan_location'] }}
                                                                        <br>
                                                                        Remark: {{ $scanDetail['remark'] }}
                                                                        <br>
                                                                        Date-Time: {{ $scanDetail['scan_date_time'] }}
                                                                    </p>
                                                                    <hr>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
{{--                                                        @endif--}}
                                                    </div>
                                                </div>
                                                <script>
                                                    $('#track').on('click', function () {
                                                        {{--window.livewire.emit('track', {{ $getOrders->i_think_logistics_id }});--}}
                                                        $('#exampleModalCenter').modal('show');
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                            @else
                                <button type="button" class="btn btn-primary btn-fw float-right mr-2 courierModel" {{--wire:click="confirmOrder({{ $getOrders->id }})"--}}
                                wire:click="showLogistics">Confirm Order</button>
                            @endif

                            <!-- Modal -->
                            @if($logisticsDiv)
                            <div class="modal fade show" style="padding-right: 16px; display: block; background-color: #0000009e;" id="courierModel">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Select Logistics</h5>
                                            <button type="button" class="close" wire:click="hideLogistics" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Form -->
                                            @if($logisticsRate)
                                            <p>
{{--                                                Logistic Name : {{ $logisticsRate['data'][0]['logistic_name'] }}--}}
{{--                                                <br>--}}
                                                Expected Delivery Date = {{ $logisticsRate['expected_delivery_date'] }}
                                                <br>
                                                Weight Slab = {{ $logisticsRate['data'][0]['weight_slab'] }} KG
                                                <br>
                                                Logistic Rate = {{ $logisticsRate['data'][0]['rate'] }}
                                            </p><br>
                                            <div class="form-group">
                                                <label >Select Logistics</label>
                                                <select class="form-control" wire:model="logistic">
                                                    <option selected> -- Select Logistics -- </option>
                                                    @foreach($logisticsRate['data'] as $logistics)
                                                        <option value="{{ $logistics['logistic_name'] }}"> {{ $logistics['logistic_name'] }} </option>
                                                    @endforeach
                                                </select>
{{--                                                <span>logistics: {{ $logistic }}</span>--}}
                                            </div>
{{--                                            <span style="display: none;">{{ \Illuminate\Support\Facades\Cookie::queue('logistic', $logistic, 60*60*60) }}</span>--}}

                                            <button type="submit" class="btn btn-primary" wire:click="confirmLogistics">Confirm Logistics</button>
                                            @else
                                            <form wire:submit.prevent="confirmOrder({{ $getOrders->id }})">
                                                <div class="form-group">
                                                    <label>Item Length (cm)</label>
                                                    <input type="text" class="form-control" placeholder="Item Length (cm)" wire:model.lazy="selectLogistics.length">
                                                    @error('selectLogistics.length')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Item width (cm)</label>
                                                    <input type="text" class="form-control" placeholder="Item width (cm)" wire:model.lazy="selectLogistics.width">
                                                    @error('selectLogistics.width')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Item height (cm)</label>
                                                    <input type="text" class="form-control" placeholder="Item height (cm)" wire:model.lazy="selectLogistics.height">
                                                    @error('selectLogistics.height')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Item weight (kg)</label>
                                                    <input type="text" class="form-control" placeholder="Item weight (kg)" wire:model.lazy="selectLogistics.weight">
                                                    @error('selectLogistics.weight')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div>
                                                    <button type="button" class="btn btn-secondary" wire:click="hideLogistics">Close</button>
{{--                                                    <button type="submit" class="btn btn-primary" wire:click="confirmOrder(2)">Confirm</button>--}}
                                                    <button type="submit" class="btn btn-primary">Confirm</button>
                                                </div>
                                            </form>
                                            @endif
                                            <!-- end form -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.4/b-2.2.2/b-html5-2.2.2/date-1.1.2/sb-1.3.1/sp-1.4.0/sl-1.3.4/datatables.min.css"/>
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.4/b-2.2.2/b-html5-2.2.2/date-1.1.2/sb-1.3.1/sp-1.4.0/sl-1.3.4/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

    <script>
        var minDate, maxDate;

        // Custom filtering function which will search data in column four between two values
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date( data[2] );

                if (
                    ( min === null && max === null ) ||
                    ( min === null && date <= max ) ||
                    ( min <= date   && max === null ) ||
                    ( min <= date   && date <= max )
                ) {
                    return true;
                }
                return false;
            }
        );

        $(document).ready(function() {
            // Create date inputs
            minDate = new DateTime($('#min'), {
                format: 'DD MMM YYYY'
            });
            maxDate = new DateTime($('#max'), {
                format: 'DD MMM YYYY'
            });

            // DataTables initialisation
            var table = $('#dataTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel',
                ]
            });

            // Refilter the table
            $('#min, #max').on('change', function () {
                table.draw();
            });
            /*
            Custom filter
            1. val = get value of th or dropdown
            2. grab column number-1
             */
            $('#dStatus').on('change', function () {
                var val = $('#dStatus').val();
                table.column(5)
                    .search(val ? '^' + $(this).val() + '$' : val, true, false)
                    .draw()
            });
        });
    </script>
@endsection
