<?php

namespace App\Http\Livewire\Public;

use Illuminate\Support\Facades\Cookie;
use Livewire\Component;
use App\Models\LeatherAndAesthetics as Leather;

class LeatherAndAesthetics extends Component
{
    public $categories, $images, $ip;
    protected $listeners = ['ip'];

    public function ip($payload)
    {
        $cookie = Cookie::get('ip');
        if (is_null(json_decode($cookie))) {
            Cookie::queue('ip', $payload, 86400);
            $this->ip = Cookie::get('ip');
        }
    }
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
        if ($ip != "" || $ip != null){
            $img = Leather::find($id);
            $img->increment('likes');
            $this->images = Leather::all();
        }
    }
}
