<?php

namespace App\Http\Livewire\Public\Account;

use App\Models\gift_card;
use Livewire\Component;

class Wallet extends Component
{
    public function render()
    {
        return view('livewire.public.account.wallet');
    }

    public function giftCardVerify()
    {
//        $giftCard = gift_card::where('user_id', null)->where('expiry', '=>', now())->get();
        $giftCard = gift_card::where('user_id', null)->orWhere('expiry', '>=', now())->get();

        dd($giftCard);
    }
}
