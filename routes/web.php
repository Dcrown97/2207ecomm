<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Clear Cache facade value:
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function () {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function () {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function () {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function () {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function () {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

Route::get('/', 'FrontController@index');
Route::get('/our-story', function () {
    return view('newstory');
})->name('story');
Route::get('/contact', function () {
    return view('newcontact');
})->name('contact');
Route::get('/shop', 'FrontController@shop')->name('shop');
Route::get('/cart', 'FrontController@cart')->name('cart');
Route::get('/products/view/{id}', 'FrontController@view_product')->name('product.view');
Route::get('/categories/view/{id}', 'FrontController@view_category')->name('cat.view');
Route::post('/wishlist/add', 'FrontController@add_wishlist')->name('wishlist.add');
Route::delete('/wishlist/delete', 'FrontController@delete_wishlist')->name('wishlist.delete');
Route::post('/cart/add', 'FrontController@add_cart')->name('cart.add');
Route::delete('/cart/delete', 'FrontController@delete_cart')->name('delete.cart');
Route::post('/products/comment/add', 'FrontController@post_comment')->name('post.comment');
Route::post('/products/review/add', 'FrontController@post_review')->name('post.review');
Route::post('/contact/post', 'FrontController@post_contact')->name('post.contact');
Route::post('/checkout', 'FrontController@checkout')->name('checkout');
Route::post('/payment', 'FrontController@payment')->name('payment');
Route::get('/confirm', 'FrontController@confirm')->name('confirm');
Route::post('/coupon', 'FrontController@coupon')->name('coupon');
Route::get('/currency/{cur}', 'FrontController@currency')->name('currency');
Route::get('/pop', 'FrontController@pop')->name('pop');

Auth::routes();

Route::get('login', 'Auth\LoginController@getLogin')->name('login');
Route::get('/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('users.showResetForm');
Route::get('/resetemail/{user_type}', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('users.showResetEmailForm');
Route::post('/reset', 'Auth\ResetPasswordController@reset')->name('users.password.update');

Route::get('admin/login', 'Auth\AdminAuthController@getLogin')->name('adminLogin');
Route::post('admin/login', 'Auth\AdminAuthController@postLogin')->name('adminLoginPost');
Route::get('admin/logout', 'Auth\AdminAuthController@logout')->name('adminLogout');

Route::prefix('admin')->group(function () {

    Route::get('/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admins.showResetForm');
    Route::get('/resetemail/{user_type}', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admins.showResetEmailForm');
    Route::post('/reset', 'Auth\ResetPasswordController@reset')->name('admins.password.update');
    Route::get('/register', 'Auth\AdminRegistrationController@index')->name('admins.register');
    Route::post('/register/submit', 'Auth\AdminRegistrationController@registerAdmin')->name('admins.register.post');

    Route::group(['middleware' => 'adminauth'], function () {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        Route::get('/categories/add', 'CategoriesController@add')->name('add.category');
        Route::post('/categories/store', 'CategoriesController@store')->name('store.category');
        Route::put('/categories/update', 'CategoriesController@store')->name('update.category');
        Route::get('/categories', 'CategoriesController@index')->name('categories');
        Route::get('/categories/view/{id}', 'CategoriesController@view')->name('view.category');
        Route::delete('/categories/delete/{id}', 'CategoriesController@delete')->name('delete.category');
        Route::get('/products/add', 'ProductsController@add')->name('add.product');
        Route::post('/products/store', 'ProductsController@store')->name('store.product');
        Route::put('/products/update', 'ProductsController@store')->name('update.product');
        Route::get('/products', 'ProductsController@index')->name('products');
        Route::get('/products/view/{id}', 'ProductsController@view')->name('view.product');
        Route::delete('/products/delete/{id}', 'ProductsController@delete')->name('delete.product');
        Route::post('/products/image/store', 'ProductsController@store_image')->name('store.image');
        Route::delete('/products/image/delete/{id}', 'ProductsController@delete_image')->name('delete.image');
        Route::get('/products', 'ProductsController@index')->name('products');
        Route::get('/products/view/{id}', 'ProductsController@view')->name('view.product');
        Route::put('/products/post/{id}', 'ProductsController@post')->name('post.product');
        Route::delete('/products/delete/{id}', 'ProductsController@delete')->name('delete.product');
        Route::get('/tags', 'TagsController@index')->name('tags');
        Route::get('/tags/view/{id}', 'TagsController@view')->name('view.tag');
        Route::delete('/tags/delete/{id}', 'TagsController@delete')->name('delete.tag');
        Route::delete('/products/tags/remove/{product_id}/{tag_id}', 'ProductsController@remove_tag')->name('remove.tag');
        Route::post('/products/tags/add', 'ProductsController@add_tag')->name('attach.tag');
        Route::post('/products/sizes/add', 'ProductsController@add_size')->name('add.size');
        Route::delete('/products/sizes/delete/{id}', 'ProductsController@delete_size')->name('delete.size');
        Route::put('/products/sizes/edit', 'ProductsController@add_size')->name('edit.size');
        Route::post('/products/specs/add', 'ProductsController@add_spec')->name('add.spec');
        Route::delete('/products/specs/delete/{id}', 'ProductsController@delete_spec')->name('delete.spec');
        Route::put('/products/specs/edit', 'ProductsController@add_spec')->name('edit.spec');
        Route::get('/contacts', 'ContactsController@index')->name('contacts');
        Route::get('/contacts/view/{id}', 'ContactsController@view')->name('view.contact');
        Route::delete('/contacts/delete/{id}', 'ContactsController@delete')->name('delete.message');
        Route::post('/shipping/add', 'ShippingController@add')->name('add.shipping');
        Route::put('/shipping/edit', 'ShippingController@add')->name('edit.shipping');
        Route::get('/shipping', 'ShippingController@index')->name('shipping');
        Route::get('/shipping/delete/{id}', 'ShippingController@delete')->name('delete.shipping');
        Route::get('/coupons', 'CouponController@index')->name('coupons');
        Route::post('/coupons/store', 'CouponController@store')->name('store.coupon');
        Route::delete('/coupons/delete/{id}', 'CouponController@delete')->name('delete.coupon');
        Route::get('/sales', 'SalesController@report')->name('sales');
        Route::get('/sales/{id}', 'SalesController@view')->name('view.sale');
    });
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/cart/count', [FrontController::class, 'getCartCount'])->name('cart.count');
Route::get('/wishlist/count', [FrontController::class, 'getWishlistCount'])->name('wishlist.count');
