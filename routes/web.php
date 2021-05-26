<?php

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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/categories/{id}', 'CategoryController@detail')->name('categories-detail');

Route::get('/details/{id}', 'DetailController@index')->name('detail');
Route::post('/details/{id}', 'DetailController@add')->name('detail-add');

Route::post('/checkout/callback', 'CheckoutController@callback')->name('midtrans-callback');

Route::get('/success', 'CartController@success')->name('success');

Route::get('/register/success', 'Auth\RegisterController@success')->name('register-success');



Route::group(['middleware' => ['auth']], function () {

    Route::get('/cart', 'CartController@index')->name('cart');
    Route::delete('/cart/{id}', 'CartController@delete')->name('cart-delete');

    Route::post('/checkout', 'CheckoutController@process')->name('checkout');

    Route::get('/dashboard', 'DashboardController@index')
        ->name('dashboard');

    Route::get('/dashboard/products/{id}', 'DashboardProductController@details')
        ->name('dashboard-product-detail');

    Route::get('/dashboard/myorder', 'DashboardMyOrderController@index')
        ->name('dashboard-myorder');
    Route::get('/dashboard/myorder/{id}', 'DashboardMyOrderController@detail')
        ->name('dashboard-myorder-detail');


    Route::get('/dashboard/account', 'DashboardSettingController@account')
        ->name('dashboard-setting-account');
    Route::post('/dashboard/account/{redirect}', 'DashboardSettingController@update')
        ->name('dashboard-setting-redirect');
});



Route::prefix('admin')
    ->namespace('Admin')
    ->group(function () {
        Route::get('/', 'DashboardController@index')->name('admin-dashboard');
        Route::resource('category', 'CategoryController');
        Route::resource('user', 'UserController');
        Route::resource('product', 'ProductController');
        Route::resource('product-gallery', 'ProductGalleryController');
        Route::resource('transaction', 'TransactionController');
        Route::resource('product-store', 'MyProductController');

        Route::get('/dashboard/transactions', 'DashboardTransactionsController@index')
            ->name('dashboard-transactions');
        Route::get('/dashboard/transactions/{id}', 'DashboardTransactionsController@detail')
            ->name('dashboard-transactions-detail');
        Route::post('/dashboard/transactions/{id}', 'DashboardTransactionsController@update')
            ->name('dashboard-transactions-update');

        Route::post('/dashboard/products/gallery/upload', 'DashboardProductController@uploadGallery')
            ->name('dashboard-product-gallery-upload');
        Route::get('/dashboard/products/gallery/delete/{id}', 'DashboardProductController@deleteGallery')
            ->name('dashboard-product-gallery-delete');

        Route::get('/dashboard/products', 'DashboardProductController@index')
            ->name('dashboard-product');
        Route::get('/dashboard/products/add', 'DashboardProductController@create')
            ->name('dashboard-product-create');
        Route::post('/dashboard/products', 'DashboardProductController@store')
            ->name('dashboard-product-store');
        Route::post('/dashboard/products/{id}', 'DashboardProductController@update')
            ->name('dashboard-product-update');

        Route::get('/dashboard/settings', 'DashboardSettingController@store')
            ->name('dashboard-setting-store');
    });
