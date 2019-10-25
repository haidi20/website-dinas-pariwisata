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
    Route::group(['prefix' => '/pages'], function(){
        Route::get('/', 'PageController@index');
        // Route::post('/', 'PageController@store');
        // Route::get('/{id}', 'PageController@show');
        // Route::patch('/{id}', 'PageController@update');
        // Route::delete('/{id}', 'PageController@destroy');
    });
    Route::group(['prefix' => '/social-media'], function(){
        Route::get('/', 'MediaController@index');
        // Route::post('/', 'MediaController@store');
        // Route::get('/{id}', 'MediaController@show');
        // Route::patch('/{id}', 'MediaController@update');
        // Route::delete('/{id}', 'MediaController@destroy');
    });
    Route::group(['prefix' => '/posts'], function(){
        Route::get('/', 'PostController@index');
        // Route::post('/', 'PostController@store');
        // Route::get('/{id}', 'PostController@show');
        Route::patch('/{id}', 'PostController@update');
        // Route::delete('/{id}', 'PostController@destroy');
    });
    Route::group(['prefix' => '/breaking-news'], function(){
        Route::get('/unselected', 'PostController@unSelected');
        Route::get('/selected', 'PostController@selected');
        Route::patch('/update/{id}', 'PostController@changeStatus');
    });
    Route::group(['prefix' => '/categories'], function(){
        Route::get('/', 'CotegoryController@index');
        // Route::post('/', 'CotegoryController@store');
        // Route::get('/{id}', 'CotegoryController@show');
        // Route::patch('/{id}', 'CotegoryController@update');
        // Route::delete('/{id}', 'CotegoryController@destroy');
    });
    Route::group(['prefix' => '/menus'], function(){
        Route::get('/', 'MenuController@index');
        // Route::post('/', 'MenuController@store');
        // Route::get('/{id}', 'MenuController@show');
        // Route::patch('/{id}', 'MenuController@update');
        // Route::delete('/{id}', 'MenuController@destroy');
    });
});


