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

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@tweet');

Route::get('/settings/account', 'SettingsController@account')->name('settings.account');
Route::get('/settings/profile', 'SettingsController@profile')->name('settings.profile');
Route::post('/settings', 'SettingsController@update')->name('settings.update');

Route::get('/{user}', 'ProfileController@index')->name('profile');
Route::get('/{user}/friends', 'ProfileController@friends')->name('profile.friends');
Route::get('/{user}/followers', 'ProfileController@followers')->name('profile.followers');
