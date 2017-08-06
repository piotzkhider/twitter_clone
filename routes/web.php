<?php

/*
|--------------------------------------------------------------------------
| Webルート
|--------------------------------------------------------------------------
|
| ここでアプリケーションのWebルートを登録できます。"web"ルートは
| ミドルウェアのグループの中へ、RouteServiceProviderによりロード
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('home', 'HomeController@index')->name('home');
    Route::post('home', 'HomeController@post');

    Route::group(['namespace' => 'Settings', 'prefix' => 'settings'], function () {
        Route::get('account', 'AccountController@edit')->name('settings.account');
        Route::put('account', 'AccountController@update');
        Route::get('profile', 'ProfileController@edit')->name('settings.profile');
        Route::put('profile', 'ProfileController@update');
    });

    Route::get('/{user}', 'UserController@index')->name('user');
    Route::get('/{user}/followees', 'UserController@followees')->name('user.followees');
    Route::get('/{user}/followers', 'UserController@followers')->name('user.followers');
});
