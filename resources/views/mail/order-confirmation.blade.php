<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> House Of Bhavana - Order Conformation </title>
</head>

<body style="text-align: center; margin: 0 auto;   padding-left: 10%; padding-right: 10%; padding-top: 10px; font-family: 'Open Sans', sans-serif; background-color: #e2e2e2; display: block;">
<table align="center" border="0" cellpadding="0" cellspacing="0"
       style="padding: 0 30px;background-color: #fff; -webkit-box-shadow: 0 0 14px -4px rgba(0, 0, 0, 0.2705882353);box-shadow: 0 0 14px -4px rgba(0, 0, 0, 0.2705882353);width: 100%; margin-top: 30px">
    <tbody>
    <tr>
        <td>
            <table align="center" border="0" cellpadding="0" cellspacing="0" style="margin-top: 30px">
                <tr>
                    <td>
                        <img clicktracking="off" src="{{ asset('assets/images/email-temp/delivery.png') }}" alt=""
                             style=";margin-bottom: 30px;">
                    </td>
                </tr>
                <tr>
                    <td>
                        <img clicktracking="off" src="{{ asset('assets/images/email-temp/success.png') }}" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <h2 style="color: #444444; font-size: 22px; font-weight: bold; margin-top: 10px; margin-bottom: 10px; padding-bottom: 0; text-transform: uppercase; display: inline-block; line-height: 1;">thank you</h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Payment Is Successfully Processed And Your Order Is On The Way</p>
                        <p>Order ID:{{ $order['order_number'] }}</p>
                    </td>
                </tr>
                <tr>

                    <td>
                        <div style="border-top:1px solid #777;height:1px;margin-top: 30px;">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img clicktracking="off" src="{{ asset('assets/images/email-temp/order-success.png') }}" alt=""
                             style="margin-top: 30px;">
                    </td>
                </tr>
            </table>
            <table align="center" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td>
                        <h2 style="color: #444444; font-size: 22px; font-weight: bold; margin-top: 40px; margin-bottom: 35px; padding-bottom: 0; text-transform: uppercase; display: inline-block; line-height: 1;">YOUR ORDER DETAILS</h2>
                    </td>
                </tr>
            </table>
            <table align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #ddd; border-collapse: collapse;">
                <tr align="left">
                    <th style="font-size: 16px; padding: 15px; text-align: center; border: 1px solid #ddd; border-collapse: collapse;">PRODUCT</th>
                    <th style="font-size: 16px; padding: 15px; text-align: center; border: 1px solid #ddd; border-collapse: collapse;">DESCRIPTION</th>
                    <th style="font-size: 16px; padding: 15px; text-align: center; border: 1px solid #ddd; border-collapse: collapse;">QUANTITY</th>
                    <th style="font-size: 16px; padding: 15px; text-align: center; border: 1px solid #ddd; border-collapse: collapse;">PRICE </th>
                </tr>
                @foreach($cart as $product)
                <tr>
                    <td style="border: 1px solid #ddd; border-collapse: collapse;">
                        <img clicktracking="off" src="{{asset('storage/product/small/'.$product->image)}}" alt="" width="70">
                    </td>
                    <td valign="top" style="border: 1px solid #ddd; border-collapse: collapse; padding-left: 15px;">
                        <h5 style="margin-top: 15px; color: #444; text-align: left; font-weight: 400;">{{ $product->title }}</h5>
                    </td>
                    <td valign="top" style="border: 1px solid #ddd; border-collapse: collapse; padding-left: 15px;">
                        <h5 style="font-size: 14px; color:#444;margin-top: 10px; text-align: left; font-weight: 400;">QTY : <span>{{ $product->quantity }}</span></h5>
                    </td>
                    <td valign="top" style="border: 1px solid #ddd; border-collapse: collapse; padding-left: 15px;">
                        <h5 style="font-size: 14px; color:#444;margin-top:15px">
                            <b>
                                @if($product->offer_price)
                                    <h5>₹ {{ $price = $product->offer_price }}</h5>
                                @else
                                    <h5>₹ {{ $price = $product->price }}</h5>
                                @endif
                            </b>
                        </h5>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="2"
                        style="border: 1px solid #ddd; border-collapse: collapse; line-height: 49px;font-size: 13px;color: #000000;padding-left: 20px;text-align:left;border-right: unset;">
                        Products:</td>
                    <td colspan="3" class="price"
                        style="border: 1px solid #ddd; border-collapse: collapse; line-height: 49px;text-align: right;padding-right: 28px;font-size: 13px;color: #000000;border-left: unset;">
                        <b>₹2600.00</b></td>
                </tr>
                <tr>
                    <td colspan="2"
                        style="border: 1px solid #ddd; border-collapse: collapse; line-height: 49px;font-size: 13px;color: #000000;padding-left: 20px;text-align:left;border-right: unset;">
                        Discount :</td>
                    <td colspan="3" class="price"
                        style="border: 1px solid #ddd; border-collapse: collapse; line-height: 49px;text-align: right;padding-right: 28px;font-size: 13px;color: #000000;border-left: unset;">
                        <b>₹10</b></td>
                </tr>
                <tr>
                    <td colspan="2" style="border: 1px solid #ddd; border-collapse: collapse; line-height: 49px; font-size: 13px;color: #000000;padding-left: 20px;text-align:left;border-right: unset;">
                        Gift Wripping: </td>
                    <td colspan="3" style="border: 1px solid #ddd; border-collapse: collapse; line-height: 49px;text-align: right;padding-right: 28px;font-size: 13px;color: #000000;border-left: unset;">
                        <b>₹2600</b></td>
                </tr>
                <tr>
                    <td colspan="2" style="line-height: 49px;font-size: 13px;color: #000000; padding-left: 20px;text-align:left;border-right: unset;">Shipping :</td>
                    <td colspan="3" style="line-height: 49px;text-align: right;padding-right: 28px;font-size: 13px;color: #000000;border-left: unset;">
                        <b>₹30</b></td>
                </tr>
                <tr>
                    <td colspan="2" style="border: 1px solid #ddd; border-collapse: collapse; line-height: 49px;font-size: 13px;color: #000000; padding-left: 20px;text-align:left;border-right: unset;">TOTAL PAID :</td>
                    <td colspan="3" class="price"
                        style="border: 1px solid #ddd; border-collapse: collapse; line-height: 49px;text-align: right;padding-right: 28px;font-size: 13px;color: #000000;border-left: unset;">
                        <b>₹2600</b></td>
                </tr>
            </table>
            <table align="center" cellpadding="0" cellspacing="0" border="0"
                   style="width: 100%;margin-top: 30px;    margin-bottom: 30px;">
                <tbody>
                <tr>
                    <td
                        style="font-size: 13px; font-weight: 400; color: #444444; letter-spacing: 0.2px;width: 50%;">
                        <h5
                            style="font-size: 16px; font-weight: 500;color: #000; line-height: 16px; padding-bottom: 13px; border-bottom: 1px solid #e6e8eb; letter-spacing: -0.65px; margin-top:0; margin-bottom: 13px; text-align: left;">
                            DILIVERY ADDRESS</h5>
                        <p
                            style="text-align: left;font-weight: normal; font-size: 14px; color: #000000;line-height: 21px;    margin-top: 0;">
                            {{ $address['address'].', '.$address['locality'].', '.$address['city'].', '.$address['state'].', ('.$address['pincode'].')' }}
                        </p>
                    </td>
                    <td width="57" height="25" class="user-info"><img
                            src="{{ asset('assets/images/email-temp/space.jpg') }}" alt=" " height="25" width="57"></td>
                    <td class="user-info"
                        style="font-size: 13px; font-weight: 400; color: #444444; letter-spacing: 0.2px;width: 50%;">
                        <h5
                            style="font-size: 16px;font-weight: 500;color: #000; line-height: 16px; padding-bottom: 13px; border-bottom: 1px solid #e6e8eb; letter-spacing: -0.65px; margin-top:0; margin-bottom: 13px;">
                            SHIPPING ADDRESS</h5>
                        <p
                            style="text-align: left;font-weight: normal; font-size: 14px; color: #000000;line-height: 21px;    margin-top: 0;">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad animi delectus, dolorem ducimus eos est et illo iste laborum obcaecati repudiandae tempore temporibus, veniam! Delectus libero quasi qui voluptas voluptatibus.
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>
            <table class="main-bg-light" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="text-align: center; background-color: #fafafa; margin-top: 0;">
                <tr>
                    <td style="padding: 30px;">
                        <div>
                            <h4 style="color: #444444; font-size: 22px; font-weight: bold;   padding-bottom: 0; text-transform: uppercase; display: inline-block; line-height: 1; margin:0;text-align: center;">Follow us</h4>
                        </div>
                        <table border="0" cellpadding="0" cellspacing="0" align="center"
                               style="margin-top:20px; text-align: center;">
                            <tr>
                                <td>
                                    <a style="text-decoration: none; margin: 5px;" href="#"><img clicktracking="off" src="{{ asset('assets/images/email-temp/facebook.png') }}" alt=""></a>
                                </td>
                                <td>
                                    <a style="text-decoration: none; margin: 5px;" href="#"><img clicktracking="off" src="{{ asset('assets/images/email-temp/youtube.png') }}" alt=""></a>
                                </td>
                                <td>
                                    <a style="text-decoration: none; margin: 5px;" href="#"><img clicktracking="off" src="{{ asset('assets/images/email-temp/twitter.png') }}" alt=""></a>
                                </td>
                                <td>
                                    <a style="text-decoration: none; margin: 5px;" href="#"><img clicktracking="off" src="{{ asset('assets/images/email-temp/gplus.png') }}" alt=""></a>
                                </td>
                                <td>
                                    <a style="text-decoration: none; margin: 5px;" href="#"><img clicktracking="off" src="{{ asset('assets/images/email-temp/linkedin.png') }}" alt=""></a>
                                </td>
                                <td>
                                    <a style="text-decoration: none; margin: 5px;" href="#"><img clicktracking="off" src="{{ asset('assets/images/email-temp/pinterest.png') }}" alt=""></a>
                                </td>
                            </tr>
                        </table>
                        <div style="border-top: 1px solid #ddd; margin: 20px auto 0;"></div>
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 20px auto 0;">
                            <tr>
                                <td>
                                    <a href="#" style="font-size:13px; text-decoration: none;">Want to change how you receive these emails?</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p style="font-size:13px; margin:0; text-decoration: none; ">2018 - 19 Copy Right by Themeforest powerd by Pixel
                                        Strap</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="#" style="font-size:13px; margin:0;text-decoration: underline;">Unsubscribe</a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    </tbody>
</table>

</body>
</html>
