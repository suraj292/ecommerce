<?php

namespace App\Http\Livewire\Public\Account;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Password extends Component
{
    public $newPasswordDiv;
    public $newPassword = ['password1', 'password2'];
    public $password = ['currentPassword', 'newPassword', 'confirmNewPassword'];

    public function render()
    {
        return view('livewire.public.account.password');
    }

    public function mount()
    {
        $user = Auth::user();
        if (Hash::check('shopnow', $user->password)){
            $this->newPasswordDiv = true;
        }
    }

    public function saveNewPassword()
    {
        $this->validate([
            'newPassword.password1'=>'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'newPassword.password2'=>'required|same:newPassword.password1'
        ],[
            'newPassword.password1.required'=>'The new password field is required.',
            'newPassword.password1.regex'=>'The new password should contain lowercase, uppercase, numeric & special character.',
            'newPassword.password2.required'=>'The confirm password field is required.',
            'newPassword.password2.same'=>'The password and confirm password doesn\'t match.',
        ]);
        User::find(Auth::id())->update(['password'=> Hash::make($this->newPassword['password1'])]);
        Session::flash('password_saved', 'The password has been saved.');
    }

    public function changePassword()
    {
        $this->validate([
            'password.currentPassword'=>'required',
            'password.newPassword'=>'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'password.confirmNewPassword'=>'required|same:password.newPassword',
        ],[
            'password.currentPassword.required'=>'The current password field is required.',
            'password.newPassword.required'=>'The new password field is required.',
            'password.newPassword.regex'=>'The new password should contain lowercase, uppercase, numeric & special character.',
            'password.confirmNewPassword.required'=>'The confirm password field is required.',
            'password.confirmNewPassword.same'=>'The new password and confirm password doesn\'t match.',
        ]);
        User::find(Auth::id())->update(['password'=> Hash::make($this->password['newPassword'])]);
        Session::flash('password_updated', 'The password has been changed.');
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect(route('login'));
    }
}
