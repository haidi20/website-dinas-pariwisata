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

Route::namespace('website')->group(function(){
    Route::prefix('home')->group(function(){
        Route::get('post', 'HomeController@post');
    });
});

Route::group(['prefix' => 'sitemanager', 'namespace' => 'SiteManager'], function(){
    Route::group(['prefix' => '/videos'], function(){
        Route::get('/', 'VideoController@index');
        Route::post('/', 'VideoController@store');
        Route::get('/{id}', 'VideoController@show');
        Route::patch('/{id}', 'VideoController@update');
        Route::delete('/{id}', 'VideoController@destroy');
    });
    Route::group(['prefix' => '/images'], function(){
        Route::get('/', 'ImageController@index');
        Route::post('/', 'ImageController@store');
        Route::get('/{id}', 'ImageController@show');
        Route::patch('/{id}', 'ImageController@update');
        Route::delete('/{id}', 'ImageController@destroy');
    });
    Route::group(['prefix' => '/social-media'], function(){
        Route::get('/', 'MediaController@index');
        // Route::post('/', 'MediaController@store');
        // Route::get('/{id}', 'MediaController@show');
        // Route::patch('/{id}', 'MediaController@update');
        // Route::delete('/{id}', 'MediaController@destroy');
    });
});


