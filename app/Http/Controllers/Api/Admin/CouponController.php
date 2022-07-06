<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\coupon_code;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupon = coupon_code::latest('id')->get();
        return response([
            'data'=>$coupon,
        ], 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'couponCode'=>'required|unique:coupon_code,code',
            'couponValue'=>'required|integer|digits_between: 1,12|max:99',
            'couponMaxAmount'=>'required|integer',
        ]);
        $coupon = new coupon_code([
            'code' => $request->couponCode,
            'value' => $request->couponValue,
            'max_amount' => $request->couponMaxAmount,
            'expire_at' => now()->addYear(),
        ]);
        $coupon->save();
        return response([
            'message'=> 'New Coupon has been successfully inserted.'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $coupon = coupon_code::find($id);
        if ($coupon->active) {
            $coupon->update([
                'active' => false,
                'expire_at'=>now()->addYear(),
            ]);
        }else{
            $coupon->update([
                'active' => true,
                'expire_at'=>now()->addYear(),
            ]);
        }
        $coupon->save();
        return response([
            'Coupon' => $coupon
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = coupon_code::destroy($id);
        return response([
            'message' => 'Coupon has been deleted.'
        ], 201);
    }
}
