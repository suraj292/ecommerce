<div class="auth-form-light text-left p-5">
    <div class="brand-logo">
        <img src="admin_assets/images/logo.svg">
    </div>
    <h4>Hello! let's get started</h4>
    <h6 class="font-weight-light">Sign in to continue.</h6>
    <form class="pt-3" wire:submit.prevent="login">
        <div class="form-group">
            <input type="text" class="form-control form-control-lg"  placeholder="Username" wire:model="username">
            @error('username') <p class="text-danger mt-2">{{ $message }}</p> @enderror
        </div>
        <div class="form-group">
            <input type="password" class="form-control form-control-lg"  placeholder="Password" wire:model="password">
            @error('password') <p class="text-danger mt-2">{{ $message }}</p> @enderror
        </div>
        <div class="mt-3">
            <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" type="submit">SIGN IN</button>
        </div>
        @if(session()->has('failed_login'))
        <p class="text-danger mt-2">{{session('failed_login')}}</p>
        @endif
        <div class="my-2 d-flex justify-content-between align-items-center">
            <a href="#" class="auth-link text-black">Forgot password?</a>
        </div>
    </form>
</div>
