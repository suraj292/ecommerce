<?php

namespace App\Http\Livewire\Public\Component;

use App\Models\collection_name;
use App\Models\product_category;
use App\Models\user_cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Header extends Component
{
    public $categories, $user, $collections, $cart;
    protected $listeners = ['cartUpdated', 'cartRemoved'];

    public function cartUpdated($addToCart)
    {
        if (Auth::check()){
            $cart_product = user_cart::where('user_id', Auth::id())->get();
            if (!$cart_product->isEmpty()){
                foreach ($cart_product as $product) {
                    if ($product['product_id'] == $addToCart['product_id']) {
                        $productUpdate = $product;
                    }
                }
                if (!empty($productUpdate)){
                    $productUpdate->update($addToCart);
                }else{
                    user_cart::create($addToCart);
                }
            }else{
                user_cart::create($addToCart);
            }
            $this->cart = user_cart::where('user_id', Auth::id())->get();
        }else {
            // validate session don't repeat cart product
            if (session()->has('cart')) {
                foreach (session('cart') as $cart) {
                    if ($addToCart['product_id'] == $cart['product_id']) {
                        return;
                    } else {
                        $cart = $addToCart;
                    }
                }
            }
            //if user logged in than cart will save to database
            if (session()->has('cart')) {
                session()->push('cart', $cart);
            } else {
                session()->put('cart', [$addToCart]);
            }
            $this->cart = Session::get('cart');
        }
    }

    public function cartRemoved()
    {
        if (Auth::check()){
            $this->cart = user_cart::where('user_id', Auth::id())->get();
        }else{
            $this->cart = Session::get('cart');
        }
    }

    public function render()
    {
        return view('livewire.public.component.header');
    }

    public function mount()
    {
        if (Cache::has('categories') && Cache::has('collections')){
            $this->categories = json_decode(Cache::get('categories'), true);
            $this->collections = json_decode(Cache::get('collections'), true);
        }else {
            $this->categories = product_category::all();
            Cache::put('categories', $this->categories, 2 * 60);
            $this->collections = collection_name::all();
            Cache::put('collections', $this->collections, 2 * 60);
        }
        $this->user = Auth::user();

        $db_user_cart = user_cart::where('user_id', Auth::id())->get();
        if (!$db_user_cart->isEmpty()){
            $this->cart = $db_user_cart;
        }else{
            $this->cart = Session::get('cart');
        }
        if (Auth::check() && session()->has('cart')){
            foreach (Session::get('cart') as $cart){
                if ($cart['user_id'] == null && $db_user_cart->isEmpty()) {
                    $cart['user_id'] = Auth::id();
                    user_cart::create($cart);
                    session()->forget('cart');
                } else {
                    return;
                }
            }
        }
    }

//    public function dropdownSubCategory($id)
//    {
//        $this->emit('product_category', $id);
//    }

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
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }

}
