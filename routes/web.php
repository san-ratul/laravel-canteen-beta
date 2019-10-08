<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/developers', function () {
    return view('developers');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/approval', 'HomeController@approval')->name('approval');

    Route::middleware(['approved'])->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/profile/{user}','UserController@profileIndex');
        Route::get('/order_food','OrderController@index');
        Route::post('/add-to-cart','OrderController@cart');
        Route::get('/cart/{user}','OrderController@showCart');
        Route::delete('/delete-cart-item/{cart}','OrderController@deleteCart');
        Route::get('/place-order/{user}','OrderController@placeOrder');
        Route::get('/show-order-history/{user}','OrderController@showOrder');
    });

    Route::middleware(['admin'])->group(function () {
        Route::get('/users', 'UserController@index')->name('admin.users.index');
        Route::get('/order-list','OrderController@allOrders');
        Route::get('/users/{user_id}/approve', 'UserController@approve')->name('admin.users.approve');
        Route::resource('/food-items','FoodItemController');
    });
});