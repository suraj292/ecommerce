<div>
    <div class="checkout-title">
        <h3>Billing Details</h3>
    </div>
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="w-100 py-3 text-start btn-selected" type="button">
                    &nbsp;&nbsp;&nbsp;<span class="px-1 btnSpnSlct">1</span>&nbsp;&nbsp;&nbsp;
                    @if($user)
                        USER VERIFICATION
                    @else
                        USER AUTHORIZATION
                    @endif
                </button>
            </h2>
            <div id="demo" style="display: block; border: #0a0a0a12 1px solid; background-color: white;">
                <div class="accordion-body">
                    @if(!$user)
                        <form></form>
                        <form wire:submit.prevent="userLogin">
                            <input type="text" style="border: none; border-bottom: #d9d9d9c7 1px solid; font-size: 15px;" placeholder="Enter Email/Mobile number" wire:model.lazy="emailPhone">
                            @if(session()->has('not_registered_user'))<p class="text-danger mt-2">{{ session('not_registered_user') }}</p>@endif
                            @if($passDiv)
                                <input type="password" style="border: none; border-bottom: #d9d9d9c7 1px solid; font-size: 15px;" placeholder="Password" wire:model.lazy="password">
                                @if(session()->has('wrong_password'))<p class="text-danger mt-2">{{ session('wrong_password') }}</p>@endif
                            @endif
                            @if(!$userReg)
                                <p class="my-3" style="font-size: 12px;">By continuing, you agree to our <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.</p>
                            @endif
                            @if($userReg)
                                <a href="{{ route('register') }}" class="btn btn-solid me-3">REGISTER</a>
                            @else
                                <button type="submit" class="btn btn-solid me-3" id="continue">CONTINUE</button>
                            @endif
                        </form>
                    @elseif(!$user->mobile_verified_at)
                        <form></form>
                        @if($otpDiv)
                            <form wire:submit.prevent="checkOTP">
                                <input type="text" style="border: none; border-bottom: #d9d9d9c7 1px solid; font-size: 15px;" placeholder="Mobile number" wire:model.lazy="mobileNumber" disabled>
                                <input type="text" style="border: none; border-bottom: #d9d9d9c7 1px solid; font-size: 15px;" placeholder="Enter OTP" wire:model.lazy="otp">
                                @if(session()->has('incorrect_otp'))<p style="color: red; margin-top: 8px;">{{ session('incorrect_otp') }}</p>@endif
                                <button type="submit" class="btn btn-solid me-3 mt-2">submit</button>
{{--                                <div class="cart_counter">--}}
                                    <div class="countdownholder mt-2" wire:ignore>
                                        OTP will be expired in <span id="timer" style="color: red;"></span> minutes!
                                    </div>
{{--                                </div>--}}
                            </form>
                        @else
                            <form wire:submit.prevent="sendOTP">
                                <input type="text" style="border: none; border-bottom: #d9d9d9c7 1px solid; font-size: 15px;" placeholder="Mobile number" wire:model.lazy="mobileNumber">
                                <button type="submit" class="btn btn-solid me-3 mt-2">send otp</button>
                            </form>
                        @endif
                    @elseif($user->social_network == 'EMAIL' && is_null($user->email_verified_at))
                        <h1>email</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('success', function () {
                location.reload();
            });
        })
        window.addEventListener('page_reload', event => {
            window.location.reload();
        })
    </script>
    <script>

        let sec = 5 * 60;
            countDown = setInterval(function () {
                'use strict';

                secpass();
            }, 1000);

        function secpass() {
            'use strict';

            let min = Math.floor(sec / 60),
                remSec = sec % 60;

            if (remSec < 10) {

                remSec = '0' + remSec;

            }
            if (min < 10) {

                min = '0' + min;

            }
            document.getElementById("timer").innerHTML = min + ":" + remSec;

            if (sec > 0) {

                sec = sec - 1;

            } else {

                clearInterval(countDown);

                // countDiv.innerHTML = 'countdown done';
                window.location.href = "/buy"
            }
        }

    </script>
</div>
@section('script')

@endsection
