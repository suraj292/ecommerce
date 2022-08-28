<?php

namespace App\Http\Livewire\Admin;

use App\Models\select_product_color;
use App\Models\User;
use App\Models\user_address;
use App\Models\user_cart;
use App\Models\user_order;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Orders extends Component
{
    public $orders, $getOrders, $items, $color, $DlAddress;
    public $selectLogistics = ['length'=>null, 'width', 'height', 'weight'];
    public $logisticsDiv, $logisticsRate, $orderId;
//    protected $listeners = ['getOrders'];
    public function render()
    {
        return view('livewire.admin.orders')->layout('layouts.admin');
    }

    public function mount()
    {
        $this->orders = User::join('user_order', 'user_order.user_id', 'Users.id')
            ->select(['name', 'order_number', 'total_payable_cost', 'razorpay_id', 'delivery_status', 'user_order.created_at', 'user_order.id', 'user_order.dispatch'])
            ->where('user_order.id', '!=', 1)
            ->get();
//        dd($this->orders);
    }

    public function getOrder($id)
    {
        $this->getOrders = user_order::with('user:id,name,email,mobile')
            ->select('id', 'product_user_cart_ids', 'user_id', 'user_delivery_id', 'delivery_status', 'i_think_logistics_id', 'razorpay_id', 'total_payable_cost', 'coupon_discount')
            ->find($id);
        $this->color = select_product_color::all();
        $this->DlAddress = user_address::find($this->getOrders->user_delivery_id);
        $this->items = user_cart::withTrashed()->find(explode(',', $this->getOrders->product_user_cart_ids));
        $this->orderId = $id;
    }

    // update order status
    public function ship($id)
    {
        $order = user_order::find($id);
        $order->update(['delivery_status'=>2]);
        $this->getOrders = null;
        Session::flash('order_shipped', 'Order has been shipped.');
//        dd($order);
    }

    public function confirmOrder($id)
    {
        $this->validate([
//            'selectLogistics.company'=>'required',
            'selectLogistics.length'=>'required|numeric',
            'selectLogistics.width'=>'required|numeric',
            'selectLogistics.height'=>'required|numeric',
            'selectLogistics.weight'=>'required|numeric',
        ],[
//            'selectLogistics.company.required'=>'Company name required',
//            'selectLogistics.company.numeric'=>'Company should be integer only',
            'selectLogistics.length.required'=>'Length required',
            'selectLogistics.length.numeric'=>'Length should be integer only',
            'selectLogistics.width.required'=>'width required',
            'selectLogistics.width.numeric'=>'width should be integer only',
            'selectLogistics.height.required'=>'height required',
            'selectLogistics.height.numeric'=>'height should be integer only',
            'selectLogistics.weight.required'=>'weight required',
            'selectLogistics.weight.numeric'=>'weight should be integer only',
        ]);
//        $userOrder = user_order::find($id);
        $payment = $this->getOrders->razorpay_id == '' ? 'COD' : 'prepaid';
        $data = json_encode([
                "data"=>[
                    "from_pincode" => "201005",
                    "to_pincode" => $this->DlAddress->pincode,
                    "shipping_length_cms" => $this->selectLogistics['length'],
                    "shipping_width_cms" => $this->selectLogistics['width'],
                    "shipping_height_cms" => $this->selectLogistics['height'],
                    "shipping_weight_kg" => $this->selectLogistics['weight'],
                    "order_type" => "forward",
                    "payment_method" => $payment,
                    "product_mrp" => $this->getOrders->total_payable_cost,
                    "access_token" => env('I_THINK_LOGISTICS_ACCESS_TOKEN'),
                    "secret_key" => env('I_THINK_LOGISTICS_SECRET_KEY'),
                ]
            ]);
        $client = new Client();
        $res = $client->request('POST','https://manage.ithinklogistics.com/api_v3/rate/check.json', ['body'=>$data]);

        $this->logisticsRate = json_decode($res->getBody()->getContents(), true);
    }

    public function showLogistics()
    {
        $this->logisticsDiv = true;
    }

    public function hideLogistics()
    {
        $this->logisticsDiv = false;
    }

    public function confirmLogistics()
    {
        // entering data to to logistics
        $orderData = json_encode([
            "data" => [
            "shipments" => [
                [
                    "waybill" => "",
                    "order" => "22",
                    "sub_order" => "A",
                    "order_date" => now()->format('d-m-Y'),
                    "total_amount" => $this->getOrders->total_payable_cost,
                    "name" => $this->DlAddress->name,
                    "company_name" => "",
                    "add" => $this->DlAddress->address,
                    "add2" => "",
                    "add3" => "",
                    "pin" => $this->DlAddress->pincode,
                    "city" => $this->DlAddress->city,
                    "state" => $this->DlAddress->state,
                    "country" => "India",
                    "phone" => $this->DlAddress->phone,
                    "alt_phone" => $this->DlAddress->alternate_phone,
                    "email" => $this->getOrders->email,
                    "is_billing_same_as_shipping" => "yes",
                    "products" => [
                        [
                            "product_name" => "HOUSE OF BHAVANA DELIVERY",
                            "product_sku" => null,
                            "product_quantity" => "1",
                            "product_price" => $this->getOrders->total_payable_cost, // product amount 1
                            "product_tax_rate" => "0",
                            "product_hsn_code" => null,
                            "product_discount" => "0"
                        ],
                    ],
                    "shipment_length" => $this->selectLogistics['length'],
                    "shipment_width" => $this->selectLogistics['width'],
                    "shipment_height" => $this->selectLogistics['height'],
                    "weight" => $this->selectLogistics['weight'],
                    "shipping_charges" => "0",
                    "giftwrap_charges" => "0",
                    "transaction_charges" => "0",
                    "total_discount" => "0",
                    "first_attemp_discount" => "0",
                    "cod_charges" => "0",
                    "advance_amount" => $this->getOrders->razorpay_id ? $this->getOrders->total_payable_cost:0,
                    "cod_amount" => $this->getOrders->razorpay_id ? "0":$this->getOrders->total_payable_cost, //total amount cod
                    "payment_mode" => $this->getOrders->razorpay_id ? 'prepaid':'cod',
                    "reseller_name" => "",
                    "eway_bill_number" => "",
                    "gst_number" => "",
                    "return_address_id" => "1293"
                ]
            ],
            "pickup_address_id" => "1293",
            "access_token" => "5a7b40197cd919337501dd6e9a3aad9a",
            "secret_key" => "2b54c373427be180d1899400eeb21aab",
            "logistics" => "Delhivery",
            "s_type" => "",
            "order_type" => ""
        ]

        ]);
        $newOrder = new Client();
        $order = $newOrder->post('https://pre-alpha.ithinklogistics.com/api_v3/order/add.json', ['body'=>$orderData]);

        // response of logistics
        $result = json_decode($order->getBody()->getContents(), true);
        // if logistics success
        if ($result['data'][1]['status'] != 'error') {
            $user_order = user_order::find($this->orderId);
            $user_order->update(['delivery_status' => 2]);
            $this->getOrders = null;
            $this->logisticsDiv = false;
            $this->selectLogistics = null;
            $this->logisticsRate = null;
            $this->orders = User::join('user_order', 'user_order.user_id', 'Users.id')
                ->select(['name', 'order_number', 'total_payable_cost', 'razorpay_id', 'delivery_status', 'user_order.created_at', 'user_order.id', 'user_order.dispatch'])
                ->where('user_order.id', '!=', 1)
                ->get();
        }else{
            dd('logistics error please contact your developer. Error: '.$result['data'][1]['remark']);
        }
//        dd($result['data'][1]['waybill']);
//        dd(json_decode($orderData, true));
//        dd($result['data'][1]['remark']);
    }

}
