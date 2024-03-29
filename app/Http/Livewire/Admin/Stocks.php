<?php

namespace App\Http\Livewire\Admin;

use App\Models\product_color_image;
use Livewire\Component;

class Stocks extends Component
{
    public $stocks, $stockId;
    protected $listeners = ['stockUpdate'];
    public function render()
    {
        return view('livewire.admin.stocks')
            ->layout('layouts.admin');
    }
    public function mount(){
        $this->stocks = product_color_image::with(['getColor', 'productDetails:product_id,title'])
            ->where('stock', '<=', 3)
            ->get();
    }

    public function editStock($id)
    {
        $this->stockId = $id;
        $stock = product_color_image::select('stock')->find($id);
        $this->dispatchBrowserEvent('swal:modal', [
            'title' => 'Stock Control',
            'input' => 'text',
            'inputValue' => $stock->stock,
            'confirmButtonText' => 'Update',
            'focusConfirm' => false,
        ]);
    }

    public function stockUpdate($payload)
    {
        $stock = product_color_image::find($this->stockId);
        $stock->update(['stock'=>(int)$payload['updatedStock']]);
        $this->stocks = product_color_image::with(['getColor', 'productDetails:product_id,title'])
            ->where('stock', '<=', 3)
            ->get();
        $this->dispatchBrowserEvent('swal:updateSuccessMessage', [
            'icon' => 'success',
            'title' => 'Stock Updated Successfully!',
            'timer' => 1500,
        ]);
    }
}
