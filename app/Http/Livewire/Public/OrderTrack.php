<?php

namespace App\Http\Livewire\Public;

use App\Models\user_address;
use App\Models\user_cart;
use App\Models\user_order;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;
//use GuzzleHttp\Client as Api;

class OrderTrack extends Component
{
    public $order, $product, $address;

    public function render()
    {
        return view('livewire.public.order-track');
    }

    public function mount()
    {
        $order_id=(int)request('order');
        $product=request('product');
        $this->order = user_order::select('order_number', 'created_at', 'user_delivery_id', 'i_think_logistics_id')->find($order_id);//$order_id=2,
        $this->address = user_address::find($this->order->user_delivery_id);

        $this->product = user_cart::onlyTrashed()
            ->where('user_id', Auth::id())
            ->where('title', Str::slug($product, ' '))
            ->first();

        if ($this->order->i_think_logistics_id) {
//        $response = $this->call('POST', 'messages', ['content' => 'content']);
            $uri = 'https://pre-alpha.ithinklogistics.com/api_v3/order/track.json';
            $api = new Client();
            $res = $api->request('post', $uri, ['body'=>json_encode([
                    'data' => [
                        'awb_number_list'=>$this->order->i_think_logistics_id,
                        'access_token'=>'5a7b40197cd919337501dd6e9a3aad9a',
                        'secret_key'=>'2b54c373427be180d1899400eeb21aab',
                    ]
                ])
            ]);

            dd(json_decode($res->getBody(), true));
        }
    }
}
