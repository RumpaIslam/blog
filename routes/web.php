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

Route::get('/user/register','Frontend\SiteController@showRegisterForm')->name('showregistration');
Route::post('/user/register','Frontend\SiteController@Register')->name('registration');