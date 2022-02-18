<?php

namespace App\Http\Livewire\Public;

use App\Models\collection_name;
use Livewire\Component;

class Collection extends Component
{
    public $item, $collections;
    public function render()
    {
        return view('livewire.public.collection');
    }

    public function mount($slug)
    {
        $title = str_replace('-', ' ', $slug);
        $this->collections = collection_name::all();
        $this->item = collection_name::with('collectionLink.products.product_color_img')
            ->where('name', '=', $title)
            ->firstOrFail();
//        dd($this->item);
    }

    public function filterByCollection($id)
    {
        $this->item = collection_name::with('collectionLink.products.product_color_img')
            ->find($id);
    }
}
