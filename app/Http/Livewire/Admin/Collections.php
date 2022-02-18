<?php

namespace App\Http\Livewire\Admin;

use App\Models\collection_link;
use App\Models\collection_name;
use App\Models\product_category;
use App\Models\products;
use App\Models\sub_category;
use Livewire\Component;

class Collections extends Component
{
    public $collections, $newCollection, $addCollection, $getCollection, $categories, $subCategory, $products, $selectedCategory, $selectedSubCategory, $selectedProduct,
            $addProduct, $updatedCollectionId;
    public function render()
    {
        return view('livewire.admin.collections')->layout('layouts.admin');
    }

    public function mount()
    {
        $this->collections = collection_name::with('collectionLink')->latest('id')->get();
    }

    public function addCollection()
    {
        $this->addCollection = true;
    }

    public function saveCollection()
    {
        $this->validate(['newCollection'=>'required']);
        $collection = new collection_name(['name' => $this->newCollection]);
        $collection->save();
        $this->newCollection = '';
        $this->addCollection = false;
        $this->collections->prepend($collection);
        session()->flash('added', 'New Collection Added.');
    }

    public function getCollection($id)
    {
        $this->getCollection = collection_name::with('collectionLink.products')->find($id);
        $this->categories = product_category::all();
        $this->updatedCollectionId = $id;
    }

    public function deleteCollection($id)
    {
        $collection = collection_name::find($id);
        $collection->delete();
        $this->collections = collection_name::latest('id')->get();
        session()->flash('deleted', 'Collection Deleted');
    }

    public function updatedSelectedCategory($selectedCategory)
    {
        $this->subCategory = sub_category::where('product_category_id', $selectedCategory)->get();
    }

    public function updatedSelectedSubCategory($selectedSubCategory)
    {
        $this->products = products::with('details', 'product_color_img')->where('sub_category_id', $selectedSubCategory)->get();
    }

    public function addProduct()
    {
        if ($this->addProduct == true){
            $this->addProduct = false;
        }else{
            $this->addProduct = true;
        }
    }

    public function saveToCollection()
    {
        $collection = new collection_link([
            'collection_name_id' => $this->getCollection->id,
            'product_id' => (int)$this->selectedProduct,
        ]);
        $collection->save();
        $this->addProduct = false;
        $this->getCollection = collection_name::with('collectionLink.products')->find($this->updatedCollectionId);
        $this->collections = collection_name::with('collectionLink')->latest('id')->get();
        session()->flash('product_added', 'Product Added to Collection');
    }

    public function deleteProduct($id)
    {
        $product_collection = collection_link::find($id);
        $product_collection->delete();
        $this->getCollection = collection_name::with('collectionLink.products')->find($this->updatedCollectionId);
        session()->flash('product_removed', 'Product Removed from Collection');
    }
}
