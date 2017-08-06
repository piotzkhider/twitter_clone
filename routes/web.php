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
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/home', 'HomeController@tweet');

    Route::group(['namespace' => 'Settings', 'prefix' => 'settings'], function () {
        Route::get('account', 'AccountController@edit')->name('settings.account');
        Route::put('account', 'AccountController@update');
        Route::get('profile', 'ProfileController@edit')->name('settings.profile');
        Route::put('profile', 'ProfileController@update');
    });

    Route::get('/{account}', 'ProfileController@index')->name('profile');
    Route::get('/{account}/friends', 'ProfileController@friends')->name('profile.friends');
    Route::get('/{account}/followers', 'ProfileController@followers')->name('profile.followers');
});
