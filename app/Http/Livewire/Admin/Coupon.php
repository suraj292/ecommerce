<?php

namespace App\Http\Livewire\Admin;

use App\Models\coupon_code;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Livewire\Component;

class Coupon extends Component
{
    public $coupons;
    public $newCoupon = ['code', 'value', 'maxAmount'];
    public function render()
    {
        return view('livewire.admin.coupon')->layout('layouts.admin');
    }
    public function mount()
    {
        $this->coupons = coupon_code::latest('id')->get();
    }
    public function couponGenerate()
    {
        $this->validate([
            'newCoupon.code'=>'required|unique:coupon_code,code',
            'newCoupon.value'=>'required|integer|digits_between: 1,12|max:99',
            'newCoupon.maxAmount'=>'required|integer',
        ]);
        $coupon = new coupon_code([
            'code'=>$this->newCoupon['code'],
            'value'=>$this->newCoupon['value'],
            'max_amount'=>$this->newCoupon['maxAmount'],
            'expire_at'=>now()->addYear(),
//            'active'=>true,
        ]);
        $x = now()->toDateString();
        $coupon->save();
        $this->newCoupon = null;
        $this->coupons = coupon_code::latest('id')->get();
        Session::flash('coupon_saved', 'Your Coupon has been saved.');
    }

    public function couponActive($id)
    {
        $coupon = coupon_code::find($id);
        if ($coupon->active) {
            $coupon->update([
                'active' => false,
                'expire_at'=>now()->addYear(),
            ]);
//            dd('this is active');
        }else{
            $coupon->update([
                'active' => true,
                'expire_at'=>now()->addYear(),
            ]);
//            dd('this is inactive');
        }
        $coupon->save();
        $this->coupons = coupon_code::latest('id')->get();
//        dd($coupon);
    }
}
