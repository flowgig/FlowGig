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

    Route::get('bands/{band}/songs', [
        'as' => 'songs.index',
        'uses' => 'SongController@index'
    ]);

    Route::get('bands/{band}/songs/create', [
        'as' => 'songs.create',
        'uses' => 'SongController@create'
    ]);

    Route::post('bands/{band}/songs', [
        'as' => 'songs.store',
        'uses' => 'SongController@store'
    ]);

    Route::resource('songs', 'SongController', ['except' => ['index', 'create', 'store']]);

    // Setlists

    Route::get('bands/{band}/setlists', [
        'as' => 'setlists.index',
        'uses' => 'SetlistController@index'
    ]);

    Route::get('bands/{band}/setlists/create', [
        'as' => 'setlists.create',
        'uses' => 'SetlistController@create'
    ]);

    Route::post('bands/{band}/setlists', [
        'as' => 'setlists.store',
        'uses' => 'SetlistController@store'
    ]);

    Route::get('setlists/{setlist}/export', [
        'as' => 'setlists.export',
        'uses' => 'SetlistController@export'
    ]);

    Route::resource('setlists', 'SetlistController', ['except' => ['index', 'create', 'store']]);

    // SetlistSongs

    Route::resource('setlistsongs', 'SetlistSongController', ['only' => ['store', 'update', 'destroy']]);

});