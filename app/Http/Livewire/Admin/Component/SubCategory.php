<?php

namespace App\Http\Livewire\Admin\Component;

use App\Models\product_category;
use App\Models\sub_category;
use Livewire\Component;

class SubCategory extends Component
{
    public $categories, $subCategories,  $selectedSubCategory,
        $newSubCategory, $selectedCategory, $editSubCategory;
    public function render()
    {
        return view('livewire.admin.component.sub-category')->layout('layouts.admin');
    }
    public function mount(){
        $this->categories = product_category::all();
//        $y = product_category::addSelect([
//            'sub_categorys' => sub_category::select('sub_category')->whereColumn('product_category_id', 'id'),
//        ])->get();
//        $x = sub_category::addSelect([
//            'product_category' => product_category::select('product_category')->whereColumn('id', 'product_category_id'),
//        ])->get();
    }
    public function updatedSelectedCategory($selectedCategory){
        $this->subCategories = sub_category::where('product_category_id', $selectedCategory)->latest('id')->get();
    }
    public function save(){
        $this->validate(['newSubCategory'=>'required',]);
        $sub_category = sub_category::create(['product_category_id'=>$this->selectedCategory, 'sub_category'=>$this->newSubCategory]);
        $this->subCategories->prepend($sub_category);
        session()->flash('added', 'New Sub Category has been added.');
        $this->newSubCategory = "";
    }
    public function getSubCategory($id){
        $this->selectedSubCategory = sub_category::find($id);
        $this->editSubCategory = $this->selectedSubCategory->sub_category;
    }
    public function edit(){
        $this->validate(['editSubCategory'=>'required',]);
        $this->selectedSubCategory->update(['sub_category'=>$this->editSubCategory]);
        $this->subCategories = sub_category::where('product_category_id', $this->selectedCategory)->latest('id')->get();
        $this->selectedSubCategory = null;
        session()->flash('success_edit', 'Sub Category has been updated.');
    }
    public function delete($id){
        $category = sub_category::find($id);
        $category->delete();
        $this->subCategories = sub_category::where('product_category_id', $this->selectedCategory)->latest('id')->get();
        session()->flash('success_delete', 'Sub Category has been deleted.');
    }
}
