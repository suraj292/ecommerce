<?php

namespace App\Http\Livewire\Public\Account;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Profile extends Component
{
    public $user, $name, $email, $mobile, $password;

    public function render()
    {
        return view('livewire.public.account.profile');
    }

    public function mount()
    {
        $this->user = Auth::user();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->mobile = $this->user->mobile;
    }

    public function changeName()
    {
        $user = Auth::user();
        $user->update(['name'=>$this->name]);
        Session::flash('name_changed', 'Name has been successfully updated.');
    }
}
