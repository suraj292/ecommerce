<?php

namespace App\Http\Livewire\Public;

use Livewire\Component;

class ItalianLeather extends Component
{
    public $products;
    public function render()
    {
        return view('livewire.public.italian-leather');
    }

    public function mount()
    {
        $this->products = \App\Models\products::with('product_color_img')
            ->join('product_details', 'products.id', '=', 'product_details.product_id')
            ->where('product_details.italian', true)
            ->get();


    }
}
