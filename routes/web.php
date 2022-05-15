<?php

use Illuminate\Support\Facades\Route;

//      PUBLIC
Route::get('/', App\Http\Livewire\Public\Home::class)->name('home');
Route::get('products/{category?}', App\Http\Livewire\Public\Products::class)->name('products');
Route::get('product/{slug}', App\Http\Livewire\Public\ProductDetail::class)->name('product_details');
Route::get('register', App\Http\Livewire\Public\Register::class)->middleware('guest')->name('register');
Route::get('verification/{user}/{code}', App\Http\Livewire\Public\Component\EmailVerify::class)->name('email_verify');
Route::get('sendEmailVerification', App\Http\Livewire\Public\Component\ResendEmailLink::class)->name('send_email_verify');
Route::get('collection/{slug?}', App\Http\Livewire\Public\Collection::class)->name('collection');
Route::get('cart', App\Http\Livewire\Public\Component\Cart::class)->name('cart');
Route::get('checkout', App\Http\Livewire\Public\Component\Checkout::class)->name('checkout');
Route::get('italian-leather', App\Http\Livewire\Public\ItalianLeather::class)->name('italianLeather');
Route::get('buy', App\Http\Livewire\Public\BuyNow::class)->name('buyNow');

Route::get('login', App\Http\Livewire\Public\Login::class)->middleware(['guest'])->name('login');
//this confirm payment for cart
Route::get('confirm-payment', App\Http\Livewire\Public\Component\ConfirmPayment::class)->name('confirm-payment');
//this confirm payment for direct buy
Route::get('payment', App\Http\Livewire\Public\Component\BuyNowConfirmPayment::class)->name('buyNow-confirm-payment');

Route::get('order-success', App\Http\Livewire\Public\Component\OrderSuccess::class)->name('order-success');

Route::get('track-order', App\Http\Livewire\Public\OrderTrack::class)->name('track-order');

Route::get('account/{account?}', App\Http\Livewire\Public\Account::class)->name('public.account')->middleware(['auth']);

Route::group(['prefix'=>'login'], function (){
    //  GOOGLE
    Route::get('google', [App\Http\Controllers\login::class, 'google'])->name('google_login');
    Route::get('google/callback', [App\Http\Controllers\login::class, 'googleCallback']);
    //  FACEBOOK
    Route::get('facebook', [App\Http\Controllers\login::class, 'facebook'])->name('facebook_login');
    Route::get('facebook/callback', [App\Http\Controllers\login::class, 'facebookCallback']);
    //  TWITTER
    Route::get('twitter', [App\Http\Controllers\login::class, 'twitter'])->name('twitter_login');
    Route::get('twitter/callback', [App\Http\Controllers\login::class, 'twitterCallback']);
    //  LINKEDIN
    Route::get('linkedin', [App\Http\Controllers\login::class, 'linkedin'])->name('linkedin_login');
    Route::get('linkedin/callback', [App\Http\Controllers\login::class, 'linkedinCallback']);
});

//      ADMIN
Route::get('admin', App\Http\Livewire\Admin\Login::class)->name('admin_login')->middleware('admin');
Route::group(['prefix'=>'admin', 'middleware'=>['R_admin'], /*'as'=>'admin.'*/], function (){
    Route::get('dashboard', App\Http\Livewire\Admin\Dashboard::class)->name('dashboard');
    Route::get('collection', App\Http\Livewire\Admin\Collections::class)->name('admin.collection');
//    Route::get('home/{component?}', App\Http\Livewire\Admin\Home::class)->name('admin_home');
    Route::group(['prefix'=>'home'], function (){
        Route::get('slider', App\Http\Livewire\Admin\Component\Slides::class)->name('slider');
        Route::get('collection_banner', App\Http\Livewire\Admin\Component\CollectionBanner::class)->name('collection_banner');
    });
    Route::group(['prefix'=>'product'], function (){
        Route::get('category', App\Http\Livewire\Admin\Component\ProductCategory::class)->name('product_category');
        Route::get('sub-category', App\Http\Livewire\Admin\Component\SubCategory::class)->name('sub_category');
        Route::get('/', App\Http\Livewire\Admin\Component\Products::class)->name('admin.products');
        Route::get('addColor', App\Http\Livewire\Admin\Component\SelectColor::class)->name('admin.color');
    });
    Route::get('coupon', App\Http\Livewire\Admin\Coupon::class)->name('coupon');
    Route::get('profile', App\Http\Livewire\Admin\Profile::class)->name('admin.profile');

    Route::get('orders', App\Http\Livewire\Admin\Orders::class)->name('admin.orders');

});
//      Test
Route::get('test', App\Http\Livewire\Test::class);
