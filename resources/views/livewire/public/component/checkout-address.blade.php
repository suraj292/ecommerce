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
            <div id="headingOne">
                @if(session()->has('empty_address'))<p class="alert-danger p-2 rounded" >{{ session('empty_address') }}</p>@endif
                <h2 class="accordion-header">
                    <button class="w-100 py-3 text-start accordion-btn">
                        <span class="px-1 rounded accordion-span">1</span>&nbsp;&nbsp;&nbsp; USER AUTHORIZATION <i class="fa fa-check" style="color: #2874f0;"></i>
                    </button>
                </h2>
                <div style="background-color: white;">
                    <div class="accordion-body">
                        <strong> {{ auth()->user()->name }} </strong> +91{{ auth()->user()->mobile }}
                    </div>
                </div>
            </div>
            <div id="headingTwo">
                <h2 class="accordion-header mt-3">
                    <button class="w-100 py-3 text-start btn-selected" type="button">
                        &nbsp;&nbsp;&nbsp;<span class="px-1 rounded btnSpnSlct">2</span>&nbsp;&nbsp;&nbsp; DELIVERY ADDRESS
                    </button>
                </h2>
                <div style="background-color: white;">
                    @foreach($address as $userAddress)
                    <div class="row" style="border-bottom: 1px solid #eeeeee; padding: 5px;">
                        <div class="col-1 d-flex align-items-center justify-content-center">
                            <input type="radio" name="add" wire:click="addressSelected({{ $userAddress->id }})" value="{{ $id = $userAddress->id }}"
                                   {{--@if($selectedAddress === $id) checked @endif--}} @if($userAddress->default) checked @endif>
                        </div>
                        <div class="col-10 text-capitalize">
                            <strong>{{ $userAddress->name }}</strong> +91 {{ $userAddress->phone }} <br>
                            <p>{{ $userAddress->address.', '.$userAddress->locality.', '.$userAddress->city.', '.$userAddress->state.', ('.$userAddress->pincode.')' }}
                            @if($userAddress->landmark){{', '.$userAddress->landmark}}@endif
                            @if($userAddress->alternate_phone){{', +91'.$userAddress->alternate_phone}}@endif
                            </p>
                        </div>
{{--                        @if($userAddress->default)--}}
{{--                            <div class="col-2 d-flex align-items-center">--}}
{{--                                <button class="btn btn-outline-danger btn-sm btn-xs me-3" disabled>Default</button>--}}
{{--                            </div>--}}
{{--                        @else--}}
{{--                            <div class="col-2 d-flex align-items-center">--}}
{{--                                <button class="btn btn-outline-danger btn-sm btn-xs me-3" wire:click.prevent="setDefault({{$userAddress->id}})">Set Default</button>--}}
{{--                            </div>--}}
{{--                        @endif--}}
                    </div>
                    @endforeach
                        {{-- Illuminate\Support\Facades\Cookie::queue('selectedAddress', $selectedAddress, 5) --}}
                </div>
            </div>
            <div>
                <div class="accordion-header mt-3" id="addAddressButton">
                    <h2 class="w-100 py-3 text-start btn-selected">
                        &nbsp;&nbsp;&nbsp;<span class="px-1 rounded btnSpnSlct">+</span>&nbsp;&nbsp;&nbsp; Add a new address
                    </h2>
                </div>
                <div style="background-color: white; margin-top: -5px; @if(!$address->isEmpty()) display: none; @endif" id="addAddressForm">
                    <div class="accordion-body">
                        <form></form>
                        <form wire:submit.prevent="addNewAddress">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" style="border: none; border-bottom: #d9d9d9c7 1px solid; font-size: 15px;" placeholder="full name" wire:model.defer="newAddress.name">
                                    @error('newAddress.name')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                </div>

                                <div class="col-6">
                                    <input type="text" style="border: none; border-bottom: #d9d9d9c7 1px solid; font-size: 15px;" placeholder="Mobile number" wire:model.defer="newAddress.mobile_number">
                                    @error('newAddress.mobile_number')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                </div>

                                <div class="col-6">
                                    <input type="text" style="border: none; border-bottom: #d9d9d9c7 1px solid; font-size: 15px;" placeholder="Pincode" wire:model.defer="newAddress.pincode">
                                    @error('newAddress.pincode')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                    @if(session()->has('pin_code_not_available'))
                                        <p class="text-danger mt-1">{{ session('pin_code_not_available') }}</p>
                                    @endif
                                </div>

                                <div class="col-6">
                                    <input type="text" style="border: none; border-bottom: #d9d9d9c7 1px solid; font-size: 15px;" placeholder="Locality" wire:model.defer="newAddress.locality">
                                    @error('newAddress.locality')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                </div>

                                <div class="col-12">
                                    <textarea style="border: none; border-bottom: #d9d9d9c7 1px solid; font-size: 15px; padding-top: 10px; text-align: center;" placeholder="Address (Area and Street)" wire:model.defer="newAddress.address"></textarea>
                                    @error('newAddress.address')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                </div>

                                <div class="col-6">
                                    <input type="text" style="border: none; border-bottom: #d9d9d9c7 1px solid; font-size: 15px;" placeholder="City/District/Town" wire:model.defer="newAddress.city">
                                    @error('newAddress.city')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                </div>

                                <div class="col-6">
                                    <select style="border: none; border-bottom: #d9d9d9c7 1px solid; font-size: 15px; text-align: center;" wire:model.defer="newAddress.state">
                                        <option selected>-- Select State --</option>
                                        @foreach($states as $state)
                                            <option class="text-uppercase" value="{{ $state['state_name'] }}"> {{ $state['state_name'] }} </option>
                                        @endforeach
{{--                                        <option value="delhi">delhi</option>--}}
{{--                                        <option value="hariyana">hariyana</option>--}}
                                    </select>
                                    @error('newAddress.state')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                </div>

                                <div class="col-6">
                                    <input type="text" style="border: none; border-bottom: #d9d9d9c7 1px solid; font-size: 15px;" placeholder="Landmark (optional)" wire:model.defer="newAddress.landmark">
                                    @error('newAddress.landmark')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                </div>

                                <div class="col-6">
                                    <input type="text" style="border: none; border-bottom: #d9d9d9c7 1px solid; font-size: 15px;" placeholder="Alternate Phone (optional)" wire:model.defer="newAddress.altrPhone">
                                    @error('newAddress.altrPhone')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                </div>

                                <div class="mt-2">
                                    <button type="submit" class="btn btn-solid">save & deliver here</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function (){
                    $("#addAddressButton").on('click', function (){
                        $("#addAddressForm").toggle();
                        let button = $("#addAddressButton span");
                        if (button.text() === '+')
                            button.text("-")
                        else
                            button.text("+")
                    });
                });
            </script>
        </div>
    </div>

</div>
@section('style')
    <style>
        .dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0; /* remove the gap so it doesn't close */
        }
    </style>
@endsection
