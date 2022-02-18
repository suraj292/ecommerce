<?php

namespace App\Http\Livewire\Public;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class Login extends Component
{
    public $emailMobile, $password;

    public function render()
    {
        return view('livewire.public.login');
    }

//    protected $rules = [];

    public function login()
    {
        $this->validate([
            'emailMobile' => 'required',
            'emailMobile.required' => 'The Email or Mobile field is required.',
            'password' => 'required',
        ]);
        if (filter_var($this->emailMobile, FILTER_VALIDATE_EMAIL)){
            Auth::attempt(['email'=>$this->emailMobile, 'password'=>$this->password]);
        }else{
            Auth::attempt(['mobile'=>$this->emailMobile, 'password'=>$this->password]);
        }
        if (Auth::check()){
            return redirect(route('home'));
        }else{
            session()->flash('wrong_credential', 'Wrong Credential');
        }
//        Cookie::
    }
}
