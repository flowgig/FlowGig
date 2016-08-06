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

Route::group(['middleware' => 'auth.basic'], function () {

    Route::get('/dashboard', function () {
        return view('dashboard', ['bands' => \App\Band::get()]);
    });

    Route::singularResourceParameters();

    // Bands

    Route::resource('bands', 'BandController');

    // Songs

    Route::resource('songs', 'SongController');

    // Setlists

    Route::get('setlists/{setlist}/export-preview', [
        'as' => 'setlists.export-preview',
        'uses' => 'SetlistController@exportPreview'
    ]);

    Route::get('setlists/{setlist}/export', [
        'as' => 'setlists.export',
        'uses' => 'SetlistController@export'
    ]);

    Route::resource('setlists', 'SetlistController');

    // SetlistSongs

    Route::resource('setlistsongs', 'SetlistSongController', ['only' => ['store', 'update', 'destroy']]);

});