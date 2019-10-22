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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/auth', 'namespace' => 'Auth'], function(){
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

Route::group(['prefix' => '/sitemanager', 'namespace' => 'SiteManager'], function(){
    Route::group(['prefix' => '/videos'], function(){
        Route::get('/', 'VideoController@index');
        Route::post('/', 'VideoController@store');
        Route::get('/{id}', 'VideoController@show');
        Route::patch('/{id}', 'VideoController@update');
        Route::delete('/{id}', 'VideoController@destroy');
    });
});

Route::namespace('website')->group(function(){
    Route::prefix('post')->group(function(){
        Route::get('/', 'HomeController@index');
    });
});
