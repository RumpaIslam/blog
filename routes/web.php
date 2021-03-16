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
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function(){
    Route::get('/dashboard','Admin\DashboardController@index')->name('dashboard');
    
   //category routes
    Route::resource('category', '\App\Http\Controllers\Admin\CategoryController');
   //post routes
    Route::resource('post', '\App\Http\Controllers\Admin\PostController');




});
  