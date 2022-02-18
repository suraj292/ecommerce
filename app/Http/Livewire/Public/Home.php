<?php

namespace App\Http\Livewire\Public;

use App\Models\collection_banner;
use App\Models\slider;
//use Illuminate\Filesystem\Cache;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Livewire\Component;

class Home extends Component
{
    public $slides, $banners;
    public function render()
    {
        return view('livewire.public.home');
    }
    public function mount(){
        if (Cache::has('slides') && Cache::has('banners')){
            $this->slides = json_decode(Cache::get('slides'));
            $this->banners = json_decode(Cache::get('banners'));
        }else{
            $this->slides = slider::all();
            Cache::put('slides', $this->slides, 2 * 60);
            $this->banners = collection_banner::all();
            Cache::put('banners', $this->banners, 2 * 60);
        }
    }
}
