<?php

namespace App\Http\Livewire\Public\Component;

use App\Jobs\newUserEmailVerification;
use App\Jobs\orderConfirmationMail;
use App\Models\product_color_image;
use App\Models\user_address;
use App\Models\user_cart;
use App\Models\user_order;
use Illuminate\Support\Facades\Auth;
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
            $product = $cart->product_id;
            $colorId = $cart->product_color_image_id;
            $qty = $cart->quantity;
            $product_color_stock = product_color_image::find($colorId);
            $product_color_stock->decrement('stock', $qty);
        }
        // Sending SMS to user =>
        $user = Auth::user();
        $fullName = $user->name;
        $firstName = explode(' ', $fullName);
        // Account details
        $apiKey = urlencode('NmIzOTQyNTc0YjZlNGY0NjZlNDczNjQ3NTU3MTY1NzU=');
        // Message details
        $numbers = array('91'.$user->mobile);
        $sender = urlencode('HOBHAV');
        //$message = rawurlencode('Dear '.'Name'.', Thank you for shop at houseofbhavana.in. Your order number is '.'9876543210');
        //$message = rawurlencode('Dear Customer, '.$otp.' is the OTP for your mobile verification at houseofbhavana.in. Thank you');
        $message = rawurlencode('Dear '.$firstName[0].', Thank you for shop at houseofbhavana.in. Your order number is '.$this->order->order_number);
        //Dear %%|name^{"inputtype" : "text"}%%, Thank you for shop at houseofbhavana.in. Your order number is %%|order^{"inputtype" : "text"}%%

        $numbers = implode(',', $numbers);

        // Prepare data for POST request
        $sms = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender, 'message' => $message);
        // Send the POST request with cURL
        $ch = curl_init('https://api.textlocal.in/send/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $sms);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        // Sending EMAIL to user =>
        $user = Auth::user();
        $data = [
            'name'=>$user->name,
            'order'=>$this->order,
            'address'=>$this->address,
            'cart'=>$this->cart,
            'email'=>$user->email,
        ];
        orderConfirmationMail::dispatch($data);
    }
}
