<?php

namespace App\Http\Livewire\Public\Component;

use App\Models\User;
use App\Models\user_verification;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class EmailVerify extends Component
{
    public $user, $code;
    public function render()
    {
        return view('livewire.public.component.email-verify');
    }

    public function mount()
    {
        try {
            $id = Crypt::decrypt(request('id'));
            $varification = user_verification::find($id);
            $user = User::find($varification->user_id);

            if (is_int($id) && $varification){
                if ( now()->toDateTimeString() < $user->updated_at->addMinutes(16) && $varification->email_verification_link == request('verification')){
//                $user1 = User::find($userID);
                    $user->update([
                        'email_verified_at' => now()->toDateTimeString(),
                    ]);
                    $user->user_verification()->update([
                        'email_verification_link' => '',
                    ]);
                    session()->flash('email_verified', $user->email.' has been Verified.' );
                }else{
                    session()->flash('varification_failed', 'Verification failed Please try again by sending verification link.');
                }
            }else{
                session()->flash('varification_failed', 'Verification failed Please try again by sending verification link.');
            }
        }catch (DecryptException $e){
            session()->flash('varification_failed', 'Verification failed Please try again by sending verification link.');
        }
//        $userID = Crypt::decrypt($this->user);
//        $user = User::select('email', 'email_verified_at', 'email_verification_link', 'user_verification.updated_at')
//            ->join('user_verification', 'users.id', '=', 'user_verification.user_id')
//            ->find($userID);
//
//        if ($user->email_verified_at != null){
//            session()->flash('already_verified', 'Email has already verified. Please go to Forgot Password.' );
//        }elseif(now()->toDateTimeString() > $user->updated_at->addMinutes(15)){
//            session()->flash('link_expired', 'Link has been expired. ' );
//        }
        /*
        if ( now()->toDateTimeString() < $user->updated_at->addMinutes(16) && $user->email_verified_at == null && $user->email_verification_link == $this->code){
            $user1 = User::find($userID);
            $user1->update([
                'email_verified_at' => now()->toDateTimeString(),
            ]);
            $user1->user_verification()->update([
                'email_verification_link' => '',
            ]);
            session()->flash('email_verified', $user->email.' has been Verified.' );
        }
        */
//        dd($user->created_at);
    }
}
