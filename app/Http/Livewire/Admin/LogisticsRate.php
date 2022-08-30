<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class LogisticsRate extends Component
{
    public $fromPin='201005', $toPin, $length, $width, $height, $weight, $paymentMode, $mrp;

    public function render()
    {
        return view('livewire.admin.logistics-rate')->layout('layouts.admin');
    }

    public function checkLogisticsRate()
    {
        $this->validate([
            'fromPin'=>'required|digits:6',
            'toPin'=>'required|digits:6',
            'length'=>'required',
            'width'=>'required',
            'height'=>'required',
            'weight'=>'required',
            'paymentMode'=>'required',
            'mrp'=>'required'
        ]);

    }

}
