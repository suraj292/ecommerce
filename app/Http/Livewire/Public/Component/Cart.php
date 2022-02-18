<?php

namespace App\Http\Livewire\Public\Component;

use App\Models\user_cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Cart extends Component
{
    public $cart, $quantity;
    public function render()
    {
        return view('livewire.public.component.cart');
    }

    public function mount()
    {
        $db_user_cart = user_cart::where('user_id', Auth::id())->get();
        if (!$db_user_cart->isEmpty()){
            $this->cart = $db_user_cart;
        }else{
            $this->cart = Session::get('cart');
        }
    }
    public function dProductCart($key)
    {
        if (Auth::check()){
            $product = user_cart::where('user_id', Auth::id())->where('product_id', $key)->first();
            $product->forceDelete();
            $this->cart = user_cart::where('user_id', Auth::id())->get();
        }else {
            $cartProduct = Session::get('cart');
            unset($cartProduct[$key]);
            Session::put('cart', $cartProduct);
            $this->cart = Session::get('cart');
        }
        $this->emit('cartRemoved');
    }

    //Cart update using Auth & Session
    public function increment($key)
    {
        if (Auth::check()){
            $cartProduct = user_cart::where('user_id', '=', Auth::id())->where('product_id', '=', $key)->first();
            $quantity = $cartProduct->quantity+1;
            $cartProduct->update(['quantity'=>$quantity]);
            $this->cart = user_cart::where('user_id', Auth::id())->get();
        }else{
            $cartProduct = Session::get('cart', []);
            foreach ($cartProduct as &$updateCart){
                if ($updateCart['product_id'] == $cartProduct[$key]['product_id']){
                    $updateCart['quantity'] = $cartProduct[$key]['quantity']+1;
                }
            }
            session()->put('cart', $cartProduct);
            $this->cart = Session::get('cart');
        }
        $this->emit('cartRemoved');//cartRemoved is used to update cart without parameters
    }
    public function decrement($key)
    {
        if (Auth::check()){
            $cartProduct = user_cart::where('user_id', '=', Auth::id())->where('product_id', '=', $key)->first();
            $quantity = $cartProduct->quantity==1 ? 1:$cartProduct->quantity-1;
            $cartProduct->update(['quantity'=>$quantity]);
            $this->cart = user_cart::where('user_id', Auth::id())->get();
        }else{
            $cartProduct = Session::get('cart', []);
            foreach ($cartProduct as &$updateCart){
                if ($updateCart['product_id'] == $cartProduct[$key]['product_id']){
                    $updateCart['quantity'] = $cartProduct[$key]['quantity']==1?1:$cartProduct[$key]['quantity']-1;
                }
            }
            session()->put('cart', $cartProduct);
            $this->cart = Session::get('cart');
        }
        $this->emit('cartRemoved');//cartRemoved is used to update cart without parameters
    }
}
