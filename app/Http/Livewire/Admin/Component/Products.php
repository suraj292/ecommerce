<?php

namespace App\Http\Livewire\Admin\Component;

use App\Models\product_category;
use App\Models\product_color;
use App\Models\product_details;
use App\Models\sub_category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Products extends Component
{
    public $categories, $subCategories, $categoryID, $subCategoryID, $products, $productId;
    public $addProductDiv, $editProductId;
    public $addProduct=[
        'product_id', 'title', 'dimension', 'description', 'care_instruction',
        'specification', 'price', 'offer_price', 'gender', 'return',
        'sale', 'discount', 'italian'
    ];
    public $editProduct=[
        'product_id', 'title', 'dimension', 'description', 'care_instruction',
        'specification', 'price', 'offer_price', 'gender', 'return',
        'sale', 'discount', 'italian'
    ];
    public function render()
    {
        return view('livewire.admin.component.products')->layout('layouts.admin');
    }

    public function mount()
    {
        $this->categories = product_category::all();
        $this->addProduct['specification']=[''];
    }

    public function selectedCategory($id)
    {
        $this->subCategories = sub_category::where('product_category_id', $id)->get();
        $this->categoryID = $id;
        $this->products = null;
        $this->addProductDiv = null;
    }

    public function selectedSubCategory($id)
    {
        $this->products = \App\Models\products::with('details', 'product_color_img')
            ->where('sub_category_id', $id)->get();
        $this->subCategoryID = $id;
        $this->addProductDiv = null;
        $this->editProductId = null;
    }
    public function addSpecList()
    {
        $arr=[''];
        array_push($this->addProduct['specification'], $arr);
    }

    public function removeSpecList($key)
    {
        unset($this->addProduct['specification'][$key]);
    }
    public function saveNewProduct()
    {
        $this->validate([
            'addProduct.title'=>'required',
            'addProduct.dimension'=>'required',
            'addProduct.description'=>'required',
            'addProduct.care_instruction'=>'required',
            'addProduct.specification'=>'required',
            'addProduct.price'=>'required|integer',
            'addProduct.offer_price'=>'integer',
        ]);
        $specification = implode(',', $this->addProduct['specification']);
        $product_details = new product_details([
//            'product_id'=>$this->addProduct,
            'title'=>$this->addProduct['title'],
            'dimension'=>$this->addProduct['dimension'],
            'description'=>$this->addProduct['description'],
            'care_instruction'=>$this->addProduct['care_instruction'],
            'specification'=>$specification,
            'gender'=>$this->addProduct['gender'],
            'price'=>$this->addProduct['price'],
            'offer_price'=>$this->addProduct['offer_price'],
            'return'=>$this->addProduct['return'],
            'sale'=>$this->addProduct['sale'],
            'discount'=>$this->addProduct['discount'],
            'italian'=>$this->addProduct['italian'],
        ]);
        $product_created = \App\Models\products::create([
            'product_category_id' => $this->categoryID,
            'sub_category_id' => $this->subCategoryID,
        ])->details()->save($product_details);

        $this->products = \App\Models\products::with('details', 'product_color_img')
            ->where('sub_category_id', $this->subCategoryID)
            ->get();

        $this->productId = $product_created->id;
        session()->flash('product_detail', 'Product Detail has been saved.');
    }

    public function addProduct()
    {
        $this->addProductDiv = true;
    }

    public function editProduct($id)
    {
        $this->addProductDiv = false;
        $this->editProductId = $id;
        $product = product_details::where('product_id', $id)->first();
        $this->editProduct['title'] = $product->title;
        $this->editProduct['dimension'] = $product->dimension;
        $this->editProduct['description'] = $product->description;
        $this->editProduct['care_instruction'] = $product->care_instruction;
        $this->editProduct['specification'] = explode(',', $product->specification);
        $this->editProduct['gender'] = $product->gender;
//        $this->editProduct['title'] = $product->title;
        $this->editProduct['price'] = $product->price;
        $this->editProduct['offer_price'] = $product->offer_price;
        $this->editProduct['return'] = $product->return;
        $this->editProduct['sale'] = $product->sale;
        $this->editProduct['discount'] = $product->discount;
        $this->editProduct['italian'] = $product->italian;
//        dd($this->editProduct['specification']);
//        dd($id);
    }

}
