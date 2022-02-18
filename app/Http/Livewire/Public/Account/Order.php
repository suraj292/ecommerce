<?php

namespace App\Http\Livewire\Public\Account;

use App\Models\select_product_color;
use App\Models\user_cart;
use App\Models\user_order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Order extends Component
{
    public $orders, $userCarts, $color;

    public function render()
    {
        return view('livewire.public.account.order');
    }

    public function mount()
    {
        $this->orders = user_order::select('id', 'product_user_cart_ids')->where('user_id', Auth::id())->latest('id')->get();
        $this->userCarts = user_cart::withTrashed()->where('user_id', Auth::id())->get();
        $this->color = select_product_color::all();
//        dd($this->orders);
    }
}
