<?php

namespace App\Http\Livewire\Public\Component;

use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;

class ResendEmailLink extends Component
{
    public $email;
    public function render()
    {
        return view('livewire.public.component.resend-email-link');
    }
    public function resend(){
        $user = User::with('user_verification')->where('email', $this->email)->first();
        if ($user == true){
            $code = Str::random(40);
            $user->user_verification->update([
                'email_verification_link' => $code,
            ]);
            $data = [
                'name'=>$user->name,
                'userId'=>Crypt::encrypt($user->id),
                'link'=>$code,
            ];
            $userMailID = $this->email;
            Mail::send('mail.email_verification', $data, function ($message) use ($userMailID){
                $message->to($userMailID);
                $message->subject('email verification');
            });
        }else{
            session()->flash('email_not_registered', 'This is not registered Email. ');
        }
    }
}
