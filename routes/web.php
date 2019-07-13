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

Route::get('/', 'ThreadController@index')->name('index');
Route::post('thread/create', 'ThreadController@create');
Route::get('chat/{thread_id}', 'ChatController@index');

Route::get('ajax/chat', 'Ajax\ChatController@index'); // メッセージ一覧を取得
Route::post('ajax/chat', 'Ajax\ChatController@create'); // チャット登録
