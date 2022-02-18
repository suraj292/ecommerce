<?php

namespace App\Http\Livewire\Public\Component;

use App\Models\product_color_image;
use App\Models\user_address;
use App\Models\user_cart;
use App\Models\user_order;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class OrderSuccess extends Component
{
    public $order, $cart, $address;

    public function render()
    {
        return view('livewire.public.component.order-success');
    }

    public function mount()
    {
        $order = Cookie::get('orderSuccess');
        if (is_null($order)){
            return abort(404);
        }
        $this->order = user_order::find((int)$order);
        $successOrderProductId =  explode(',', $this->order['product_user_cart_ids']);

        $this->cart = user_cart::withTrashed()->find($successOrderProductId);
        $this->address = user_address::find($this->order->user_delivery_id);

        foreach ($this->cart as $cart){
            $colorId = $cart->product_color_id;
            $qty = $cart->quantity;
            $product_color_stock = product_color_image::find($colorId);
            $product_color_stock->decrement('stock', $qty);
        }
    }
}
