<?php

namespace App\Http\Livewire\Admin\Component;

use Livewire\Component;

class Navbar extends Component
{
    public function render()
    {
        return view('livewire.admin.component.navbar');
    }
    public function signout(){
        session()->forget('admin');
        return redirect(route('admin_login'));
    }
}
