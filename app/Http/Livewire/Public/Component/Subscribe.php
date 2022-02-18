<?php

namespace App\Http\Livewire\Public\Component;

use App\Models\email_subscriber;
use Livewire\Component;

class Subscribe extends Component
{
    public $email;
    public function render()
    {
        return view('livewire.public.component.subscribe');
    }

    public function subscribe()
    {
        $this->validate([
            'email' => 'email|required|unique:email_subscriber,email|unique:users,email',
        ]);
        $email = new email_subscriber([
            'email'=> $this->email,
        ]);
        $email->save();
        session()->flash('email_subscribed');
    }
}
