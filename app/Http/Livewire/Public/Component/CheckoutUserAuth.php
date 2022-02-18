<?php

namespace App\Http\Livewire\Public\Component;

use App\Models\User;
use App\Models\user_verification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CheckoutUserAuth extends Component
{
    public $user, $regButton, $reqPassword, $password;
    public $mobile=['mobileDiv'=>false, 'mobileNumber', 'mobileNumberDisabled'=>false, 'otp'];

    public function render()
    {
        return view('livewire.public.component.checkout-user-auth');
    }

    public function userCheck()
    {
        $user = User::where('email', $this->user)->orWhere('mobile', $this->user)->first();
        if ($user){
            if (is_null($user->mobile_verified_at)){
                $this->mobile['mobileDiv'] = true;
                $this->mobile['mobileNumber'] = $user->mobile;
//                dd($this->mobileNumber);
//                Auth::attempt(['email'=>$user->email, 'password'=>$this->password]);
            }else{
                $this->reqPassword = true;
//                dd('user exists. and asking for password.');
            }
        }else{
            $this->regButton = true;
            Session::flash('user_not_exist', 'This Email/Mobile not Registered.');
        }
    }

    public function userLogin()
    {
        $user = User::where('email', $this->user)->orWhere('mobile', $this->user)->first();
        if (Auth::attempt(['email'=>$user->email, 'password'=>$this->password])){
            $this->redirect(route('checkout'));
//                $this->wrongPassword = 'Incorrect password';
//            Auth::user();
        }else{
            Session::flash('wrong_password', 'Incorrect credential');
        }
    }

    public function sentOTP()
    {
        $this->validate([
            'mobile.mobileNumber'=>'required|integer|digits:10',
        ],[
            'mobile.mobileNumber.required'=>'Mobile number Required',
            'mobile.mobileNumber.integer'=>'Mobile number should be integer only.',
            'mobile.mobileNumber.digits'=>'Mobile number should 10 digits only.',
        ]);
        $user = User::where('email', $this->user)
            ->orWhere('mobile', $this->user)
            ->first();
        if ($user->mobile != $this->mobile['mobileNumber']){
            $user->update([
                'mobile'=>$this->mobile['mobileNumber'],
            ]);
        }
        $otp = random_int(100000, 999999);
        $verification = user_verification::where('user_id', $user->id)->first();
        if ($verification){
            $verification->update(['mobile_otp'=>$otp,]);
        }else{
            user_verification::create(['user_id'=>$user->id,'mobile_otp'=>$otp,]);
        }
        $this->mobile['mobileNumberDisabled']=true;
    }

    public function confirmOTP()
    {
        $this->validate(['mobile.otp'=>'required|integer'],['mobile.otp.required'=>'OTP Required', 'mobile.otp.integer'=>'OTP should be integer only.']);
        $user = User::where('email', $this->user)
            ->orWhere('mobile', $this->user)
            ->first();
        $verification = user_verification::where('user_id', $user->id)->first();
        if ($verification->mobile_otp == $this->mobile['otp'] && $verification->updated_at->addMinutes(10) > now() ){
            $user->update(['mobile_verified_at'=>now()]);
//            Auth::attempt(['email' => $user->email, 'password'=>'shopnow']);
            Auth::loginUsingId($user->id);
            $verification->delete();
        }else{
            Session::flash('wrong_otp', 'OTP has been expired or incorrect.');
//            dd('wrong otp');
        }
        if (Auth::check()){
            $this->redirect(route('checkout'));
        }
    }
}
