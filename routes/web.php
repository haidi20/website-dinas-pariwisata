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

// Route::group(['namespace' => 'SiteManager', 'prefix' => 'sitemanager'], function(){
//     Route::get('/', 'DashboardController@index');
//     Route::view('/{path?}', 'sitemanager.index');
//     Route::view('/{path?}/{path1?}', 'sitemanager.index');  
//     Route::view('/{path?}/{path1?}/{path2?}', 'sitemanager.index');  
// });

Route::namespace('Website')->group(function(){
    Route::get('/', 'HomeController@index');
    Route::get('/image', 'GalleryController@image');
    Route::get('/video', 'GalleryController@video');
    Route::group(['prefix' => 'post'], function(){
        Route::get('/', 'PostController@index');
        Route::get('/{slug}', 'PostController@detail');
    });
    Route::get('/contact', 'ContactController@index');
});

Route::get('sendmail/{email}', 'SendmailController@sendmail');

Route::group(['prefix' => 'fileman'], function(){
	Route::get('mce-upload', 'FilemanagerController@getMceUpload');
	Route::post('mce-upload', 'FilemanagerController@postMceUpload');
});

Route::group(['prefix' => 'thumbnail'], function(){
	Route::get('fit/{id}/{width}/{height}', 'ThumbnailController@fit')->where('id', '[0-9]+')->where('width', '[0-9]+')->where('height', '[0-9]+');
});

Route::group(['prefix' => 'sitemanager', 'namespace' => 'Sitemanager', 'middleware' => 'auth'], function(){
	Route::get('/', 'DashboardController@index');

	Route::group(['prefix' => 'inbox'], function(){
		Route::get('/', 'InboxController@index');
		Route::get('detail/{id}', 'InboxController@detail')->where('id', '[0-9]+');
		Route::get('delete/{id}', 'InboxController@delete')->where('id', '[0-9]+');
	});

	Route::group(['prefix' => 'menu'], function(){
		Route::get('/', 'MenuController@index');
		Route::get('create', 'MenuController@create');
		Route::get('create/{id}', 'MenuController@create')->where('id', '[0-9]+');
		Route::post('create', 'MenuController@postCreate');
		Route::post('create/{id}', 'MenuController@postCreate')->where('id', '[0-9]+');
		Route::get('edit/{id}', 'MenuController@edit')->where('id', '[0-9]+');
		Route::get('parent/{id}', 'MenuController@getParent')->where('id', '[0-9]+');
		Route::post('edit/{id}', 'MenuController@postEdit')->where('id', '[0-9]+');
		Route::get('delete/{id}', 'MenuController@delete')->where('id', '[0-9]+');
	});

	Route::group(['prefix' => 'gallery'], function(){
		Route::get('/', 'GalleryController@index');
		Route::get('type/{type}', 'GalleryController@type');
		Route::get('create/{type}', 'GalleryController@create');
		Route::post('create/{type}', 'GalleryController@postCreate');
		Route::get('edit/{type}/{id}', 'GalleryController@edit');
		Route::post('edit/{type}/{id}', 'GalleryController@postEdit');
		Route::get('delete/{type}/{id}', 'GalleryController@delete');
	});

	Route::group(['prefix' => 'post', 'namespace' => 'Post'], function(){
		Route::get('/', 'PostController@index');
		Route::get('create', 'PostController@create');
		Route::post('create', 'PostController@postCreate');
		Route::get('edit/{id}', 'PostController@edit')->where('id', '[0-9]+');
		Route::post('edit/{id}', 'PostController@postEdit')->where('id', '[0-9]+');
		Route::get('delete/{id}', 'PostController@delete')->where('id', '[0-9]+');
		Route::get('category', 'CategoryController@index');
		Route::get('category/edit/{id}', 'CategoryController@edit');
		Route::post('category/save', 'CategoryController@save');
		Route::post('category/save/{id}', 'CategoryController@save');
		Route::post('category/delete/{id}', 'CategoryController@delete');

	});

	Route::group(['prefix' => 'breaking-news'], function(){
		Route::get('/', 'BreakingNewsController@index');
	});
	
	Route::group(['prefix' => 'page'], function(){
		Route::get('/', 'PageController@index');
		Route::get('menu', 'PageController@menu');
		Route::get('create', 'PageController@create');
		Route::post('create', 'PageController@postCreate');
		Route::get('edit/{id}', 'PageController@edit')->where('id', '[0-9]+');
		Route::post('edit/{id}', 'PageController@postEdit')->where('id', '[0-9]+');
		Route::get('delete/{id}', 'PageController@delete')->where('id', '[0-9]+');
	});

	Route::group(['prefix' => 'slider'], function(){
		Route::get('/', 'SliderController@index');
		Route::get('create', 'SliderController@create');
		Route::post('create', 'SliderController@postCreate');
		Route::get('edit/{id}', 'SliderController@edit')->where('id', '[0-9]+');
		Route::post('edit/{id}', 'SliderController@postEdit')->where('id', '[0-9]+');
		Route::get('delete/{id}', 'SliderController@delete')->where('id', '[0-9]+');
	});

	Route::group(['prefix' => 'media'], function(){
		Route::get('{type}', 'MediaController@type');
		Route::get('{type}/create', 'MediaController@create');
		Route::post('{type}/create', 'MediaController@postCreate');
		Route::get('{type}/edit/{id}', 'MediaController@edit')->where('id', '[0-9]+');
		Route::post('{type}/edit/{id}', 'MediaController@postEdit')->where('id', '[0-9]+');
		Route::get('delete/{id}', 'MediaController@delete')->where('id', '[0-9]+');
	});

	Route::group(['prefix' => 'user'], function(){
		Route::get('/', 'UserController@index');
		Route::get('create', 'UserController@create');
		Route::post('create', 'UserController@postCreate');
		Route::get('edit/{id}', 'UserController@edit')->where('id', '[0-9]+');
		Route::post('edit/{id}', 'UserController@postEdit')->where('id', '[0-9]+');
		Route::get('delete/{id}', 'UserController@delete')->where('id', '[0-9]+');
	});

	Route::group(['prefix' => 'change-password'], function(){
		Route::get('/', 'UserController@getChangePassword');
		Route::post('/', 'UserController@postChangePassword');
	});

	Route::group(['prefix' => 'setting'], function(){
		Route::get('{page}', 'SettingController@getIndex')->where('page', '[a-z]+');
		Route::post('{page}', 'SettingController@postIndex')->where('page', '[a-z]+');
	});

	Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', function(){
	return redirect('/');
});