<div class="dashboard">
    <div class="page-title">
        <h2>Password management</h2>
    </div>
    <div class="welcome-msg">
{{--        <p>Hello, {{ strtoupper($user->name) }} !</p>--}}
        <p>From your My Account Dashboard you have the ability to view a snapshot of your recent
            account activity and update your account information. Select a link below to view or
            edit information.</p>
    </div>
    <div class="box-account box-info">
        <div class="row">
            <div class="col-sm-12">
                <div class="box">
                    @if(session()->has('password_saved'))
                    <div class="box-title">
                        <p class="alert-success p-2 rounded">{{ session('password_saved') }}</p>
                    </div>
                    @elseif(session()->has('password_updated'))
                    <div class="box-title">
                        <p class="alert-success p-2 rounded">{{ session('password_updated') }}</p>
                    </div>
                    @elseif($newPasswordDiv)
                        <div class="box-title">
                            <h3>Enter new password</h3>
                        </div>
                        <div class="box-content">
                            <form wire:submit.prevent="saveNewPassword">
                                <div class="form-group">
                                    <label >Password</label>
                                    <input type="password" class="form-control" placeholder="Password" wire:model.lazy="newPassword.password1">
                                    @error('newPassword.password1')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label >Confirm Password</label>
                                    <input type="password" class="form-control" placeholder="Password" wire:model.lazy="newPassword.password2">
                                    @error('newPassword.password2')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <button class="btn btn-solid btn-sm me-3">Submit</button>
                            </form>
                        </div>
                    @else
                        <div class="box-title">
                            <h3>Update Password</h3>
                        </div>
                        <div class="box-content">
                            <form wire:submit.prevent="changePassword">
                                <div class="form-group">
                                    <label >Current Password</label>
                                    <input type="password" class="form-control" placeholder="Current Password" wire:model.lazy="password.currentPassword">
                                    @error('password.currentPassword')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label >New Password</label>
                                    <input type="password" class="form-control" placeholder="New Password" wire:model.lazy="'password.newPassword">
                                    @error('password.newPassword')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label >New Confirm Password</label>
                                    <input type="password" class="form-control" placeholder="Confirm Password" wire:model.lazy="password.confirmNewPassword">
                                    @error('password.confirmNewPassword')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
