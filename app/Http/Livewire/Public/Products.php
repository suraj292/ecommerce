<?php

namespace App\Http\Livewire\Public;

use App\Models\product_color_image;
use App\Models\product_details;
use App\Models\sub_category;
use App\Models\user_cart;
use Illuminate\Support\Facades\Auth;
use App\Models\product_category;
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
    public function mount($category)//$category
    {
        $cat = str_replace('-', ' ', $category);
        $this->productCategoryId = product_category::where('product_category', $cat)->value('id');
        $this->sub_categories = sub_category::where('product_category_id', $this->productCategoryId)->get();

        $this->gender = $category;
//        dd($category);
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

    /*
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
            'product_color_id' => $product->product_color_img->product_color_id,
            'title' => $product->title,
            'price' => (int)$product->price,
            'offer_price' => (int)$product->offer_price,
            'image' => $image[0],
            'quantity' => 1,
        ];

        $this->emit('cartUpdated', $addToCart);
    }
    */

    public function addToWishlist($id)
    {

    }

}
