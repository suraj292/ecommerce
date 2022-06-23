<?php

namespace App\Http\Livewire\Admin;

use App\Models\admin_login;
use App\Models\admin_profile;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Profile extends Component
{
    public $name, $address, $gstin, $mobile, $email;
    public $reqAdminPassword, $showPassDiv, $nowCanChange, $username, $password;
    public function render()
    {
        return view('livewire.admin.profile')->layout('layouts.admin');
    }

    public function mount()
    {
        $user = admin_profile::find(1);
        $this->name = $user->name;
        $this->address = $user->address;
        $this->gstin = $user->gstin;
        $this->mobile = $user->mobile;
        $this->email = $user->email;
    }

    public function updateProfile()
    {
        $this->validate([
            'name'=>'required',
            'address'=>'required',
            'gstin'=>'required',
            'mobile'=>'required',
            'email'=>'required',
        ]);
        $user = admin_profile::find(1);
        $user->update([
            'name'=>$this->name,
            'address'=>$this->address,
            'gstin'=>$this->gstin,
            'mobile'=>$this->mobile,
            'email'=>$this->email,
        ]);
        $user->save();
        Session::flash('updated', 'Profile has been updated');
    }

    public function askAdminPassword()
    {
        $this->showPassDiv = true;
    }
    public function hideAdminPassword()
    {
        $this->showPassDiv = false;
    }

    public function adminPasswordConformation()
    {
        $this->validate(['reqAdminPassword'=>'required']);
        $admin = admin_login::find(1);
        if ($admin->password == $this->reqAdminPassword){
//            $admin->update(['password'=>$this->reqAdminPassword]);
            $this->showPassDiv = false;
            $this->nowCanChange = true;
        }else{
            Session::flash('wrong_password', 'Wrong Credential');
        }
    }

    public function updateAdminPassword()
    {
        $admin = admin_login::find(1);
        $admin->update([
            'password'=>$this->password
        ]);
        Session::flash('admin_updated', 'Admin Credential Updated');
    }
}
