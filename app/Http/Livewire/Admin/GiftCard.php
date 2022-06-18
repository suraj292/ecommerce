<?php

namespace App\Http\Livewire\Admin;

use App\Models\gift_card;
use Livewire\Component;

class GiftCard extends Component
{
    public $giftCards;
    protected $listeners = ['generateGiftCard'];
    public function render()
    {
        return view('livewire.admin.gift-card')->layout('layouts.admin');
    }

    public function mount()
    {
        $this->giftCards = gift_card::all();
    }
    public function generateGiftCard($payload){
        $amount = $payload['data']['Amount'];
        $expiryDate = $payload['data']['ExDate'];
        $alphabet = 'ABCDEFGHIJKLMNOPQRSTVWXYZABCDEFGHIJKLMNOPQRSTVWXYZABCDEFGHIJKLMNOPQRSTVWXYZABCDEFGHIJKLMNOPQRSTVWXYZ';
        $code = substr(str_shuffle($alphabet), 0, 16);
        $newGiftCard = new gift_card([
            'amount' => (int)$amount,
            'code' => $code,
            'expiry' => $expiryDate
        ]);
        $newGiftCard->save();
        $this->dispatchBrowserEvent('swal:giftCardGenerated', [
            'icon' => 'success',
            'title' => 'GIFT CARD HAS BEEN GENERATED',
            'timer' => 2000,
        ]);
//        $this->giftCards = gift_card::all();
    }
}
