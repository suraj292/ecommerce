<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class newUserEmailVerification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        /*
         * This configuration for production
         */
        $userMailID = $this->data['email'];
        Mail::send('mail.email_verification_demo', $this->data, function ($message) use ($userMailID){
            $message->to($userMailID)->subject('Email Verification');
        });
        /*
         * This configuration for testing porous
         * just comment above one and uncomment bottom one
         * web.php there is route with email
         * just go to browser and open/email than you can test smtp server
         */
//        $userMailID = "surajkumarsharma123@gmail.com";
//        Mail::send('mail.test', [], function ($message) use ($userMailID){
//            $message->to($userMailID)->subject('Email Verification');
//        });
    }
}
