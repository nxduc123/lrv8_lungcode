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

Route::get('/', 'HomeController@index') -> name('home.index');
Route::get('/shop', 'HomeController@index') -> name('home.shop');


Route::group(['prefix' => 'admin'], function(){
    Route::get('/', 'AdminController@dashboard') -> name('admin.dashboard');
    Route::resources([
                'category' =>   'CategoryController',
                'product' =>    'ProductController',
                'banner' =>    'BannerController',
                'account' =>    'AccountController',
                'blog' =>    'BlogController',
                'order' =>    'OrderDetailController' 
    ]);
});