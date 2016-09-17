<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
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

    // Gigs

    Route::get('bands/{band}/gigs', [
        'as' => 'gigs.index',
        'uses' => 'GigController@index'
    ]);

    Route::get('bands/{band}/gigs/create', [
        'as' => 'gigs.create',
        'uses' => 'GigController@create'
    ]);

    Route::post('bands/{band}/gigs', [
        'as' => 'gigs.store',
        'uses' => 'GigController@store'
    ]);

    Route::resource('gigs', 'GigController', ['except' => ['index', 'create', 'store']]);

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

    Route::get('setlists/{setlist}/make', [
        'as' => 'setlists.make',
        'uses' => 'SetlistController@make'
    ]);

    Route::post('setlists/{setlist}/export', [
        'as' => 'setlists.export',
        'uses' => 'SetlistController@export'
    ]);

    Route::resource('setlists', 'SetlistController', ['except' => ['index', 'create', 'store']]);

    // SetlistSongs

    Route::post('bands/{band}/setlistsongs', [
        'as' => 'setlistsongs.store',
        'uses' => 'SetlistSongController@store'
    ]);

    Route::resource('setlistsongs', 'SetlistSongController', ['only' => ['update', 'destroy']]);

});