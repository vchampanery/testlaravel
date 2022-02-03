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
Route::get('/signup', 'App\Http\Controllers\loginController@signup')->name('login.signup');
Route::post('/register', 'App\Http\Controllers\loginController@register')->name('register.submit');

Route::group(['prefix' => '/user//'], function () {
    Route::get('list', 'App\Http\Controllers\SystemUserController@list')->name('systemuser.list');
    Route::get('add', 'App\Http\Controllers\SystemUserController@add')->name('systemuser.add');
    Route::get('delete/{id}', 'App\Http\Controllers\SystemUserController@delete')->name('systemuser.delete');    
});
Route::get('/addexpense', 'App\Http\Controllers\SystemUserController@addexpense')->name('addexpense');






