<?php

namespace App\Http\Livewire\Public\Component;

use App\Models\select_product_color;
use App\Models\user_address;
use App\Models\user_cart;
use App\Models\user_order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class BuyNowConfirmPayment extends Component
{
    public $cart, $total, $coupon, $selectedAddress, $user, $productColor, $getColor;

    public function render()
    {
        return view('livewire.public.component.buy-now-confirm-payment');
    }
    public function mount()
    {
        $buyNowItem = json_decode(Cookie::get('buyNow'), true);
        if (!$buyNowItem){
            return redirect()->back();
        }
//        dd($buyNowItem);
        // is for direct buying single product
        $this->cart = $buyNowItem;
        $colorId = $buyNowItem['select_product_color_id'];
        $this->getColor = select_product_color::select('color_image')->find($colorId);

        $this->user = Auth::user();
        $coupon = Cookie::get('coupon');
        if ($coupon){
            $this->coupon = json_decode($coupon, true);
            $this->total = Cookie::get('total');
        }
        $addId = json_decode(Cookie::get('selectedAddress'));

        if (is_null($addId)){
            $addressId = user_address::select('id')->where('user_id', Auth::id())->where('default', true)->first();
            if (is_null($addressId)){
                return redirect('checkout')->with('empty_address', 'Please select address.');
            }else {
                $addressId = $addressId->id;
            }
        }else{
            $addressId = $addId;
        }

        if (request('razorpay_payment_id')){
            /*
            * generate order and invoice number
            * format : ORD/INV year month (last_order + 1)
            * eg: ORD2021110001
            * NOTE: first order will created by default to avoid database sql error
            */
            $newCart = user_cart::create($buyNowItem);
            $lastOrder = user_order::select('id')->latest('id')->first();
            $num = $lastOrder->id + 1;
            $order = date("Y").date("m").sprintf("%04d", $num);

            //$data = coupon code, coupon discount, total Amount & GST
            $data = json_decode(Cookie::get('confirmPayment'), true);

            $userOrder = new user_order([
                'razorpay_id' => request('razorpay_payment_id'),
                'user_id' => Auth::id(),
                'user_delivery_id' => $addressId,
                'i_think_logistics_id' => null,
                //this will get all ordered product [eg="1,2"]
                'product_user_cart_ids' => $newCart->id,
                'coupon_code' => $data['couponCode'],
                'coupon_discount' => $data['couponValue'],
                'order_number' => 'ORD'.$order,
//                'invoice_number' => 'INV'.$order,
                'total_payable_cost' => $data['total'],
                'gst_charge' => $data['gst'],
            ]);
            $userOrder->save();
            Cookie::queue('orderSuccess', $userOrder->id, 100*2);
//            $cart = user_cart::where('user_id', Auth::id());
//            $cart->delete();
            $newCart->delete();
            $this->redirect(route('order-success'));

        }

    }

    public function checkoutCod()
    {
        $addId = json_decode(Cookie::get('selectedAddress'));
        if (is_null($addId)){
            $addressId = user_address::select('id')->where('user_id', Auth::id())->where('default', true)->first();
            $addressId = $addressId->id;
        }else{
            $addressId = $addId;
        }
        $lastOrder = user_order::select('id')->latest('id')->first();
        $num = $lastOrder->id + 1;
        $order = date("Y").date("m").sprintf("%04d", $num);
        //$data = coupon code, coupon discount, total Amount & GST
        $data = json_decode(Cookie::get('confirmPayment'), true);
        $userOrder = new user_order([
            'user_id' => Auth::id(),
            'user_delivery_id' => $addressId,
            'i_think_logistics_id' => null,
            //this will get all ordered product [eg="1,2"]
            'product_user_cart_ids' => $this->cart->implode('id', ','),
            'coupon_code' => $data['couponCode'],
            'coupon_discount' => $data['couponValue'],
            'order_number' => 'ORD'.$order,
//            'invoice_number' => 'INV'.$order,
            'total_payable_cost' => ($data['total'] * 0.027) + $data['total'],
            'gst_charge' => $data['gst'],
        ]);
        $userOrder->save();
        Cookie::queue('orderSuccess', $userOrder->id, 100 * 2);
        $cart = user_cart::where('user_id', Auth::id());
        $cart->delete();
        $this->redirect(route('order-success'));
    }
}
