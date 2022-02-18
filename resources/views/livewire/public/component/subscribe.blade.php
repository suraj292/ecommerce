<div class="col-lg-6">

    @if(!session()->has('email_subscribed'))
    <form class="form-inline subscribe-form auth-form needs-validation" wire:submit.prevent="subscribe">
        <div class="form-group mx-sm-3">
            <input type="text" class="form-control" placeholder="Enter your email" wire:model.defer="email">
        </div>
        <button type="submit" class="btn btn-solid">subscribe</button>

        @error('email')
        <div class="text-center w-100">
            <span class="text-danger">{{ $message }}</span>
        </div>
        @enderror
    </form>
    @else
    <div class="container text-center">
        <h3 class="text-uppercase"><i class="fa fa-check-circle" style="font-size: 30px; color: green;"></i> Thanks for Subscribing</h3>
    </div>
    @endif
</div>
