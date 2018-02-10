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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/forum', 'ForumController@index');

Route::get('{authorize}/auth',[
'uses' => 'SocialController@auth',
'as' => 'social.auth'
]);

Route::get('{authorize}/redirect',[
'uses' => 'SocialController@redirect',
'as' => 'social.redirect'
]);

Route::group(['middleware' => 'auth'], function () {
    Route::resource('channels', 'ChannelController');
    
    Route::resource('discussions','DiscussionController');
    Route::post('discussions/reply/{id}',[
       'uses' => 'DiscussionController@reply',
        'as'  =>  'discussions.reply'
    ]);
});
