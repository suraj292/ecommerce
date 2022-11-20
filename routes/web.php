<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Public;
use App\Http\Livewire\Admin;
use App\Http\Controllers\login as Login;
use App\Http\Controllers\BlogController as Blog;

//      PUBLIC
Route::get('/', Public\Home::class)->name('home');

//Route::get('products/{category?}', Public\Products::class)->name('products');

Route::get('product', Public\Products::class)->name('products');
Route::get('product_detail/{slug}', Public\ProductDetail::class)->name('product_details');

//Route::view('product2', 'products');
//Route::view('leathers-and-aesthetics', 'leatherAndArts')->name('leather&aesthetics');
Route::get('leathers-and-aesthetics', Public\LeatherAndAesthetics::class)->name('leather&aesthetics');
//blogs
Route::view('blog', 'blog')->name('blog');
Route::view('blog/{id}', 'blog-detail')->name('blog.detail');

//Route::get('product/{slug}', Public\ProductDetail::class)->name('product_details');
Route::get('register', Public\Register::class)->middleware('guest')->name('register');
Route::get('verification', Public\Component\EmailVerify::class)->name('email_verify');
Route::get('sendEmailVerification', Public\Component\ResendEmailLink::class)->name('send_email_verify');
Route::get('collection/{slug?}', Public\Collection::class)->name('collection');
Route::get('cart', Public\Component\Cart::class)->name('cart');
Route::get('checkout', Public\Component\Checkout::class)->name('checkout');
Route::get('italian-leather', Public\ItalianLeather::class)->name('italianLeather');
Route::get('buy', Public\BuyNow::class)->name('buyNow');

Route::get('login', Public\Login::class)->middleware(['guest'])->name('login');
//this confirms payment for cart
Route::get('confirm-payment', Public\Component\ConfirmPayment::class)->name('confirm-payment');
//this confirms payment for direct buy
Route::get('payment', Public\Component\BuyNowConfirmPayment::class)->name('buyNow-confirm-payment');

Route::get('order-success', Public\Component\OrderSuccess::class)->name('order-success');

Route::get('track-order', Public\OrderTrack::class)->name('track-order');

Route::get('account/{account?}', Public\Account::class)->name('public.account')->middleware(['auth']);

Route::group(['prefix'=>'login'], function (){
    //  GOOGLE
    Route::get('google', [Login::class, 'google'])->name('google_login');
    Route::get('google/callback', [Login::class, 'googleCallback']);
    //  FACEBOOK
    Route::get('facebook', [Login::class, 'facebook'])->name('facebook_login');
    Route::get('facebook/callback', [Login::class, 'facebookCallback']);
    //  TWITTER
    Route::get('twitter', [Login::class, 'twitter'])->name('twitter_login');
    Route::get('twitter/callback', [Login::class, 'twitterCallback']);
    //  LINKEDIN
    Route::get('linkedin', [Login::class, 'linkedin'])->name('linkedin_login');
    Route::get('linkedin/callback', [Login::class, 'linkedinCallback']);
});

//      ADMIN
Route::get('admin', Admin\Login::class)->name('admin_login')->middleware('admin');
Route::group(['prefix'=>'admin', 'middleware'=>['R_admin'], /*'as'=>'admin.'*/], function (){
    Route::get('dashboard', Admin\Dashboard::class)->name('dashboard');
    Route::get('collection', Admin\Collections::class)->name('admin.collection');
//    Route::get('home/{component?}', Admin\Home::class)->name('admin_home');
    Route::group(['prefix'=>'home'], function (){
        Route::get('home-page', Admin\Component\HomeVideoBanner::class)->name('home_video_banner');
    });
    Route::group(['prefix'=>'product'], function (){
        Route::get('category', Admin\Component\ProductCategory::class)->name('product_category');
        Route::get('sub-category', Admin\Component\SubCategory::class)->name('sub_category');
        Route::get('/', Admin\Component\Products::class)->name('admin.products');
        Route::get('addColor', Admin\Component\SelectColor::class)->name('admin.color');
    });
    Route::get('coupon', Admin\Coupon::class)->name('coupon');
//        ->middleware('R_editor');
    Route::get('profile', Admin\Profile::class)->name('admin.profile');

    Route::get('stocks', Admin\Stocks::class)->name('admin.stocks');
    Route::get('orders', Admin\Orders::class)->name('admin.orders');
    Route::get('sale', Admin\Sale::class)->name('admin.sale');
    Route::get('gift-card', Admin\GiftCard::class)->name('admin.giftCard');

    Route::get('logistics-rate', Admin\LogisticsRate::class)->name('admin.logistics_rate');

    Route::get('leather&aesthetics', Admin\LeatherAsthetics::class)->name('admin.leather&aesthetics');
    Route::group(['prefix'=>'blog'], function (){
        Route::get('/', [Blog::class, 'index'])->name('admin.blog');
        Route::post('blog-thumbnail', [Blog::class, 'blogThumbnail'])->name('admin.blog.thumbnail');
        Route::get('unpublished')->name('admin.blog.unpublished');
        Route::get('published')->name('admin.blog.published');
    });
});
//      Blog
Route::view('blog', 'blog')->name('blog');

//      Test
//Route::get('test', App\Http\Livewire\Test::class);
Route::get('test', function (){
    $pdf = Barryvdh\DomPDF\Facade\Pdf::loadView('invoice');
//    return $pdf->download('invoice.pdf');
    return $pdf->stream();
});
Route::get('demo', function (){
    $data = [
        'name'=>'suraj',
        'userId'=>2,
        'link'=>'verification link',
        'email'=>'surajkumarsharma123@gmail.com',
    ];
    App\Jobs\newUserEmailVerification::dispatch($data);
});
