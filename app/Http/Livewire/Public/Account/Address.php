<?php

namespace App\Http\Livewire\Public\Account;

use App\Models\user_address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Address extends Component
{
    public $addresses, $addressForm=false, $editAddressForm=false, $editAddressId;
    public $newAddress = ['name', 'mobile_number', 'pincode', 'locality', 'address', 'city', 'state', 'landmark', 'altrPhone'];
    public $editAddress = ['name', 'mobile_number', 'pincode', 'locality', 'address', 'city', 'state', 'landmark', 'altrPhone'];

    public function render()
    {
        return view('livewire.public.account.address');
    }

    public function mount()
    {
        $this->addresses = user_address::where('user_id', Auth::id())->orderBy('default', 'DESC')->get();
    }

    public function addNewAddress()
    {
        $this->validate([
            'newAddress.name'=>'required',
            'newAddress.mobile_number'=>'required|integer|digits:10',
            'newAddress.pincode'=>'required|integer|digits:6',
            'newAddress.locality'=>'required',
            'newAddress.address'=>'required',
            'newAddress.city'=>'required',
            'newAddress.state'=>'required',
            'newAddress.landmark'=>'nullable',
            'newAddress.altrPhone'=>'nullable|integer|digits:10',
        ],[
            'newAddress.name.required'=>'Full name required',
            'newAddress.mobile_number.required'=>'Phone number required',
            'newAddress.mobile_number.digits'=>'Phone number should 10 digits only.',
            'newAddress.mobile_number.integer'=>'Phone number should be integer only.',
            'newAddress.pincode.required'=>'Pincode Required',
            'newAddress.pincode.integer'=>'Pincode should be integer only.',
            'newAddress.pincode.digit'=>'Pincode should 6 digit only.',
            'newAddress.locality.required'=>'Locality required',
            'newAddress.address.required'=>'Address required',
            'newAddress.city.required'=>'City/District/Town required',
            'newAddress.state.required'=>'State required',
            'newAddress.altrPhone.digits'=>'Alternate Phone no. should 10 digits only.',
            'newAddress.altrPhone.integer'=>'Alternate Phone no. should be integer only.',
        ]);
        $address =user_address::where('user_id', Auth::id())
            ->where('default', true)
            ->get();
        $newAddress = new user_address([
            'user_id'=>Auth::id(),
            'name'=>$this->newAddress['name'],
            'phone'=>$this->newAddress['mobile_number'],
            'pincode'=>$this->newAddress['pincode'],
            'locality'=>$this->newAddress['locality'],
            'address'=>$this->newAddress['address'],
            'city'=>$this->newAddress['city'],
            'state'=>$this->newAddress['state'],
            'landmark'=>$this->newAddress['landmark'] ?? null,
            'alternate_phone'=>$this->newAddress['altrPhone'] ?? null,
            'default'=>$address->isEmpty(),
        ]);
        $newAddress->save();
        $this->addressForm = false;
        $this->newAddress = null;
        $this->addresses->push($newAddress);
        Session::flash('address_added', 'Address Successfully added');
    }

    public function deleteAddress($id)
    {
        $address = user_address::find($id);
        $address->delete();
        $this->addresses = user_address::where('user_id', Auth::id())->orderBy('default', 'DESC')->get();
        Session::flash('address_deleted', 'Address Successfully Deleted');
    }

    public function setDefault($id)
    {
        $defaultAddress = user_address::where('user_id', Auth::id())->where('default', true)->first();
        $defaultAddress->update(['default'=>false]);
        $address = user_address::find($id);
        $address->update(['default'=>true]);
        Session::flash('address_default', 'Address Default has been updated.');
    }

    public function editAddress($id)
    {
        $this->editAddressForm = true;
        $this->editAddressId = $id;
        $address = user_address::find($id);
        $this->editAddress['name']=$address->name;
        $this->editAddress['mobile_number']=$address->phone;
        $this->editAddress['pincode']=$address->pincode;
        $this->editAddress['locality']=$address->locality;
        $this->editAddress['address']=$address->address;
        $this->editAddress['city']=$address->city;
        $this->editAddress['state']=$address->state;
        $this->editAddress['landmark']=$address->landmark;
        $this->editAddress['altrPhone']=$address->alternate_phone;
    }

    public function updateAddress()
    {
        $this->validate([
            'editAddress.name'=>'required',
            'editAddress.mobile_number'=>'required|integer|digits:10',
            'editAddress.pincode'=>'required|integer|digits:6',
            'editAddress.locality'=>'required',
            'editAddress.address'=>'required',
            'editAddress.city'=>'required',
            'editAddress.state'=>'required',
            'editAddress.landmark'=>'nullable',
            'editAddress.altrPhone'=>'nullable|integer|digits:10',
        ],[
            'editAddress.name.required'=>'Full name required',
            'editAddress.mobile_number.required'=>'Phone number required',
            'editAddress.mobile_number.digits'=>'Phone number should 10 digits only.',
            'editAddress.mobile_number.integer'=>'Phone number should be integer only.',
            'editAddress.pincode.required'=>'Pincode Required',
            'editAddress.pincode.integer'=>'Pincode should be integer only.',
            'editAddress.pincode.digits'=>'Pincode should 6 digit only.',
            'editAddress.locality.required'=>'Locality required',
            'editAddress.address.required'=>'Address required',
            'editAddress.city.required'=>'City/District/Town required',
            'editAddress.state.required'=>'State required',
            'editAddress.altrPhone.digits'=>'Alternate Phone no. should 10 digits only.',
            'editAddress.altrPhone.integer'=>'Alternate Phone no. should be integer only.',
        ]);
        $editAddress =user_address::find($this->editAddressId);
        $editAddress->update([
            'user_id'=>Auth::id(),
            'name'=>$this->editAddress['name'],
            'phone'=>$this->editAddress['mobile_number'],
            'pincode'=>$this->editAddress['pincode'],
            'locality'=>$this->editAddress['locality'],
            'address'=>$this->editAddress['address'],
            'city'=>$this->editAddress['city'],
            'state'=>$this->editAddress['state'],
            'landmark'=>$this->editAddress['landmark'],
            'alternate_phone'=>$this->editAddress['altrPhone'],
        ]);
            $this->editAddressForm = false;
            $this->editAddress = null;
            $this->addresses = user_address::where('user_id', Auth::id())->orderBy('default', 'DESC')->get();
            Session::flash('address_updated', 'Address Successfully updated');
    }
}
