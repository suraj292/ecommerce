<?php

namespace App\Http\Livewire\Admin;

use GuzzleHttp\Client;
use Livewire\Component;

class LogisticsRate extends Component
{
//    public $fromPin='201005', $toPin, $length, $width, $height, $weight, $paymentMode='prepaid', $mrp;
    public $fromPin='201005', $toPin='110046', $length='20', $width='20', $height='20', $weight='2', $paymentMode='prepaid', $mrp='1800';
    public $data;

    public function render()
    {
        return view('livewire.admin.logistics-rate')->layout('layouts.admin');
    }

    public function checkLogisticsRate()
    {
        $this->validate([
            'fromPin'=>'required|digits:6',
            'toPin'=>'required|digits:6',
            'length'=>'required',
            'width'=>'required',
            'height'=>'required',
            'weight'=>'required',
            'paymentMode'=>'required',
            'mrp'=>'required'
        ]);
        $data = json_encode([
            "data"=>[
                "from_pincode" => $this->fromPin,
                "to_pincode" => $this->toPin,
                "shipping_length_cms" => $this->length,
                "shipping_width_cms" => $this->width,
                "shipping_height_cms" => $this->height,
                "shipping_weight_kg" => $this->weight,
                "order_type" => "forward",
                "payment_method" => $this->paymentMode,
                "product_mrp" => $this->mrp,
                "access_token" => "ad22463c66a3718e3a2fc3d9f83ff108",
                "secret_key" => "dd993a668718a340e67cd16b247ee53a"
            ]
        ]);
        $client = new Client();
        $res = $client->request('POST', 'https://manage.ithinklogistics.com/api_v3/rate/check.json', ['body'=>$data]);
        $this->data = json_decode($res->getBody()->getContents(), true);
        dd($this->data);//data
    }

}
