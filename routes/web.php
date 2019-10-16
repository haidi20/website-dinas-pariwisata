<?php

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

// Route::get('/sitemanager', function () {
//     return view('sitemanager.index');
// });

Route::get('/', function() {
    return view('website.home.index');
});

Route::group(['prefix' => 'post'], function() {
    Route::get('/', function() {
        return view('website.post.index');
    });
    Route::get('/detail', function() {
        return view('website.post.detail');
    });
});

Route::get('/image', function(){
    return view('website.galery.index');
});

Route::get('/site-manager', function(){
    return view('sitemanager.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
