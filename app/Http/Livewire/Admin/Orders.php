<?php

namespace App\Http\Livewire\Admin;

use App\Models\select_product_color;
use App\Models\user_address;
use App\Models\user_cart;
use App\Models\user_order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Orders extends Component
{
    public $orders, $getOrders, $items, $color, $DlAddress;
    public function render()
    {
        return view('livewire.admin.orders')->layout('layouts.admin');
    }

    public function mount()
    {
        $this->orders = user_order::with('user:id,name')->where('id', '!=', '1')->get();
//        $this->orders = user_order::with('user')->where('id', '!=', '1')->find(2);
//        $this->orders = user_order::get();
//        dd($this->orders);
    }

    public function getOrders($orderId)
    {
        $this->getOrders = user_order::select('id', 'product_user_cart_ids', 'user_id', 'user_delivery_id', 'delivery_status')
            ->with('user:id,name,email,mobile')
            ->find($orderId);
        $this->color = select_product_color::all();
        $this->DlAddress = user_address::find($this->getOrders->user_delivery_id);
        $this->items = user_cart::withTrashed()->find(explode(',', $this->getOrders->product_user_cart_ids));
//        dd($this->getOrders);
    }
}
