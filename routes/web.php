<?php

use App\Http\Controllers\Frontend\SiteController;
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
    return view('frontend.home');
});


//guest routes
Route::prefix('user')->name('user.')->group(function(){
    Route::get('/login','Frontend\SiteController@loginForm')->name('login-form');
    Route::post('/login','Frontend\SiteController@login')->name('login');
    Route::get('/logout','Frontend\SiteController@logout')->name('logout');
    Route::get('/register','Frontend\SiteController@showRegisterForm')->name('showregistration');
    Route::post('/register','Frontend\SiteController@register')->name('registration');

});

//Admin routes
Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/dashboard','Admin\DashboardController@index')->name('dashboard');
    
    Route::prefix('category')->name('category.')->group(function(){
        Route::get('/', 'Admin\CategoryController@index')->name('index');
        Route::get('/create', 'Admin\CategoryController@create')->name('create');
        Route::post('/store', 'Admin\CategoryController@store')->name('store');
        Route::delete('/{id}', 'Admin\CategoryController@destroy')->name('destroy');
    });

});
  