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
  'as' => 'marry.',
  'prefix' => 'marry'
], function () {
    Route::get('/', 'MarryController@marry')->name('marry');
});