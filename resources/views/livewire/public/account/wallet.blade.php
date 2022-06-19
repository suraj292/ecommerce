<div class="dashboard">
    <div class="title1">
{{--        <h4>recent story</h4>--}}
        <h2 class="title-inner1">WALLET</h2>
    </div>
    <!--
    <div class="welcome-msg">
        <p>
            Claim your Gift Card.
        </p>
    </div>
    -->
    <div class="box-account box-info mt-5">

        @if($balance)
            <h4 class="text-success">Available Balance: ₹ {{ $balance->amount }}</h4>
        @else
            <h4 class="text-danger">Available Balance: ₹ 0.00</h4>
        @endif

        <form wire:submit.prevent="giftCardVerify">
            <div class="form-group row">
                <div class="col-sm-12 col-md-6">
                    <label for="gift-card">GIFT CARD</label>
                    <input id="gift-card" type="text" class="form-control" placeholder="XXXX-XXXX-XXXX-XXXX" wire:model.defer="giftCardCode">
                    @error('giftCardCode')<span class="text-danger">{{ $message }}</span>@enderror
                    @if(session()->has('invalidGiftCard'))<span class="text-danger">{{ session('invalidGiftCard') }}</span>@endif
                </div>
                <div class="col-sm-4">
                    <button class="btn btn-solid btn-sm mx-2 mt-4">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

