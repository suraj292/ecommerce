<?php

namespace App\Http\Livewire\Public;

use App\Models\product_color_image;
use App\Models\product_details;
use App\Models\products as Product;
use App\Models\sub_category;
use App\Models\user_cart;
use Illuminate\Support\Facades\Auth;
use App\Models\product_category;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Livewire\Component;

class Products extends Component
{
    public $productCategoryId, $products, $sub_categories, $selectFilter;
    public $gender;
    public function render()
    {
        return view('livewire.public.products');
    }
    public function mount()//$category
    {
        $cat = request('category');
        $category = str_replace('-', ' ', $cat);
        $subCat = request('filter');
        $subCategory = str_replace('-', ' ', $subCat);

        if (is_null($subCat)){
            $this->products = Product::with('details', 'product_all_img')->where('category_name', $category)->get();
        }else{
            $this->products = Product::with('details', 'product_all_img')->where('sub_category_name', $subCategory)->get();
        }

        $categoryId = Product::where('category_name', $category)->first();
        if (is_null($categoryId)){
            return redirect(route('home'));
        }
        $this->sub_categories = sub_category::where('product_category_id', $categoryId->product_category_id)->get();

//        dd($this->products[0]->product_all_img);
//        dd($categoryId);
//        $this->productCategoryId = product_category::where('$category', $category)->value('id');
//        $this->sub_categories = sub_category::where('product_category_id', $this->productCategoryId)->get();

//        $this->gender = $category;
//        dd($this->products);
    }
    public function updatedSelectFilter($selectFilter)
    {
        $this->products = product_details::with([
            'product_color_img',
            'product'=>function($q){
                $q->where('product_category_id', $this->productCategoryId);
            }
        ])  ->orderBy('price', $selectFilter)
            ->get();
    }

    public function filterBySubCategory($id)
    {
        $this->products = product_details::with([
            'product_color_img','product'=>function($q) use ($id) {
                $q->where('sub_category_id', $id);
            }
        ])->get();
    }

    public function addToCart($id)
    {
        $product = product_details::with('product_color_img')->find($id);
        Auth::check() ? $user_id=Auth::id() : $user_id=null;
//        $product->offer_price ? $price = $product->offer_price : $price = $product->price;
        $image = explode(',', $product->product_color_img->images);
//        $product_color = product_color_image::where('product_id', '=', $product->product_id)->first();

        $addToCart = [
            'user_id' => $user_id,
            'product_id' => $product->product_id,
//            'product_color_id' => $product->product_color_img->product_color_id,// not used in model
            'select_product_color_id'=>$product->product_color_img->product_color_id,
            'product_color_image_id'=>$product->product_color_img->id,
            'title' => $product->title,
            'price' => (int)$product->price,
            'offer_price' => (int)$product->offer_price,
            'image' => $image[0],
            'quantity' => 1,
        ];
//        dd($addToCart);
        $this->emit('cartUpdated', $addToCart);
    }

    public function buyNow($id)
    {
        $product = product_details::with('product_color_img')->find($id);
        Auth::check() ? $user_id=Auth::id() : $user_id=null;
        $image = explode(',', $product->product_color_img->images);
        $data = [
            'user_id' => $user_id,
            'product_id' => $product->product_id,
//            'product_color_id' => $product->product_color_img->id,
            'select_product_color_id' => $product->product_color_img->getColor->id,
            'product_color_image_id' => $product->product_color_img->id,
            'title' => $product->title,
            'price' => $product->price,
            'offer_price' => $product->offer_price,
            'image' => $image[0],
            'quantity' => 1,
        ];
//        $this->addToCart($id);
        Cookie::queue('buyNow', json_encode($data), 60*60*3);
        $this->redirect(route('buyNow'));
    }

    public function subCategory($id)
    {
//        $this->products = Product::with('details', 'details.product_all_img')->where('sub_category_id', $id)->get();
        dd($id);
    }

}
