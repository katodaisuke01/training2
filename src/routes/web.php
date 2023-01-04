<?php

use Illuminate\Support\Facades\Route;

if (config('app.env') == 'production') {
    URL::forceScheme('https');
}
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
Route::group([
  'as' => '.',
  'prefix' => ''
], function () {
    Route::get('/', 'PageController@index')->name('index');
});
Route::group([
  'as' => 'oas.',
  'prefix' => 'oas'
], function () {
    Route::get('/', 'PageController@oas')->name('oas');
});
Route::group([
  'as' => 'admin.',
  'prefix' => 'admin'
], function () {
  Route::get('/', 'PageController@dashboard')->name('dashboard');
  Route::get('/user', 'PageController@user')->name('user');
  Route::get('/user/detail', 'PageController@user.detail')->name('userDetail');
  Route::get('/company', 'PageController@company')->name('company');
  Route::get('/message', 'PageController@message')->name('message');
  Route::get('/contact', 'PageController@contact')->name('contact');
  Route::get('/post', 'PageController@post')->name('post');
  Route::get('/master', 'PageController@master')->name('master');
  Route::get('/setting', 'PageController@setting')->name('setting');
});
Route::group([
  'as' => 'marry.',
  'prefix' => 'marry'
], function () {
    Route::get('/', 'MarryController@marry')->name('marry');
});




Route::group([
  'as' => 'cms.',
  'prefix' => 'cms'
], function () {
    // ログイン
    Route::view('/auth/login', 'cms.auth.login')->name('auth.login');

    // ダッシュボード
    Route::view('/', 'cms.dashboard.index')->name('dashboard');

    // 商品管理
    Route::view('/item', 'cms.item.index')->name('item');
    Route::view('/item/detail', 'cms.item.detail')->name('item.detail');

    Route::view('/sales', 'cms.sales.index')->name('sales');

    // ユーザー
    Route::view('/user', 'cms.user.index')->name('user');
    Route::view('/user/detail', 'cms.user.detail')->name('user.detail');

    // お知らせ
    Route::view('/news', 'cms.news.index')->name('news');
    Route::view('/news/edit', 'cms.news.edit')->name('news.edit');

    Route::view('/contact', 'cms.contact.index')->name('contact');
    Route::view('/master', 'cms.master.index')->name('master');

    // アカウント
    Route::view('/account', 'cms.account.profile')->name('account.profile');
    Route::view('/account/edit', 'cms.account.edit')->name('account.edit');
    Route::view('/account/mail', 'cms.account.mail')->name('account.mail');
    Route::view('/account/password', 'cms.account.password')->name('account.password');
    
    Route::view('/account/admin', 'cms.account.admin.index')->name('account.admin.index');
    Route::view('/account/admin/edit', 'cms.account.admin.edit')->name('account.admin.edit');
    Route::view('/account/admin/add', 'cms.account.admin.add')->name('account.admin.add');

    // スタイルガイド
    Route::view('/styleguide', 'cms.styleguide')->name('styleguide');
});

// リダイレクト
Route::get('/', function () { return redirect('/cms'); });

