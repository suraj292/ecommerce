<?php

namespace App\Http\Livewire\Admin\Component;

use App\Models\home_video_banner;
use Livewire\Component;

class HomeVideoBanner extends Component
{
    public $data, $heading, $paragraph, $buttonName, $buttonNavigation, $video;
    public function render()
    {
        return view('livewire.admin.component.home-video-banner')->layout('layouts.admin');
    }

    public function mount()
    {
        $this->data = home_video_banner::find(1);
    }

    public function heading()
    {
        $this->data->update(['heading' => $this->heading]);
        $this->heading = null;
        $this->data = home_video_banner::find(1);
    }
    public function paragraph()
    {
        $this->data->update(['para' => $this->paragraph]);
        $this->paragraph = null;
        $this->data = home_video_banner::find(1);
    }
    public function buttonName()
    {
        $this->data->update(['button_name' => $this->buttonName]);
        $this->buttonName = null;
        $this->data = home_video_banner::find(1);
    }
    public function buttonNavigation()
    {
        $this->data->update(['button_link' => $this->buttonNavigation]);
        $this->buttonNavigation = null;
        $this->data = home_video_banner::find(1);
    }
    public function video()
    {
        $this->data->update(['video' => $this->video]);
        $this->video = null;
        $this->data = home_video_banner::find(1);
    }

}
