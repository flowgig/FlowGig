<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Songs

Route::resource('song', 'SongController');

// Setlists

Route::get('setlist/{setlist}/export-preview', [
        'as' => 'setlist.export-preview',
        'uses' => 'SetlistController@exportPreview'
    ]);

Route::get('setlist/{setlist}/export', [
        'as' => 'setlist.export',
        'uses' => 'SetlistController@export'
    ]);

Route::resource('setlist', 'SetlistController');

// SetlistSongs

Route::post('setlistsong/{setlist}/{song}', [
    'as' => 'setlistsong.store',
    'uses' => 'SetlistSongController@store'
]);

Route::resource('setlistsong', 'SetlistSongController', ['only' => ['update', 'destroy']]);