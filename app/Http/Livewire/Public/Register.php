<?php

namespace App\Http\Livewire\Public;

use App\Jobs\newUserEmailVerification;
use App\Models\user_verification;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Validator;
//use Laravel\Fortify\Contracts\CreatesNewUsers;

class Register extends Component
{
    public $register = [
        'fullName'=>'',
        'dob'=>'',
        'email'=>'',
        'mobile'=>'',
        'password'=>'',
        'confirmPassword'=>'',
    ];
    public function render()
    {
        return view('livewire.public.register');
    }

    public function register()
    {
        $this->validate([
            'register.fullName' => 'required|max:50',
            'register.email' => ['required','email','unique:Users,email'],
            'register.mobile' => 'required|integer|digits:10|unique:Users,mobile',
            'register.password' => 'required|min:8',
            'register.confirmPassword' => 'required|same:register.password',
        ],[
            'register.fullName.required' => 'Name Required',
            'register.fullName.max' => 'Name can\'t more than 50 char',
            'register.email.required' => 'Email Required',
            'register.email.email' => 'Please enter valid Email ID',
            'register.email.unique' => 'Email ID already exists.',//
            'register.mobile.required' => 'Mobile number Required',
            'register.mobile.integer' => 'Enter valid Mobile number',
            'register.mobile.digits' => 'Mobile number should equal 10 Digits.',
            'register.mobile.unique' => 'Mobile number already exists.',
            'register.password.required' => 'Password Required',
            'register.password.min' => 'Password Should more than 8 char',
            'register.confirmPassword.required' => 'Confirm Password Required',
            'register.confirmPassword.same' => 'Confirm Password should same as Password',
        ]);

        // saving new user with virification link & mobile otp
        $verification = new user_verification([
            'email_verification_link' => Str::random(40),
            'mobile_otp' => random_int(100000, 999999),
        ]);
        $newUser = User::create([
            'name' => $this->register['fullName'],
            'dob' => $this->register['dob'],
            'email' => $this->register['email'],
            'mobile' => $this->register['mobile'],
            'social_network' => 'EMAIL',
            'password' => Hash::make($this->register['password']),
        ])->user_verification()->save($verification);

        $userID = Crypt::encrypt($newUser->id);

        //sending email verification link of new user
        //data to send on email
        $data = [
            'name'=>$this->register['fullName'],
            'userId'=>$userID,
            'link'=>$verification->email_verification_link,
            'email'=>$this->register['email'],
        ];
//        $email = new SendGridMail();
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("no-reply@houseofbhavana.in", 'House Of Bhavana');
        $email->setSubject("Account Verification");
        $email->addTo($this->register['email'], $this->register['fullName']);
//        $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
        $email->addContent(
            "text/html", "<strong>".$data['link']."</strong>"
        );
        $sendgrid = new \SendGrid('xxxxxxx');
        try {
            $response = $sendgrid->send($email);
            //print $response->statusCode() . "\n";
            //print_r($response->headers());
            //print $response->body() . "\n";
            session()->flash('verifyEmail', 'Email verification Link has been sent to your Email: '.$this->register['email']);
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }
        //$userMailID = $this->register['email'];
//        newUserEmailVerification::dispatch($data);


    }

    public function hgoogle()
    {
        Socialite::driver('google')->redirect();
//        dd($x);
    }

}
