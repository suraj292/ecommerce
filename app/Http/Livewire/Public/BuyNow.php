<?php

namespace App\Http\Livewire\Public;

use App\Models\coupon_code;
use App\Models\user_order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class BuyNow extends Component
{
    public $cart, $user, $coupon, $couponCode="10OFF";
    public function render()
    {
        return view('livewire.public.buy-now');
    }

    public function mount()
    {
        $cart = Cookie::get('buyNow');
        if ($cart) {
            $this->cart = json_decode(Cookie::get('buyNow'), true);
            $this->user = Auth::user();
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
            if ($this->cart['offer_price'] == 0){
                    $offer = true;
                }else{
                    $offer = null;
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
//        if (!is_null($this->couponCode)) {
//            $this->coupon = coupon_code::select('code', 'value', 'max_amount')
//                ->where('code', $this->couponCode)
//                ->where('active', true)
//                ->where('expire_at', '>', now())
//                ->first();
//        }
        $this->redirect(route('buyNow-confirm-payment'));
    }
}
