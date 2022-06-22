<?php

namespace App\Http\Livewire\Admin;

use App\Models\admin_login;
use Livewire\Component;

class Login extends Component
{
    public $username, $password;
    public function render()
    {
        return view('livewire.admin.login')
            ->layout('layouts.admin_login');
    }
//    protected $rules = [
//      'username'=>'required',
//      'password'=>'required|min:8'
//    ];
//    public function updated($propertyName){
//        $this->validateOnly($propertyName);
//    }
    public function login(){
        $this->validate([
            'username'=>'required',
            'password'=>'required|min:8'
        ]);
        $admin = admin_login::where('username', $this->username)->first();

        if ($this->username === 'admin' && $admin->password == $this->password){
            session()->put('admin', $admin->username);
            session()->save();
            $this->redirect(route('dashboard'));
        }elseif ($this->username === 'editor' && $admin->password == $this->password){
            session()->put('editor', $admin->username);
            session()->save();
            $this->redirect(route('dashboard'));
        }else{
            session()->flash('failed_login', 'Wrong Credential');
        }
    }
}
