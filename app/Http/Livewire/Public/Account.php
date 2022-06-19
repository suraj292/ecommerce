<?php

namespace App\Http\Livewire\Public;

use App\Models\user_address;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Account extends Component
{
    public $account, $user, $address;
    public function render()
    {
        return view('livewire.public.account');
    }

    public function mount($account='home')
    {
        $this->account = $account;
        $this->user = Auth::user();
        $this->address = user_address::where('user_id', Auth::id())
            ->where('default', true)
            ->first();
    }

    public function switchHome()
    {
        $this->account = 'home';
    }
    public function switchProfile()
    {
        $this->account = 'profile';
    }
    public function switchAddress()
    {
        $this->account = 'address';
    }
    public function switchOrder()
    {
        $this->account = 'order';
    }
    public function switchPassword()
    {
        $this->account = 'password';
    }

    public function switchWallet()
    {
        $this->account = 'wallet';
    }

    public function logout()
    {
        Auth::logout();
        $this->redirect('login');
    }
}
