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
});

Route::namespace('Website')->group(function(){
    Route::get('/', 'HomeController@index');
    Route::get('/image', 'ImageController@index');
});

Route::get('test', function(){
    $limit = 1;

    for($i = 1; $i <= 5; $i++){
        if($limit <= 3){
            $value[] = 1;

            $limit++;
        }else{
            $value[] = 0;
        }
    }
    return $value;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
