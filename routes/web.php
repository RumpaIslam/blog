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


//Route::get('/user/register', [SiteController::class, 'showRegisterForm']);


Route::prefix('user')->name('user.')->group(function(){
Route::get('/login','Frontend\SiteController@loginForm')->name('login-form');
Route::post('/login','Frontend\SiteController@login')->name('login');
Route::get('/register','Frontend\SiteController@showRegisterForm')->name('showregistration');
Route::post('/register','Frontend\SiteController@register')->name('registration');


});
