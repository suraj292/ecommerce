<?php

namespace App\Http\Livewire\Admin\Component;

use App\Models\slider;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Slides extends Component
{
    use WithFileUploads;
    public $slides, $newImg, $newTitle, $newSubTitle, $newButtonLink, $newButtonName,
        $editSlide, $editImg, $editTitle, $editSubTitle, $editButtonLink, $editButtonName;

    public function render()
    {
        return view('livewire.admin.component.slides')->layout('layouts.admin');
    }
    public function mount(){
        $this->slides = slider::all();
    }

    protected $rules = [
        'newImg' => 'image|max:150', // 150kb Max
        'newTitle' => 'max:30',
        'newSubTitle' => 'max:15',
        'newButtonName' => 'max:10',
        'editImg' => 'image|max:150', // 150kb Max
        'editTitle' => 'max:30',
        'editSubTitle' => 'max:15',
        'editButtonName' => 'max:10'
    ];
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }
    public function newSlide(){
        if (!is_null($this->newImg)){
            $this->newImg->store('public/slider');
            $slideSave = slider::create([
                'image' => $this->newImg->hashName(),
                'h4' => $this->newTitle,
                'h1' => $this->newSubTitle,
                'button_link' => $this->newButtonLink,
                'button_name' => $this->newButtonName,
            ]);
            if ($slideSave){
                $this->redirect(route('slider'));
            }
        }else{
            session()->flash('img_require', 'Image can\'t be empty');
        }
    }
    public function deleteSlide($id){
        $slide = slider::find($id);
        Storage::delete('public/slider/'.$slide->image);
        $slide->delete();
        $this->redirect(route('slider'));
    }
    public function getSlide($id){
        if (!is_null($id)){
            $this->editSlide = slider::find($id);
            $this->editTitle = $this->editSlide->h4;
            $this->editSubTitle = $this->editSlide->h1;
            $this->editButtonLink = $this->editSlide->button_link;
            $this->editButtonName = $this->editSlide->button_name;
        }
    }
    public function editSlide(){

        if (is_null($this->editImg)) {
            $this->editImg = $this->editSlide->image;
        }else{
            $this->editImg->store('public/slider');
            $this->editImg = $this->editImg->hashName();
            Storage::delete('public/slider/'.$this->editSlide->image);
        }
        $editSave = slider::where('id',$this->editSlide->id)
            ->update([
                'image' => $this->editImg,
                'h4' => $this->editTitle,
                'h1' => $this->editSubTitle,
                'button_link' => $this->editButtonLink,
                'button_name' => $this->editButtonName,
            ]);
        if ($editSave){
            $this->redirect(route('slider'));
        }
    }
}
