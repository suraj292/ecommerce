<?php

namespace App\Http\Livewire\Public\Component;

use App\Models\User;
use App\Models\user_verification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CheckoutUserAuth2 extends Component
{
    public $user, $emailPhone, $password, $mobileNumber, $otp;
    public $passDiv, $userReg, $otpDiv;

    public function render()
    {
        return view('livewire.public.component.checkout-user-auth2');
    }

    public function mount()
    {
        if (Auth::user()) {
            $this->user = Auth::user();
            $this->mobileNumber = $this->user->mobile;
        }
    }

    public function userLogin()
    {
        $user = User::where('email', $this->emailPhone)->orWhere('mobile', $this->emailPhone)->first();
        if ($user && !$this->password){
            $this->passDiv = true;
        }elseif (is_null($user)){
            Session::flash('not_registered_user', 'User Not Registered');
            $this->userReg = true;
        }elseif (Auth::attempt(['email'=>$user->email, 'password'=>$this->password])){
//            $this->redirect(route('checkout'));
            $this->emit('success');
        }else{
            Session::flash('wrong_password', 'Incorrect credential');
        }
//        dd(User::where('email', $this->emailPhone)->orWhere('mobile', $this->emailPhone)->first());
//        dd($user);
    }

    public function sendOTP()
    {
        $user = User::find(Auth::id());
        //update mobile number if changed
        if ($user->mobile != $this->mobileNumber){
            $user->update(['mobile'=>$this->mobileNumber]);
//            dd('update');
        }
        //OTP generation and validation
        $otp = random_int(100000, 999999);
        $verification = user_verification::where('user_id', $user->id)->first();
        if ($verification){
            $verification->update(['mobile_otp'=>$otp,]);
        }else{
            user_verification::create(['user_id'=>$user->id,'mobile_otp'=>$otp,]);
        }

        //sending otp to registered mobile
            // Account details
            $apiKey = urlencode('NmIzOTQyNTc0YjZlNGY0NjZlNDczNjQ3NTU3MTY1NzU=');
            // Message details
            $numbers = array('91'.$this->mobileNumber);
            $sender = urlencode('HOBHAV');
            $message = rawurlencode('Dear Customer, '.$otp.' is the OTP for your mobile verification at houseofbhavana.in. Thank you');

            $numbers = implode(',', $numbers);

            // Prepare data for POST request
            $data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender, 'message' => $message);
            // Send the POST request with cURL
            $ch = curl_init('https://api.textlocal.in/send/');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);
            // Process your response here
//            dd($response);
        $this->otpDiv = true;
    }

    public function checkOTP()
    {
        $verification = user_verification::where('user_id', Auth::id())->first();
        if ($verification->mobile_otp == $this->otp && $verification->updated_at->addMinutes(10) > now()){
            $verification->delete();
            $user = User::find(Auth::id());
            $user->update(['mobile_verified_at'=>now()]);
//            $this->redirect(route('checkout'));
            $this->dispatchBrowserEvent('page_reload');
        }else{
            Session::flash('incorrect_otp', 'OTP has been expired or incorrect.');
        }
    }
}
