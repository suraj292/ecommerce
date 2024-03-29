<?php

namespace App\Http\Livewire;

use App\Models\collection_link;
use App\Models\collection_name;
use App\Models\product_category;
use App\Models\product_color;
use App\Models\product_color_image;
use App\Models\product_details;
use App\Models\products;
use App\Models\User;
use App\Models\user_order;
use App\Models\user_verification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Database\Eloquent\Factories\Factory;
use SendGrid\Mail\Mail as SendGridMail;

class Test extends Component
{
    use WithFileUploads;

    public $test, $images, $image, $demo;
    public function render()
    {
//        return view('livewire.test')->layout('layouts.admin');
    }

    public function mount()
    {
      /*
        $email = new SendGridMail();
        $email->setFrom("no-reply@houseofbhavana.in", "Sender name");
        $email->setSubject("Sending with Twilio SendGrid is Fun");
        $email->addTo("surajkumarsharma123@gmail.com", "Suraj");
        $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
        $email->addContent(
            "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
        );
        $sendgrid = new \SendGrid('xxxxxx');
        try {
            $response = $sendgrid->send($email);
            print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n";
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }
        */
    }
//        // Account details
//        $apiKey = urlencode('NmIzOTQyNTc0YjZlNGY0NjZlNDczNjQ3NTU3MTY1NzU=');
//        // Message details
//        $numbers = array(919958394985);
//        $sender = urlencode('HOBHAV');
//        $otp = 789456;
//        $message = rawurlencode('Dear Customer, '.$otp.' is the OTP for your mobile verification at houseofbhavana.in. Thank you');
//
//        $numbers = implode(',', $numbers);
//
//        // Prepare data for POST request
//        $data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender, 'message' => $message);
//        // Send the POST request with cURL
//        $ch = curl_init('https://api.textlocal.in/send/');
//            curl_setopt($ch, CURLOPT_POST, true);
//            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
//            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//            $response = curl_exec($ch);
//            curl_close($ch);
//            // Process your response here
//            $this->test = $response;
//        $url = request();
//        $url = request()->path();
//            dd($url);
//    }
//        $this->test = user_order::with('user')
//            ->select(['delivery_status', 'order_number', 'razorpay_id', 'total_payable_cost', 'created_at'])
//            ->where('id', '!=', '1')
//            ->get();
//        $this->test = user_order::join('users', 'users.id', '=', 'user_order.user_id')
//            ->select('razorpay_id', 'order_number', 'total_payable_cost', 'name', 'users.created_at')
//            ->get();
//        $this->test = User::join('user_order', 'user_order.user_id', 'Users.id')
//            ->select('name', 'order_number', 'total_payable_cost', 'user_order.created_at', 'razorpay_id', 'delivery_status')
//            ->where('user_order.id', '!=', 1)
//            ->get();
//        dd($this->test);
//        $faker = \Faker\Factory::create();
//        $imageLarge = $faker->image(public_path('storage/product') ,800, 1000, null, false);
//        $x = Image::make(storage_path('app/public/product/') . $imageLarge)->resize(400, 500);
//        $x->save();
//        dd($imageLarge);
//    }

    public function switchImage($index)
    {
        $this->image = explode(',', $this->demo[0]->images)[$index];
    }


//        $request = request()->getRequestUri();
//        dd($request);
//        switch ($account)
//        $this->test = $account;

//        $blankArray = [];
//        for ($i=1; $i<=5; $i++){
//            $image = 'Image'.$i;
//            array_push($blankArray, $image);
//        }
//
//        $x = implode(',', $blankArray);
//
//        dd($x);

//    }
//    public function mount(){
//        $this->test = products::select('title','price','offer_price','images')
//            ->join('product_details', 'products.id', '=', 'product_details.product_id')
//            ->leftJoin('product_color_image', function ($query){
//                $query->on('product_color_image.product_id', '=', DB::raw(
//                    '(SELECT product_id FROM product_color_image WHERE product_color_image.product_id = products.id )'
//                ));
//            })->first()
//            ->where('product_category_id', 1)
//            ->get();

        //Session::put('test', 'cool ..');

//        if (Session()->has('test')){
//            dd(Session::get('test'));
//        }else{
//            dd('failed');
//        }

//        if (Session::has('key')){
//            $this->c = Session::get('key');
//        }


//        $this->test = collection_name::with('collectionLink')->get();

//        $this->test = collection_name::with('collectionLink.products')->get();

//        $this->test = collection_name::with('collectionLink.products')
//            ->where('name', '=', 'collection_2')
//            ->firstOrFail();
////        dd($this->test);

//        dd(Session::get('cart'));
//        if (Auth::check() && session()->has('cart')){
//            foreach (Session::get('cart') as $cart){
//                if ($cart['user_id'] == null){
//                    $cart['user_id'] = Auth::id();
//                    $this->test = $cart;
//                }else{return;}
//            }
//        }
//        $x = product_details::all();
//        $y = $x->where('return', '=', false);
//        dd($y);
//    }

    public function increase()
    {
        $this->c++;
        Session::put('key', $this->c);
        Session::save();
    }

    public function decrease()
    {
        $this->c--;
        Session::put('key', $this->c);
        Session::save();
    }

    public function click()
    {
//        redirect(request()->path());header("Refresh:0");
        $this->dispatchBrowserEvent('page_reload');
    }
}
