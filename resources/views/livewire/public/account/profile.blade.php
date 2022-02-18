<div class="dashboard">
    <div class="page-title">
        <h2>My Account</h2>
    </div>
    <div class="box-account box-info">
        <div class="box">
            <div class="box-title">
                @if(session()->has('name_changed'))
                    <p class="p-2 alert-success rounded">{{ session('name_changed') }}</p>
                @endif
            </div>

            <div class="box-content">
                @if($user->avatar)
                <img src="{{ $user->avatar }}" alt="avatar" class="img-thumbnail">
                @endif
                <form wire:submit.prevent="changeName">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Your name" wire:model.lazy="name" disabled>
                        </div>
                        <div class="col-md-6">
                            <span class="btn btn-custom btn-solid" id="name-btn-1">Change Name</span>
                            <button class="btn btn-custom btn-solid" style="display: none;" id="name-btn-2">Update Name</button>
                        </div>
                    </div>
                </form>
                <div class="row mt-2">
                    @if($user->social_network || $user->email_verified_at)
                        <div class="col-md-6">
                            <label for="name">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="Enter Your name" wire:model.lazy="email" disabled>
                        </div>
                        <div class="col-md-6">
                            <span class="btn btn-custom btn-solid" id="email-btn-1">Change Email</span>
                            <button class="btn btn-custom btn-solid" style="display: none;" id="email-btn-2">Update Email</button>
                        </div>
                    @else
                        <div class="col-md-6">
                            <label for="name">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="Enter Your name" wire:model.lazy="email" disabled style="background-color: #ffd0d0;">
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-custom btn-solid">Verify Email</button>
                        </div>
                        <div class="col-md-12 mt-2">
                            <p>@email not verified. <a href="#">Click Here</a> to send email verification link.</p>
                        </div>
                    @endif
                </div>
                <div class="row mt-2">
                    @if($user->mobile_verified_at)
                        <div class="col-md-6">
                            <label for="name">Mobile Number</label>
                            <input type="text" class="form-control" id="mobile" placeholder="Enter Your name" wire:model.lazy="mobile" disabled>
                        </div>
                        <div class="col-md-6">
                            <span class="btn btn-custom btn-solid" id="mobile-btn-1">Change Mobile</span>
                            <button class="btn btn-custom btn-solid" style="display: none;" id="mobile-btn-2">Update Mobile</button>
                        </div>
                    @elseif($user->mobile)
                        <div class="col-md-6">
                            <label for="name">Mobile Number</label>
                            <input type="text" class="form-control" id="mobile" placeholder="Enter Your name" wire:model.lazy="mobile" disabled style="background-color: #ffd0d0;">
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-custom btn-solid">Verify Mobile</button>
                        </div>
                        <div class="col-md-12 mt-2">
                            <p>@mobile not verified. <a href="#">Click Here</a> to send OTP.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
@section('style')
    <style>
        .btn-custom{
            margin-top: 27px; padding: 8px 16px !important;
        }
    </style>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $("#name-btn-1").on('click', function () {
               $("#name").removeAttr("disabled");
               $("#name-btn-1").hide();
               $("#name-btn-2").show();
            });
            $("#email-btn-1").on('click', function () {
                $("#email").removeAttr("disabled");
                $("#email-btn-1").hide();
                $("#email-btn-2").show();
            });
        });
    </script>
@endsection
