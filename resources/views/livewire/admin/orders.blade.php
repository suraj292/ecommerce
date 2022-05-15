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
                                <tr wire:click="getOrder({{ $order->id }})">
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
                                <div class="col-sm-12 col-md-1">
                                    <p>&#8377; {{ $item->offer_price > 0 ? $item->offer_price : $item->price }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="form-group col-12" style="margin-bottom: -10px !important;">
{{--                            <button type="button" class="btn btn-success btn-fw float-right" wire:click="ship({{ $getOrders->id }})">SHIP</button>--}}
                            @if(!$getOrders->i_think_logistics_id)
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
                                                Logistic Name : {{ $logisticsRate['data'][0]['logistic_name'] }}
                                                <br>
                                                Expected Delivery Date = {{ $logisticsRate['expected_delivery_date'] }}
                                                <br>
                                                Logistic Rate = {{ $logisticsRate['data'][0]['rate'] }}
                                            </p>
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
        $('#toggleLogistics').on('click', function () {
            alert('hello world')
        });
    </script>
@endsection
