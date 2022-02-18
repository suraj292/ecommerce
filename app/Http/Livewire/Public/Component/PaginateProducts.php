<?php

namespace App\Http\Livewire\Public\Component;

use App\Models\product_details;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class PaginateProducts extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $gender, $productCategoryId;

    public function render()
    {

        if ($this->gender=='male'){
            $products = \App\Models\products::with('product_color_img')
                ->join('product_details', 'products.id', '=', 'product_details.product_id')
                ->where('gender', '!=', 'female')
                ->paginate(12);
        } elseif ($this->gender=='female'){
            $products = \App\Models\products::with('product_color_img')
                ->join('product_details', 'products.id', '=', 'product_details.product_id')
                ->where('gender', '!=', 'male')
                ->paginate(12);
        } else {
            $products = \App\Models\products::with('product_color_img')
                ->join('product_details', 'products.id', '=', 'product_details.product_id')
                ->where('product_category_id', $this->productCategoryId)
                ->paginate(12);
        }

        return view('livewire.public.component.paginate-products', ['products'=>$products]);
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
            'product_color_id' => $product->product_color_img->product_color_id,
            'title' => $product->title,
            'price' => (int)$product->price,
            'offer_price' => (int)$product->offer_price,
            'image' => $image[0],
            'quantity' => 1,
        ];

        $this->emit('cartUpdated', $addToCart);
    }
}
