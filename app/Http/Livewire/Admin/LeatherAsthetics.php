<?php

namespace App\Http\Livewire\Admin;

use App\Models\LeatherAndAesthetics;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithFileUploads;

class LeatherAsthetics extends Component
{
    use WithFileUploads;
    public $images, $image, $category, $newImageDiv;
    public function render()
    {
        return view('livewire.admin.leather-asthetics')->layout('layouts.admin');
    }

    public function mount()
    {
        $this->images = LeatherAndAesthetics::latest()->get();
    }

    public function newImage()
    {
        $this->validate([
            'image'=>'required|max:5120',
            'category' =>'required'
        ]);

        if (is_string($this->image)){
            $file = $this->image;
            $this->category = 'video';
        }elseif ($this->image->getMimeType() == 'image/jpeg') {
            $this->image->store('public\leatherAesthetics');
            $file = $this->image->hashName();
        }

        $data = LeatherAndAesthetics::create([
            'file' => $file,
            'category' => $this->category,
            'likes' => 0,
        ]);
        $this->images->prepend($data);
        Session::flash('image_saved', 'Your Image has been successfully added.');
        $this->image = "";
        $this->category = "";
//        dd($file);
    }

    public function addCollection()
    {
        $this->newImageDiv = true;
    }
}
