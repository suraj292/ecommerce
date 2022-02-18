<?php

namespace App\Http\Livewire\Admin\Component;

use App\Models\product_color_image;
use App\Models\product_details;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProduct extends Component
{
    use WithFileUploads;

    public $editProductId, $product, $images, $selectedColor, $productColorId, $imgDiv, $newImage, $addNewColor, $oldImgStk,
        $editProductTitle, $editProductDimension, $editProductDescription, $editProductCareInstruction, $editProductPrice, $editProductOfferPrice, $editProductReturn,
        $editProductSale, $editProductDiscount, $editStock, $editGender, $editProductItalian, $specList, $editProductSpecification;
    protected $listeners = ['productColorUpdated'];
    public function render()
    {
        return view('livewire.admin.component.edit-product');
    }
    public function mount(){
        $this->product = \App\Models\products::with('details')->find($this->editProductId);
        $this->editProductTitle = $this->product->details->title;
        $this->editProductDimension = $this->product->details->dimension;
        $this->editProductDescription = $this->product->details->description;
        $this->editProductCareInstruction = $this->product->details->care_instruction;
        $this->editProductSpecification = explode(',', $this->product->details->specification);
        $this->editGender = $this->product->details->gender;
        $this->editProductPrice = $this->product->details->price;
        $this->editProductOfferPrice = $this->product->details->offer_price;
        $this->editProductReturn = $this->product->details->return;
        $this->editProductSale = $this->product->details->sale;
        $this->editProductDiscount = $this->product->details->discount;
        $this->oldImgStk = product_color_image::with('getColor')->where('product_id', $this->editProductId)->get();
    }
    public function getProductColorId($id){
        // this is for editing images of color
        $colorImgTable = product_color_image::with('getColor')->find($id);
        $this->selectedColor = $colorImgTable->getColor->color_image;
        $this->images = explode(',', $colorImgTable->images);
        $this->productColorId = $id;
        $this->editStock = $colorImgTable->stock;
    }

    public function stockInc()
    {
        $this->editStock++;
    }

    public function stockDec()
    {
        if (1 <= $this->editStock){
            $this->editStock--;
        }
    }

    public function editProductDetails()
    {
        $this->validate([
            'editProductTitle' => 'required|max:100',
            'editProductDimension' => 'required|max:100',
            'editProductDescription' => 'required|max:250',
            'editProductCareInstruction' => 'required|max:250',
            'editProductPrice' => 'required|integer',
            'editProductOfferPrice' => 'integer',
        ]);

        $product = product_details::where('product_id', $this->editProductId)->firstOrFail();
        $product->update([
            'title'=>$this->editProductTitle,
            'dimension'=>$this->editProductDimension,
            'description'=>$this->editProductDescription,
            'care_instruction'=>$this->editProductCareInstruction,
            'specification'=>implode(',', $this->editProductSpecification),
            'gender'=>$this->editGender,
            'price'=>$this->editProductPrice,
            'offer_price'=>$this->editProductOfferPrice,
            'return'=>$this->editProductReturn,
            'sale'=>$this->editProductSale,
            'discount'=>$this->editProductDiscount,
            'italian'=>$this->editProductItalian,
        ]);
        session()->flash('product_detail_updated', 'Product details has been updated');
//        dd(implode(',', $this->editProductSpecification));

    }

    public function productNewImg()
    {
//        $this->validate(['newImage'=>'dimensions:min_width=50,min_height=50,max_width=700,max_height=700']);
        $saveImg = product_color_image::find($this->productColorId);
        if (!is_null($this->newImage)){
            $this->newImage->store('public/product');
            array_push($this->images, $this->newImage->hashName());
            $img = implode(',', $this->images);
            $saveImg->update(['images'=> $img, 'stock' => $this->editStock]);
            $this->images = explode(',', $saveImg->images);
        }else{
            $saveImg->update(['stock' => $this->editStock]);
        }
        $this->imgDiv = false;
        $this->newImage = null;
        $this->images = null;
        $this->oldImgStk = product_color_image::where('product_id', $this->editProductId)->get();
        session()->flash('img_updated', 'Images & Stock Updated.');
    }

    public function deleteImg($key)
    {
        $imgDel = $this->images[$key];
        Storage::delete('public/product/'.$imgDel);
        $newImgArray = $this->images; unset($newImgArray[$key]);

        $newImgArray =implode(',', $newImgArray);
        $del = product_color_image::find($this->productColorId);
        $del->update([
            'images' => $newImgArray,
        ]);
        $displayUpdatedImg = $del->images;
        $this->images = explode(',', $displayUpdatedImg);

    }
    public function addImgDiv(){
        $this->imgDiv = true;
    }

    public function deleteColorImg($id){
        //deleting color with there all 5 Images
        $x = product_color_image::find($id);
        $img = explode(',', $x->images);
        foreach ($img as $image){
            Storage::delete('public/product/small/'.$image);
            Storage::delete('public/product/large/'.$image);
        }
        $x->delete();
        $this->images = null;
        $this->oldImgStk = product_color_image::where('product_id', $this->editProductId)->get();
        //$this->product = \App\Models\products::with('details', 'product_all_img')->find($this->editProductId);
    }

    public function addColor(){
        // this function is used for toggle "add color"
        if ($this->addNewColor == null){
            $this->addNewColor = $this->editProductId;
        }
        elseif ($this->addNewColor != null){
            $this->addNewColor = null;
        }
    }
    public function productColorUpdated($id)
    {
        $this->product = \App\Models\products::with('details', 'product_all_img')->find($id);
    }

    public function addSpecList()
    {
//        $list = explode(',', $this->editProductSpecification);
        $arr=[];
        array_push($this->editProductSpecification, $arr);
    }
    public function removeSpecList($key)
    {
        unset($this->editProductSpecification[$key]);
    }
}
