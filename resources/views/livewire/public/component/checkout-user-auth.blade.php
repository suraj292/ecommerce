<div>
    <div class="checkout-title">
        <h3>Billing Details</h3>
    </div>
    <style>
        .btn-selected{border: none; background: #2874f0; color: white; font-size: 15px; font-weight: bold;}
        .btnSpnSlct{background-color: white; color: #2874f0; font-weight: normal; border-radius: 2px;}
        .accordion-btn{border: none; /*border: #0a0a0a12 1px solid;*/ background: white; color: gray; font-size: 15px; box-shadow: 0 10px 20px 0 #f3f3f3a6; font-weight: bold;}
        .accordion-span{background-color: #dbdbdb85; color: #2874f0; font-weight: normal; border-radius: 2px;}
        .mainLoginInput{
            font-family: FontAwesome, serif;
        }
    </style>
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="w-100 py-3 text-start btn-selected" type="button">
                    &nbsp;&nbsp;&nbsp;<span class="px-1 btnSpnSlct">1</span>&nbsp;&nbsp;&nbsp; USER AUTHORIZATION
                </button>
            </h2>
            <div id="demo" style="display: block; border: #0a0a0a12 1px solid; background-color: white;">
                <div class="accordion-body">
                    <form></form>
                    <form {{--wire:submit.prevent="userCheck"--}}>
                        <input type="text" style="border: none; border-bottom: #d9d9d9c7 1px solid; font-size: 15px;" placeholder="Enter Email/Mobile number" wire:model.lazy="user">
                        @if(session('user_not_exist'))<p class="text-danger mt-2">{{ session('user_not_exist') }}</p>@endif

                        @if($mobile['mobileDiv'])
                            <input type="text"
                                   style="border: none; border-bottom: #d9d9d9c7 1px solid; font-size: 15px; width: 75%;"
                                   placeholder="Mobile number" wire:model.lazy="mobile.mobileNumber"
                                   @if($mobile['mobileNumberDisabled']) disabled @endif>

                            @if(!$mobile['mobileNumberDisabled'])
                                <button class="btn btn-solid btn-sm btn-xs me-3" wire:click.prevent="sentOTP">Send OTP</button>
                            @endif
                            @error('mobile.mobileNumber')<p class="text-danger mt-2">{{ $message }}</p>@enderror

                            @if($mobile['mobileNumberDisabled'])
                                <input type="text" style="border: none; border-bottom: #d9d9d9c7 1px solid; font-size: 15px; width: 75%;" placeholder="OTP" wire:model.lazy="mobile.otp">
                                <button class="btn btn-solid btn-sm btn-xs me-3" wire:click.prevent="confirmOTP">Submit</button>
                                @error('mobile.otp')<p class="text-danger mt-2">{{ $message }}</p>@enderror
                                @if(session()->has('wrong_otp'))<p class="text-danger mt-2">{{ session('wrong_otp') }}</p>@endif
                            @endif
                        @endif

                        @if($reqPassword)
                            <input type="password" style="border: none; border-bottom: #d9d9d9c7 1px solid; font-size: 15px;" placeholder="Password" wire:model.lazy="password">
                            @if(session()->has('wrong_password'))<p class="text-danger mt-2">{{ session('wrong_password') }}</p>@endif
                        @endif

{{--                        <input type="text" class="mainLoginInput" style="border: none; border-bottom: #d9d9d9c7 1px solid; font-size: 15px;"--}}
{{--                               placeholder="demo@example.com " disabled>--}}

                        <p class="my-3" style="font-size: 12px;">By continuing, you agree to our <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.</p>
                        @if($regButton)
                            <a href="{{ route('register') }}" type="submit" class="btn btn-solid me-3">Register</a>
                        @elseif($reqPassword)
                            <a type="submit" class="btn btn-solid me-3" wire:click.prevent="userLogin">CONTINUE</a>
                        @else
                            <button type="submit" class="btn btn-solid me-3" wire:click.prevent="userCheck">CONTINUE</button>
                        @endif
                    </form>
                </div>
            </div>

{{--            <div id="headingTwo">--}}
{{--                <h2 class="accordion-header mt-3">--}}
{{--                    <button class="w-100 py-3 text-start accordion-btn" type="button">--}}
{{--                        &nbsp;&nbsp;&nbsp;<span class="px-1 rounded accordion-span">2</span>&nbsp;&nbsp;&nbsp; DELIVERY ADDRESS--}}
{{--                    </button>--}}
{{--                </h2>--}}
{{--            </div>--}}

        </div>
    </div>

</div>
