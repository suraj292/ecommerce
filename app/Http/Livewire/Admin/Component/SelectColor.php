<?php

namespace App\Http\Livewire\Admin\Component;

use App\Models\admin_login;
use App\Models\select_product_color;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;

class SelectColor extends Component
{
    use WithFileUploads;
    public $colors, $newColor, $newColorImage, $colorId, $editColor, $newEditImage, $editImage, $deleteColorId, $adminPassword, $test;
    public $passwordDiv, $reqAdminPassword, $gotPassword;

    public function render()
    {
        return view('livewire.admin.component.select-color')->layout('layouts.admin');
    }

    public function mount(){
        $this->colors = select_product_color::latest('id')->get();
    }

    public function addColor(){
        $this->validate([
            'newColor' => ['required'],
            'newColorImage'=>'required'
            ]);
        if (!empty($this->newColorImage)){
            $name = $this->newColorImage->hashName();
            $img = Image::make($this->newColorImage->path())->resize(100, 100);
            $img->save(storage_path('app/public/color_image/'.$name));

            $color = select_product_color::create([
                'color_name'=>$this->newColor,
                'color_image'=>$name,
            ]);
            $this->colors->prepend($color);
            session()->flash('added', 'New Color added');
            $this->newColor = null;
            $this->newColorImage = null;
        }
    }

    public function getColor($id){
        $this->colorId = select_product_color::find($id);
        $this->editColor = $this->colorId->color_name;
        $this->editImage = $this->colorId->color_image;
    }

    public function updateColor(){
        //$x = $this->validate(['editColor' => ['required', 'unique:select_product_color,color'],]);
        if (!is_null($this->newEditImage)){
            $colorName = $this->newEditImage->hashName();
            $img = Image::make($this->newEditImage->path())->resize(100, 100);
            $img->save('storage/color_image/'.$colorName);
            Storage::delete('public/color_image/'.$this->colorId->color_image);
            $this->colorId->update([
                'color_name'=>$this->editColor,
                'color_image'=>$colorName,
            ]);
        }else{
            $this->colorId->update(['color_name'=>$this->editColor,]);
        }
        $this->redirect(route('admin.color'));
        session()->flash('updated', 'Color has been Updated.');
    }

    public function deleteColor($id){
        $this->deleteColorId = select_product_color::find($id);
        $this->deleteColorId->delete();
//        Storage::delete('public/color_image/'.$this->deleteColorId->color_image);
        Storage::delete(storage_path('app/public/color_image/'.$this->deleteColorId->color_image));
        $this->colors = select_product_color::latest('id')->get();
        $this->colorId = null;
        session()->flash('success_delete', 'Color has been deleted.');
    }

    public function showPasswordDiv()
    {
        $this->passwordDiv = true;
    }
    public function hidePasswordDiv()
    {
        $this->passwordDiv = false;
    }

    public function adminPasswordConformation()
    {
        $this->validate(['reqAdminPassword'=>'required']);
        $admin = admin_login::find(1);
        if ($admin->password == $this->reqAdminPassword){
            $this->passwordDiv = false;
            $this->gotPassword = true;
        }else{
            Session::flash('wrong_password', 'Wrong Credential');
        }
    }
}
