<div class="dashboard">
    <div class="page-title">
        <h2>My Address</h2>
    </div>
    <div class="welcome-msg">
        <p>From your My Account Dashboard you have the ability to view a snapshot of your recent
            account activity and update your account information. Select a link below to view or
            edit information.</p>
    </div>
    <div class="box-account box-info">
        <div class="row">
            <div class="col-sm-12">
                <div class="box" x-data="{ open: @entangle('addressForm') }">
                    @if(session()->has('address_added'))
                        <div class="mt-2">
                            <p class="p-2 rounded alert-success">{{ session('address_added') }}</p>
                        </div>
                    @elseif(session()->has('address_deleted'))
                        <div class="mt-2">
                            <p class="p-2 rounded alert-success">{{ session('address_deleted') }}</p>
                        </div>
                    @elseif(session()->has('address_default'))
                        <div class="mt-2">
                            <p class="p-2 rounded alert-success">{{ session('address_default') }}</p>
                        </div>
                    @elseif(session()->has('address_updated'))
                        <div class="mt-2">
                            <p class="p-2 rounded alert-success">{{ session('address_updated') }}</p>
                        </div>
                    @endif
                    <div class="box-title pb-3">
                        <h3 class="text-uppercase">Manage address</h3>
                        <a x-on:click="open = ! open"><span class="btn btn-solid btn-sm btn-xs me-3">+ Add address</span></a>
                    </div>
                    {{--add address form--}}
                    <div class="border border-primary rounded mt-4" x-show="open" x-transition>
                        <div class="accordion-body">
                            <h4>Add new address</h4>
                            <form wire:submit.prevent="addNewAddress">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <input type="text" class="new-input-style" placeholder="full name" wire:model.defer="newAddress.name">
                                        @error('newAddress.name')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <input type="text" class="new-input-style" placeholder="Mobile number" wire:model.defer="newAddress.mobile_number">
                                        @error('newAddress.mobile_number')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <input type="text" class="new-input-style" placeholder="Pincode" wire:model.defer="newAddress.pincode">
                                        @error('newAddress.pincode')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <input type="text" class="new-input-style" placeholder="Locality" wire:model.defer="newAddress.locality">
                                        @error('newAddress.locality')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                    </div>

                                    <div class="col-12">
                                        <textarea class="new-input-style" placeholder="Address (Area and Street)" wire:model.defer="newAddress.address"></textarea>
                                        @error('newAddress.address')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <input type="text" class="new-input-style" placeholder="City/District/Town" wire:model.defer="newAddress.city">
                                        @error('newAddress.city')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <select class="new-input-style" wire:model.defer="newAddress.state">
                                            <option selected>-- Select State --</option>
                                            <option value="delhi">delhi</option>
                                            <option value="hariyana">hariyana</option>
                                        </select>
                                        @error('newAddress.state')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <input type="text" class="new-input-style" placeholder="Landmark (optional)" wire:model.defer="newAddress.landmark">
                                        @error('newAddress.landmark')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <input type="text" class="new-input-style" placeholder="Alternate Phone (optional)" wire:model.defer="newAddress.altrPhone">
                                        @error('newAddress.altrPhone')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                    </div>

                                    <div class="mt-2">
                                        <button type="submit" class="btn btn-solid"">save & deliver here</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{--view address--}}
                    <div class="box-content mt-4" x-data="{ editAddress : @entangle('editAddressForm') }">
{{--                        <button @click="editAddress = true">edit form</button>--}}
                        @forelse($addresses as $address)
                            <div class="row">
                                <div class="col-10">
                                    <p class="text-capitalize">
                                        <strong>Address: </strong>
                                        billing to <strong>{{ $address->name }}</strong> {{ '+91 '.$address->phone }}
                                        <br>
                                        {{ $address->address.', '.$address->locality.', '.$address->city.', ('.$address->pincode.'), '.$address->state }}
                                    </p>
                                </div>
                                <div class="col-2">
                                    <div class="dropdown">
                                        <i class="fa fa-ellipsis-v" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                        <ul class="dropdown-menu">
                                            @if(!$address->default)
                                                <li class="dropdown-item" wire:click="setDefault({{ $address->id }})">Set Default</li>
                                            @endif
                                            <li class="dropdown-item" wire:click="editAddress({{ $address->id }})">edit</li>
                                            <li class="dropdown-item" wire:click="deleteAddress({{ $address->id }})">delete</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h4 class="text-center p-4">---| No Address |---</h4>
                        @endforelse
                            {{--edit address--}}
                            <div class="border border-primary rounded mt-4" x-show="editAddress">
                                <div class="accordion-body">
                                    <h4>Edit address</h4>
                                    <form wire:submit.prevent="updateAddress">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <input type="text" class="new-input-style" placeholder="full name" wire:model.defer="editAddress.name">
                                                @error('editAddress.name')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                            </div>

                                            <div class="col-sm-12 col-md-6">
                                                <input type="text" class="new-input-style" placeholder="Mobile number" wire:model.defer="editAddress.mobile_number">
                                                @error('editAddress.mobile_number')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                            </div>

                                            <div class="col-sm-12 col-md-6">
                                                <input type="text" class="new-input-style" placeholder="Pincode" wire:model.defer="editAddress.pincode">
                                                @error('editAddress.pincode')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                            </div>

                                            <div class="col-sm-12 col-md-6">
                                                <input type="text" class="new-input-style" placeholder="Locality" wire:model.defer="editAddress.locality">
                                                @error('editAddress.locality')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                            </div>

                                            <div class="col-12">
                                                <textarea class="new-input-style" placeholder="Address (Area and Street)" wire:model.defer="editAddress.address"></textarea>
                                                @error('editAddress.address')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                            </div>

                                            <div class="col-sm-12 col-md-6">
                                                <input type="text" class="new-input-style" placeholder="City/District/Town" wire:model.defer="editAddress.city">
                                                @error('editAddress.city')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                            </div>

                                            <div class="col-sm-12 col-md-6">
                                                <select class="new-input-style" wire:model.defer="editAddress.state">
                                                    <option selected>-- Select State --</option>
                                                    <option value="delhi">delhi</option>
                                                    <option value="hariyana">hariyana</option>
                                                </select>
                                                @error('editAddress.state')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                            </div>

                                            <div class="col-sm-12 col-md-6">
                                                <input type="text" class="new-input-style" placeholder="Landmark (optional)" wire:model.defer="editAddress.landmark">
                                                @error('editAddress.landmark')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                            </div>

                                            <div class="col-sm-12 col-md-6">
                                                <input type="text" class="new-input-style" placeholder="Alternate Phone (optional)" wire:model.defer="editAddress.altrPhone">
                                                @error('editAddress.altrPhone')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                                            </div>

                                            <div class="mt-2">
                                                <button type="submit" class="btn btn-solid">Update Address</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

