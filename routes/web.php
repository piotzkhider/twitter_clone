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

    Route::get('search', 'Search')->name('search');

    Route::prefix('settings')->namespace('Settings')->group(function () {
        Route::get('account', 'AccountController@edit')->name('settings.account');
        Route::put('account', 'AccountController@update');
        Route::get('profile', 'ProfileController@edit')->name('settings.profile');
        Route::put('profile', 'ProfileController@update');
    });

    Route::get('{user}', 'UserController@index')->name('user');
    Route::get('{user}/following', 'UserController@following')->name('user.following');
    Route::get('{user}/followers', 'UserController@followers')->name('user.followers');

    Route::namespace('Friendship')->group(function () {
        Route::post('{user}/follow', 'Follow')->name('follow');
        Route::post('{user}/unfollow', 'Unfollow')->name('unfollow');
    });
});
