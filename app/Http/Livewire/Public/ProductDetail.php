<?php

namespace App\Http\Livewire\Public;

use App\Models\product_color_image;
use App\Models\product_details;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Livewire\Component;

class ProductDetail extends Component
{
    public $product, $images, $color, $productId, $quantity=1, $product_color;

    public function render()
    {
        return view('livewire.public.product-detail');
    }
    public function mount($slug)
    {
        $title = str_replace('-', ' ', $slug);
        $this->productId = product_details::where('title', $title)->value('product_id');

        $this->product = product_details::where('product_id', $this->productId)->first();
        $this->color = product_color_image::where('product_id', $this->productId)->get();
//        $this->color = json_encode($color, false);
        $this->images = explode(',', $this->color[0]->images);
        $this->product_color = $this->color[0]->product_color_id;
//        dd($this->color);
    }

    public function getProductColor($array)
    {
        //$color = product_color_image::where('product_id', $this->productId)->get();
        //$this->images = null;
//        $this->images = explode(',', $this->color[$array]->images);
        $this->product_color = $this->color[$array]->product_color_id;
//        dd($this->images->images);
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
            'product_color_id' => $this->product_color,
            'title' => $product->title,
            'price' => $product->price,
            'offer_price' => $product->offer_price,
            'image' => $image[0],
            'quantity' => $this->quantity,
        ];
        $this->emit('cartUpdated', $addToCart);
    }

    public function decrement()
    {
        if (1 < $this->quantity){
            $this->quantity--;
        }
    }
    public function increment()
    {

        $this->quantity++;
//        dd($this->color);
    }

    public function buyNow($id)
    {
        $product = product_details::with('product_color_img')->find($id);
        Auth::check() ? $user_id=Auth::id() : $user_id=null;
        $image = explode(',', $product->product_color_img->images);
        $data = [
            'user_id' => $user_id,
            'product_id' => $product->product_id,
            'product_color_id' => $this->product_color,
            'title' => $product->title,
            'price' => $product->price,
            'offer_price' => $product->offer_price,
            'image' => $image[0],
            'quantity' => $this->quantity,
        ];
//        $this->addToCart($id);
        Cookie::queue('buyNow', json_encode($data), 60*60*3);
        $this->redirect(route('buyNow'));
    }
}
