<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', 'Api\UserController@register');
Route::post('login', 'Api\UserController@authenticate');




Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('user', 'Api\UserController@getAuthenticatedUser');

    //category api route
    Route::get('categories', 'Admin\CategoryController@get_list_api');
    Route::post('catadd', 'Api\CategoryAPI@add');
    Route::get('view_category/{id}', 'Api\CategoryAPI@view');
    Route::put('edit_category/{id}', 'Api\CategoryAPI@update');
    Route::put('delete_category/{id}', 'Api\CategoryAPI@delete');
    //post api route
    Route::get('posts', 'Api\PostAPI@get_list_api');
    Route::post('postadd', 'Api\PostAPI@add');
    Route::get('view_post/{id}', 'Api\PostAPI@view');
    Route::put('edit_post/{id}', 'Api\PostAPI@update');
    Route::put('delete_post/{id}', 'Api\PostAPI@delete');




    

});



//simple api=====================================>>

Route::get('data' , 'testapiController@getdata');

