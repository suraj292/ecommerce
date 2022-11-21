<?php

namespace App\Http\Livewire\Public;

use Illuminate\Support\Facades\Cookie;
use Livewire\Component;
use App\Models\LeatherAndAesthetics as Leather;

class LeatherAndAesthetics extends Component
{
    public $categories, $images, $ip;

    public function render()
    {
        return view('livewire.public.leather-and-aesthetics');
    }

    public function mount()
    {
        $this->categories = Leather::distinct('category')->pluck('category');
        $this->images = Leather::all();
    }

    public function like($id)
    {
        $ip = Cookie::get('ip');
        if ($ip != $this->ip){
            Cookie::queue('ip', $this->ip, 86400);
            $data = Leather::find($id);
            $data->increment('likes');
            $this->images = Leather::all();
        }
    }
}
