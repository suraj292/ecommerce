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
    public $product, $images, $color, $productId, $quantity=1, $productd, $product_color;

    public function render()
    {
        return view('livewire.public.product-detail');
    }
    public function mount($slug)
    {
        $title = str_replace('-', ' ', $slug);
//        $this->productId = product_details::where('title', $title)->value('product_id');

//        $this->product = product_details::where('product_id', $this->productId)->first();
        $this->product = product_details::where('title', $title)->first();
        $this->color = product_color_image::where('product_id', $this->product->id)->get();
//        $this->color = json_encode($color, false);
        $this->images = explode(',', $this->color[0]->images);
        $this->productd = $this->color[0];
//        $this->stock = $this->color[0]->stock;
//        dd($this->productd);
    }

    public function getProductColor($array)
    {
        //$color = product_color_image::where('product_id', $this->productId)->get();
        //$this->images = null;
//        $this->images = explode(',', $this->color[$array]->images);
        $this->productd = $this->color[$array];
        $this->quantity = 1;
//        $this->stock = $this->color[$array]->stock;
//        dd($this->productd);
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
            'select_product_color_id'=>$this->productd->product_color_id,
            'product_color_image_id'=>$this->productd->id,
            'title' => $product->title,
            'price' => (int)$product->price,
            'offer_price' => (int)$product->offer_price,
            'image' => $image[0],
            'quantity' => $this->quantity,
        ];
//        dd($addToCart);
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
        if ($this->quantity < $this->productd->stock) {
            $this->quantity++;
        }else{
            session()->flash('less_stock', 'Only '.$this->productd->stock.' left.');
        }
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
//            'product_color_id' => $product->product_color_img->id,
            'select_product_color_id' => $product->product_color_img->getColor->id,
            'product_color_image_id' => $product->product_color_img->id,
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
