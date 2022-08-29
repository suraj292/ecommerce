<?php

namespace App\Http\Livewire\Public\Component;

use App\Models\user_address;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class CheckoutAddress extends Component
{
    public $address, $selectedAddress, $states;
    public $newAddress = ['name', 'mobile_number', 'pincode', 'locality', 'address', 'city', 'state', 'landmark', 'altrPhone'];
    public function render()
    {
        return view('livewire.public.component.checkout-address');
    }

    public function mount()
    {
        $this->address = user_address::where('user_id', Auth::id())->orderBy('default', 'DESC')->get();
        $this->selectedAddress = json_decode(Cookie::get('selectedAddress'));

        $state = json_encode(["data"=>[
            "country_id" => "101",
            "access_token" => env('I_THINK_LOGISTICS_ACCESS_TOKEN'),
            "secret_key" => env('I_THINK_LOGISTICS_SECRET_KEY')
        ]]);
        $client1 = new Client();
        $res1 = $client1->request('POST','https://pre-alpha.ithinklogistics.com/api_v3/state/get.json', ['body'=>$state]);
        $this->states = json_decode($res1->getBody()->getContents(), true)['data'];

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
        $data = json_encode([
            "data"=>[
                "pincode" => $this->newAddress['pincode'],
                "access_token" => env('I_THINK_LOGISTICS_ACCESS_TOKEN'),
                "secret_key" => env('I_THINK_LOGISTICS_SECRET_KEY')
            ]
        ]);
        $client = new Client();
        $res = $client->request('POST','https://pre-alpha.ithinklogistics.com/api_v3/pincode/check.json', ['body'=>$data]);
        $response = json_decode($res->getBody()->getContents(), true);
//        $cod = reset($response['data'][strval($this->newAddress['pincode'])])['cod'];
        $cod = array_values($response['data'][(string)$this->newAddress['pincode']]);
        if ($response['status_code'] == 200){
            foreach ($cod as $x){
                if($x['cod'] == 'Y'){
                    return $y = 'available';
                }
            }
            /*
            if ( $cod == 'Y') {
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
                $this->newAddress = null;
                $this->address = user_address::where('user_id', Auth::id())->orderBy('default', 'DESC')->get();

            }else{
                session()->flash('pin_code_not_available', 'Please use other Pincode');
            }
            */
        }else{
            session()->flash('pin_code_not_available', 'Please use other Pincode');
        }


    }
    public function addressSelected($id){
         Cookie::queue('selectedAddress', $id, 60);
    }

    public function setDefault($id)
    {
        $defaultAddress = user_address::where('user_id', Auth::id())->where('default', true)->first();
        $defaultAddress->update(['default'=>false]);

        $address = user_address::find($id);
        $address->update(['default'=>true]);

        $this->address = user_address::where('user_id', Auth::id())->orderBy('default', 'DESC')->get();
    }
}
