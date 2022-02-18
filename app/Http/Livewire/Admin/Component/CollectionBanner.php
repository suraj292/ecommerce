<?php

namespace App\Http\Livewire\Admin\Component;

use App\Models\collection_banner;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class CollectionBanner extends Component
{
    use WithFileUploads;
    public $banners, $newItem, $newOffer, $newBgColor="#650101", $newImg, $newBannerLink,
            $getBannerId, $editItem, $editOffer, $editBgColor, $editImg, $editBannerLink;
    public function render()
    {
        return view('livewire.admin.component.collection-banner')
            ->layout('layouts.admin');
    }
    public function mount(){
        $this->banners = collection_banner::all();
    }
    protected $rules = [
        'newItem' => 'max:12',
        'newOffer' => 'max:10',
        'newBgColor' => 'required',
        'newImg' => 'image|max:150', //150kb max
        'editItem' => 'max:12',
        'editOffer' => 'max:10',
        'editBgColor' => 'required',
        'editImg' => 'required',

    ];
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }
    public function newBanner(){
        if (!is_null($this->newImg)) {
            $this->newImg->store('public/slider');
            $newBanner = collection_banner::create([
                'banner_link' => $this->newBannerLink,
                'bg_color' => $this->newBgColor,
                'image' => $this->newImg->hashName(),
                'offer' => $this->newOffer,
                'item' => $this->newItem,
            ]);
            if ($newBanner){
                $this->redirect(route('collection_banner'));
            }
        }else{
            session()->flash('img_required', 'Image Required');
        }
    }
    public function getBanner($id){
        if (!is_null($id)){
            $this->getBannerId = collection_banner::find($id);
            $this->editItem = $this->getBannerId->item;
            $this->editOffer = $this->getBannerId->offer;
            $this->editBgColor = $this->getBannerId->bg_color;
            $this->editBannerLink = $this->getBannerId->banner_link;
        }
    }
    public function editBanner(){
        if (is_null($this->editImg)){
            $this->editImg = $this->getBannerId->image;
        }else{
            $this->editImg->store('public/slider');
            $this->editImg = $this->editImg->hashName();
            Storage::delete('public/slider/'.$this->getBannerId->image);
        }
        $editBannerSave = collection_banner::where('id', $this->getBannerId->id)
            ->update([
                'banner_link' => $this->editBannerLink,
                'bg_color' => $this->editBgColor,
                'image' => $this->editImg,
                'offer' => $this->editOffer,
                'item' => $this->editItem,
            ]);
        if ($editBannerSave){
            $this->redirect(route('collection_banner'));
        }
    }
    public function deleteBanner($id){
        $deleteBanner = collection_banner::find($id);
        Storage::delete('public/slider/'.$deleteBanner->image);
        $deleteBanner->delete();
        $this->redirect(route('collection_banner'));
    }
}
