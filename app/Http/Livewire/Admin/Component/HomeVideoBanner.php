<?php

namespace App\Http\Livewire\Admin\Component;

use App\Models\home_video_banner;
use App\Models\HomeBannerImage;
use Livewire\Component;

class HomeVideoBanner extends Component
{
    public $data, $heading, $paragraph, $buttonName, $buttonNavigation, $video;
    public $banner, $leftImageLink, $leftImageRedirectLink, $rightImageLink, $rightImageRedirectLink;
    public function render()
    {
        return view('livewire.admin.component.home-video-banner')->layout('layouts.admin');
    }

    public function mount()
    {
        $this->data = home_video_banner::find(1);
        $this->banner = HomeBannerImage::find([1, 2]);
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

    public function left_image_link()
    {
        $this->validate(['leftImageLink'=>'required'],['leftImageLink.required'=>'Left Image Link required']);
        $imgLink = HomeBannerImage::find(1);
        $imgLink->update(['image_link'=>$this->leftImageLink]);
        $this->banner = HomeBannerImage::find([1, 2]);
        $this->leftImageLink = null;
    }

    public function left_image_redirect_link()
    {
        $this->validate(['leftImageRedirectLink'=>'required'],['leftImageRedirectLink.required'=>'Left Image redirect Link required']);
        $imgLink = HomeBannerImage::find(1);
        $imgLink->update(['redirect_link'=>$this->leftImageRedirectLink]);
        $this->banner = HomeBannerImage::find([1, 2]);
        $this->leftImageRedirectLink = null;
    }

    public function right_image_link()
    {
        $this->validate(['rightImageLink'=>'required'],['rightImageLink.required'=>'Right Image Link required']);
        $imgLink = HomeBannerImage::find(2);
        $imgLink->update(['image_link'=>$this->rightImageLink]);
        $this->banner = HomeBannerImage::find([1, 2]);
        $this->rightImageLink = null;
    }

    public function right_image_redirect_link()
    {
        $this->validate(['rightImageRedirectLink'=>'required'],['rightImageRedirectLink.required'=>'right Image redirect Link required']);
        $imgLink = HomeBannerImage::find(2);
        $imgLink->update(['redirect_link'=>$this->rightImageRedirectLink]);
        $this->banner = HomeBannerImage::find([1, 2]);
        $this->rightImageRedirectLink = null;
    }

}
