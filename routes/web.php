<?php
use Carbon\Carbon;

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

Route::group(['namespace' => 'SiteManager', 'prefix' => 'sitemanager'], function(){
    Route::get('/', 'DashboardController@index');
    Route::view('/{path?}', 'sitemanager.index');
    Route::view('/{path?}/{path1?}', 'sitemanager.index');  
    Route::view('/{path?}/{path1?}/{path2?}', 'sitemanager.index');  
});

Route::namespace('Website')->group(function(){
    Route::get('/', 'HomeController@index');
    Route::get('/image', 'GalleryController@image');
    Route::get('/video', 'GalleryController@video');
    Route::group(['prefix' => 'post'], function(){
        Route::get('/', 'PostController@index');
        Route::get('/detail', 'PostController@detail');
    });
    Route::get('/contact', 'ContactController@index');
});

Route::get('time', function(){
    return Carbon::now()->format('H:i:s');
});

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
