<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Public;
use App\Http\Livewire\Admin;
use App\Http\Controllers\login;

//      PUBLIC
Route::get('/', Public\Home::class)->name('home');
Route::get('products/{category?}', Public\Products::class)->name('products');
Route::get('product/{slug}', Public\ProductDetail::class)->name('product_details');
Route::get('register', Public\Register::class)->middleware('guest')->name('register');
Route::get('verification/{user}/{code}', Public\Component\EmailVerify::class)->name('email_verify');
Route::get('sendEmailVerification', Public\Component\ResendEmailLink::class)->name('send_email_verify');
Route::get('collection/{slug?}', Public\Collection::class)->name('collection');
Route::get('cart', Public\Component\Cart::class)->name('cart');
Route::get('checkout', Public\Component\Checkout::class)->name('checkout');
Route::get('italian-leather', Public\ItalianLeather::class)->name('italianLeather');
Route::get('buy', Public\BuyNow::class)->name('buyNow');

Route::get('login', Public\Login::class)->middleware(['guest'])->name('login');
//this confirm payment for cart
Route::get('confirm-payment', Public\Component\ConfirmPayment::class)->name('confirm-payment');
//this confirm payment for direct buy
Route::get('payment', Public\Component\BuyNowConfirmPayment::class)->name('buyNow-confirm-payment');

Route::get('order-success', Public\Component\OrderSuccess::class)->name('order-success');

Route::get('track-order', Public\OrderTrack::class)->name('track-order');

Route::get('account/{account?}', Public\Account::class)->name('public.account')->middleware(['auth']);

Route::group(['prefix'=>'login'], function (){
    //  GOOGLE
    Route::get('google', [login::class, 'google'])->name('google_login');
    Route::get('google/callback', [login::class, 'googleCallback']);
    //  FACEBOOK
    Route::get('facebook', [login::class, 'facebook'])->name('facebook_login');
    Route::get('facebook/callback', [login::class, 'facebookCallback']);
    //  TWITTER
    Route::get('twitter', [login::class, 'twitter'])->name('twitter_login');
    Route::get('twitter/callback', [login::class, 'twitterCallback']);
    //  LINKEDIN
    Route::get('linkedin', [login::class, 'linkedin'])->name('linkedin_login');
    Route::get('linkedin/callback', [login::class, 'linkedinCallback']);
});

//      ADMIN
Route::get('admin', Admin\Login::class)->name('admin_login')->middleware('admin');
Route::group(['prefix'=>'admin', 'middleware'=>['R_admin'], /*'as'=>'admin.'*/], function (){
    Route::get('dashboard', Admin\Dashboard::class)->name('dashboard');
    Route::get('collection', Admin\Collections::class)->name('admin.collection');
//    Route::get('home/{component?}', App\Http\Livewire\Admin\Home::class)->name('admin_home');
    Route::group(['prefix'=>'home'], function (){
        Route::get('slider', Admin\Component\Slides::class)->name('slider');
        Route::get('collection_banner', Admin\Component\CollectionBanner::class)->name('collection_banner');
    });
    Route::group(['prefix'=>'product'], function (){
        Route::get('category', Admin\Component\ProductCategory::class)->name('product_category');
        Route::get('sub-category', Admin\Component\SubCategory::class)->name('sub_category');
        Route::get('/', Admin\Component\Products::class)->name('admin.products');
        Route::get('addColor', Admin\Component\SelectColor::class)->name('admin.color');
    });
    Route::get('coupon', Admin\Coupon::class)->name('coupon');
    Route::get('profile', Admin\Profile::class)->name('admin.profile');

    Route::get('stocks', Admin\Stocks::class)->name('admin.stocks');
    Route::get('orders', Admin\Orders::class)->name('admin.orders');

});
//      Blog
Route::view('blog', 'blog');

//      Test
Route::get('test', App\Http\Livewire\Test::class);
