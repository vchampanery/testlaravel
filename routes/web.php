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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/login', 'App\Http\Controllers\loginController@index')->name('login.index');
Route::post('/loginsubmit', 'App\Http\Controllers\loginController@loginsubmit')->name('login.loginsubmit');
Route::get('/logout', 'App\Http\Controllers\loginController@logout')->name('login.logout');

Route::group(['prefix' => '/product//','middleware' => 'checkAuth'], function () {
    Route::get('owner/list', 'App\Http\Controllers\ProductController@ownerList')->name('product.ownerList');
    Route::get('user/list', 'App\Http\Controllers\ProductController@userList')->name('product.userList');
    
    Route::get('list', 'App\Http\Controllers\ProductController@list')->name('product.list')->middleware('checkRole');
    Route::get('list/indexyjr', 'App\Http\Controllers\ProductController@indexYjr')->name('product.indexYjr');
    Route::post('addedit', 'App\Http\Controllers\ProductController@addedit')->name('product.addedit');
    Route::post('updateqty', 'App\Http\Controllers\ProductController@updateqty')->name('product.updateqty');
    Route::get('add', 'App\Http\Controllers\ProductController@add')->name('product.add');
    Route::get('edit/{id}', 'App\Http\Controllers\ProductController@edit')->name('product.edit');
    Route::delete('delete', 'App\Http\Controllers\ProductController@delete')->name('product.delete');

    Route::get('detail/{id}', 'App\Http\Controllers\ProductController@detail')->name('product.detail');
    Route::get('addtocart/{id}', 'App\Http\Controllers\ProductController@addtocart')->name('product.addtocart');
    Route::get('cart', 'App\Http\Controllers\ProductController@cart')->name('product.cart');
    Route::get('order', 'App\Http\Controllers\ProductController@order')->name('product.order');

});




