<?php

namespace App\Http\Livewire\Public\Account;

use App\Models\gift_card;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Wallet extends Component
{
    public $balance, $giftCardCode;
    public function render()
    {
        return view('livewire.public.account.wallet');
    }

    public function mount()
    {
        $this->balance = \App\Models\wallet::where('user_id', Auth::id())->first();
    }

    public function giftCardVerify()
    {
        $this->validate(['giftCardCode' => 'required'],[
            'giftCardCode.required' => 'Please enter Gift Card',
        ]);
        $giftCard = gift_card::where('user_id', null)
            ->where('code', $this->giftCardCode)
            ->where('expiry', '>=', now())
            ->first();
        if ($giftCard){
            if ($this->balance){
                $updatedAmount = $this->balance->amount + $giftCard->amount;
                $this->balance->update(['user_id' => Auth::id(), 'amount' => $updatedAmount]);
            }else{
                $updateBalance = new \App\Models\wallet(['user_id' => Auth::id(), 'amount' => $giftCard->amount]);
                $updateBalance->save();
            }
            $giftCard->update(['user_id' => Auth::id()]);
            $this->balance = \App\Models\wallet::where('user_id', Auth::id())->first();
            $this->giftCardCode = null;
        }else{
            Session::flash('invalidGiftCard', 'Please enter valid Gift Card.');
        }
    }
}
