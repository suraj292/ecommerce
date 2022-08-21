<?php

namespace App\Http\Livewire\Public\Component;

use App\Models\coupon_code;
use App\Models\user_cart;
use App\Models\user_order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Razorpay\Api\Api;

class Checkout extends Component
{
    public $cart, $couponCode="10OFF", $coupon, $user;

    public function render()
    {
        return view('livewire.public.component.checkout');
    }

    public function mount()
    {
        Cookie::queue('coupon', null, 7);
        $this->user = Auth::user();
        if (Auth::check()){
            $this->cart = user_cart::where('user_id', Auth::id())->get();
        }else{
            $this->cart = Session::get('cart');
        }
        if (is_null($this->cart) || count($this->cart) < 1){
            return redirect()->back();
        }
    }

    public function submitCoupon()
    {
        $this->validate(['couponCode'=>'required']);
        $coupon = coupon_code::select('code', 'value', 'max_amount')
            ->where('code', $this->couponCode)
            ->where('active', true)
            ->where('expire_at', '>', now())
            ->first();

        if ($coupon){
            $userOrder = user_order::where('user_id', Auth::id())
                ->where('coupon_code', $coupon->code)
                ->exists();
            foreach ($this->cart as $cart){
                if ($cart['offer_price'] == 0){
                    $offer = true;
                }else{
                    $offer = null;
                }
            }

            if (is_null($offer)){
                Session::flash('offer_not_applicable', 'Offer Not applicable on this item.');
            }elseif ($userOrder){
                Session::flash('used_coupon', 'You already used this coupon.');
            }else
            {
                Cookie::queue('coupon', $coupon, 90);
                $this->coupon = $coupon;
            }

        }else
        {
            Session::flash('invalid_coupon', 'Coupon has been expired or invalid.');
        }
    }

    public function placeOrder()
    {
        if (!is_null($this->couponCode)){
            $this->coupon = coupon_code::select('code', 'value', 'max_amount')
                ->where('code', $this->couponCode)
                ->where('active', true)
                ->where('expire_at', '>', now())
                ->first();
        }
        $this->redirect(route('confirm-payment'));
//        $selectedAddress = Cookie::get('selectedAddress');
//        if ($selectedAddress){
//            $this->redirect(route('confirm-payment'));
//        }else{
//            Session::flash('address_not_selected', 'Please Select Delivery Address.');
//        }
    }
}
