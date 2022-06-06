<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Stocks extends Component
{
    public $stocks;
    public function render()
    {
        return view('livewire.admin.stocks')->layout('layouts.admin');
    }

    public function mount()
    {

    }

}
