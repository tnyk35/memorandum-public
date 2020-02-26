<?php

use Illuminate\Http\Request;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
// Route::group(['middleware' => 'guest:api', 'prefix' => 'auth'], function () {
// });

// 認証なし
Route::group(['middleware' => 'api'], function () {
    // Route::post('/auth/login', 'Api\AuthController@login');
    
    // Articles
    Route::get('/articles', 'Api\ArticlesController@index');
    Route::get('/articles/{id}', 'Api\ArticlesController@show');
    
});

// 認証あり
// Route::group(['middleware' => 'auth:api'], function () {
//     Route::post('/auth/logout', 'Api\AuthController@logout');
//     Route::post('/auth/refresh', 'Api\AuthController@refresh');
//     Route::post('/auth/me', 'Api\AuthController@me');

//     // Articles
//     Route::post('/articles', 'Api\ArticlesController@store');
//     Route::put('/articles/{id}', 'Api\ArticlesController@update');
//     Route::delete('/articles/{id}', 'Api\ArticlesController@destroy');

// });