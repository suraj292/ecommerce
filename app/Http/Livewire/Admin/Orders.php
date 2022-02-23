<?php

namespace App\Http\Livewire\Admin;

use App\Models\select_product_color;
use App\Models\User;
use App\Models\user_address;
use App\Models\user_cart;
use App\Models\user_order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Orders extends Component
{
    public $orders, $getOrders, $items, $color, $DlAddress;
//    protected $listeners = ['getOrders'];
    public function render()
    {
        return view('livewire.admin.orders')->layout('layouts.admin');
    }

    public function mount()
    {
        $this->orders = User::join('user_order', 'user_order.user_id', 'Users.id')
//            ->select('name', 'order_number', 'total_payable_cost', DATE_FORMAT('user_order.created_at', '%d/%l/%Y'), 'razorpay_id', 'delivery_status')
            ->select(['name', 'order_number', 'total_payable_cost', 'razorpay_id', 'delivery_status', 'user_order.created_at', 'user_order.id'])
            ->where('user_order.id', '!=', 1)
            ->get();
    }

    public function getOrders($orderId)
    {
        $this->getOrders = user_order::select('id', 'product_user_cart_ids', 'user_id', 'user_delivery_id', 'delivery_status')
            ->with('user:id,name,email,mobile')
            ->find($orderId);
        $this->color = select_product_color::all();
        $this->DlAddress = user_address::find($this->getOrders->user_delivery_id);
        $this->items = user_cart::withTrashed()->find(explode(',', $this->getOrders->product_user_cart_ids));
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

    public function getOrder($id)
    {
        $this->getOrders = user_order::with('user:id,name,email,mobile')
            ->select('id', 'product_user_cart_ids', 'user_id', 'user_delivery_id', 'delivery_status')
            ->find($id);
        $this->color = select_product_color::all();
        $this->DlAddress = user_address::find($this->getOrders->user_delivery_id);
        $this->items = user_cart::withTrashed()->find(explode(',', $this->getOrders->product_user_cart_ids));
    }
}
