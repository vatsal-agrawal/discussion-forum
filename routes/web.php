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

Route::get('/forum', [
    'uses' =>'ForumController@index',
    'as' => 'forum']);

Route::get('{authorize}/auth',[
'uses' => 'SocialController@auth',
'as' => 'social.auth'
]);

Route::get('{authorize}/redirect',[
'uses' => 'SocialController@redirect',
'as' => 'social.redirect'
]);
Route::get('/channel/{id}',[
    'uses' => 'ForumController@channel',
    'as' => 'channel'
]);

Route::group(['middleware' => 'auth'], function () {
    Route::resource('channels', 'ChannelController');
    
    Route::resource('discussions','DiscussionController',['except' => 'show']);
    Route::post('discussions/reply/{id}',[
       'uses' => 'DiscussionController@reply',
        'as'  =>  'discussions.reply'
    ]);
    Route::get('discussions/reply/like/{id}',[
        'uses' => 'ReplyController@like',
        'as' => 'reply.like'
    ]);
    Route::get('discussions/reply/unlike/{id}',[
        'uses' => 'ReplyController@unlike',
        'as' => 'reply.unlike'
    ]);
    Route::get('discussions/watch/{id}',[
        'uses' => 'WatcherController@watch',
        'as' => 'discussions.watch'
    ]);
    Route::get('discussions/unwatch/{id}',[
        'uses' => 'WatcherController@unwatch',
        'as' => 'discussions.unwatch'
    ]);
    
});

Route::get('discussions/{slug}',[
    'uses' => 'DiscussionController@show',
    'as' => 'discussions.show']);
