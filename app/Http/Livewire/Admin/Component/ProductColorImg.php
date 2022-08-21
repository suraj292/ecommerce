<?php

namespace App\Http\Livewire\Admin\Component;

use App\Models\product_color_image;
use App\Models\select_product_color;
use Livewire\Component;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;

class ProductColorImg extends Component
{
    use WithFileUploads;

    public $colors, $productId, $colorId, $imgName, $product,
            $newImg1, $newImg2, $newImg3, $newImg4, $newImg5, $stockQuantity=1;

    public function render()
    {
        return view('livewire.admin.component.product-color-img');
    }
    public function mount(){
        $this->colors = select_product_color::all();
    }
    public function productColorImg(){
        $this->validate([
            'colorId' => 'required',
            'stockQuantity' => 'required',
            'newImg1' => 'required|image|max:2564',
            'newImg2' => 'nullable|image|max:2564',
            'newImg3' => 'nullable|image|max:2564',
            'newImg4' => 'nullable|image|max:2564',
            'newImg5' => 'nullable|image|max:2564',
        ]);
        if (!is_null($this->newImg1)){
//            $this->newImg1->store('public/product/large');
            $img1 = Image::make($this->newImg1->path())->resize(400, 500);
            $img1->save(storage_path('app/public/product/small/'.$this->newImg1->hashName()));
            $img2 = Image::make($this->newImg1->path())->resize(800, 1000);
            $img2->save(storage_path('app/public/product/large/'.$this->newImg1->hashName()));
        }
        if (!is_null($this->newImg2)){
//            $this->newImg2->store('public/product/large');
            $img1 = Image::make($this->newImg2->path())->resize(400, 500);
            $img1->save(storage_path('app/public/product/small/'.$this->newImg2->hashName()));
            $img2 = Image::make($this->newImg2->path())->resize(800, 1000);
            $img2->save(storage_path('app/public/product/large/'.$this->newImg2->hashName()));
        }
        if (!is_null($this->newImg3)){
//            $this->newImg3->store('public/product/large');
            $img1 = Image::make($this->newImg3->path())->resize(400, 500);
            $img1->save(storage_path('app/public/product/small/'.$this->newImg3->hashName()));
            $img2 = Image::make($this->newImg3->path())->resize(800, 1000);
            $img2->save(storage_path('app/public/product/large/'.$this->newImg3->hashName()));
        }
        if (!is_null($this->newImg4)){
//            $this->newImg4->store('public/product/large');
            $img1 = Image::make($this->newImg4->path())->resize(400, 500);
            $img1->save(storage_path('app/public/product/small/'.$this->newImg4->hashName()));
            $img2 = Image::make($this->newImg4->path())->resize(800, 1000);
            $img2->save(storage_path('app/public/product/large/'.$this->newImg4->hashName()));
        }
        if (!is_null($this->newImg5)){
//            $this->newImg5->store('public/product/large');
            $img1 = Image::make($this->newImg5->path())->resize(400, 500);
            $img1->save(storage_path('app/public/product/small/'.$this->newImg5->hashName()));
            $img2 = Image::make($this->newImg5->path())->resize(800, 1000);
            $img2->save(storage_path('app/public/product/large/'.$this->newImg5->hashName()));
        }
        $imgArray = [
            $this->newImg1,
            $this->newImg2,
            $this->newImg3,
            $this->newImg4,
            $this->newImg5,
        ];
        foreach (array_filter($imgArray) as  $key=>$y){
            $this->imgName[$key] = $y->hashName();
        }
        $this->imgName = implode(',', $this->imgName);


        $create_color_img = product_color_image::create([
           'product_id'=>$this->productId,
           'product_color_id'=>(int)$this->colorId,
           'stock'=>$this->stockQuantity,
           'color' => select_product_color::find($this->colorId)->color_image,
           'images'=> $this->imgName,
        ]);
        /*
        $create_color_img = new product_color_image([
            'product_id'=>$this->productId,
            'product_color_id'=>$this->colorId,
            'stock'=>$this->stockQuantity,
            'color' => select_product_color::find($this->colorId)->color_image,
            'images'=> $this->imgName,
        ]);
        $create_color_img->save();
        */
        if ($create_color_img){
            session()->flash('color_img', 'Color & Images has been added.');
            $this->colorId = null;
            $this->stockQuantity = 1;
            $this->newImg1 = null;
            $this->newImg2 = null;
            $this->newImg3 = null;
            $this->newImg4 = null;
            $this->newImg5 = null;
            $this->imgName = null;
            $this->emit('productColorUpdated', $this->productId);
        }
    }
    public function add_more_color(){
        session()->forget('color_img');
    }

    public function stockDec()
    {
        if ($this->stockQuantity >= 1){
            $this->stockQuantity--;
        }
    }

    public function stockInc()
    {
        $this->stockQuantity++;
    }
}
