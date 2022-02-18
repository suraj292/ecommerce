<?php

namespace App\Http\Livewire\Admin\Component;

use App\Models\admin_login;
use App\Models\product_category;
use JetBrains\PhpStorm\ArrayShape;
use Livewire\Component;

class ProductCategory extends Component
{
    public $categories, $newCategory,
            $categoryId, $adminPassword,
            $getCategory, $editCategory,
            $newHsn, $editHsn;
    public function render()
    {
        return view('livewire.admin.component.product-category')
            ->layout('layouts.admin');
    }
    public function mount(){
        $this->categories = product_category::latest('id')->get();
    }
    public function rules(){
        return [
            'newCategory' => ['required', 'unique:product_category,product_category'],
            'newHsn' => 'required',
        ];
    }
    public function submit(){
        $this->validate();
        $new_category = product_category::create(['product_category'=>$this->newCategory, 'hsn'=>$this->newHsn]);
        $this->categories->prepend($new_category);
        session()->flash('success', 'New Category has been added');
        $this->newCategory="";
        $this->newHsn="";
    }
    public function delete($id){
        $this->categoryId = $id;
    }
    public function cancelDelete(){
        $this->categoryId = null;
    }
    public function confirmDelete(){
        $this->validate(['adminPassword' => 'required']);
      $admin = admin_login::find(1);
      if($this->adminPassword == $admin->password){
          $delete_category = product_category::find($this->categoryId);
          $delete_category->delete();
          $this->categories = $this->categories->except($this->categoryId);
          session()->flash('success_delete', 'successfully deleted category.');
          $this->categoryId = null;
      }else{
          session()->flash('wrong_pass', 'Please enter correct password.');
      }
    }
    public function getCategory($id){
        $this->getCategory = product_category::find($id);
        $this->editCategory = $this->getCategory->product_category;
        $this->editHsn = $this->getCategory->hsn;
    }
    public function update(){
        $this->validate(['editCategory' => 'required', 'editHsn'=>'required']);
        $this->getCategory->update(['product_category'=>$this->editCategory, 'hsn'=>$this->editHsn]);
        $this->categories = product_category::all();
        $this->getCategory = null;
        $this->editCategory = "";
        $this->editHsn = "";
        $this->categories = product_category::latest('id')->get();
        session()->flash('category_updated', 'Category name has been updated.');
    }
}
