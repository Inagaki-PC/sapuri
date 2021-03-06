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

//PHP/Laravel 09 Routingについて理解する
//【応用】 前章でAdmin/ProfileControllerを作成し、add Action, edit Actionを追加しました。
//web.phpを編集して、admin/profile/create にアクセスしたら ProfileController の
//add Action に、admin/profile/edit にアクセスしたら ProfileController の 
//edit Action に割り当てるように設定してください。

//ログインしていない場合のリダイレクトの処理:Routingの設定の最後に「->middleware(‘auth’)」と入れることで、リダイレクトされるようになる。
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('sapuri/create', 'Admin\SapuriController@add');
    Route::post('sapuri/create', 'Admin\SapuriController@create');
    Route::get('sapuri', 'Admin\SapuriController@index');
    Route::get('sapuri/edit', 'Admin\SapuriController@edit');
    Route::post('sapuri/edit', 'Admin\SapuriController@update');
    Route::get('sapuri/delete', 'Admin\SapuriController@delete');
    Route::get('sapuri/calendar1', 'Admin\SapuriController@calendar1');
    Route::get('sapuri/calendar2', 'Admin\SapuriController@calendar2');
});
//ゲストログイン機能実装
Route::get('guestlogin', 'Auth\LoginController@guestLogin');

//カレンダー機能実装
Route::group(['middleware' => 'auth'], function() {
    Route::get('/holiday','CalendarController@getHoliday');
    Route::post('/holiday','CalendarController@postHoliday');
    Route::get('/holiday/{id}','CalendarController@getHolidayId');
    Route::delete('/holiday','CalendarController@deleteHoliday');
});

Route::get('/calendar','CalendarController@index');

Auth::routes();

Route::get('/select', 'SelectController@index')->name('select');

Route::get('/', 'SapuriController@index');

?>