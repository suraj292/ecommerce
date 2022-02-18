<?php

namespace App\Http\Livewire\Public\Component;

use App\Models\admin_profile;
use Livewire\Component;

class Footer extends Component
{
    public $adminProfile;
    public function render()
    {
        return view('livewire.public.component.footer');
    }

    public function mount()
    {
     $this->adminProfile = admin_profile::find(1);
    }
}
