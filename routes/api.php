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

// 会員登録
Route::post('/register', 'Auth\RegisterController@register')->name('register');

// ログイン
Route::post('/login', 'Auth\LoginController@login')->name('login');

// ログアウト
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

// ルート登録
Route::post('/route', 'RouteController@create')->name('route.create');
// ルート一覧
Route::post('/route/example', 'RouteController@example')->name('route.example');
// ルート一覧
Route::get('/route', 'RouteController@index')->name('route.index');

// ストア登録
Route::post('/store', 'StoreController@create')->name('store.create');
// ストア一覧
Route::post('/store/list', 'StoreController@list')->name('store.list');

// ログインユーザー
Route::get('/user', function () {
	return Auth::user();
})->name('user');
