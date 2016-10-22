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

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

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

Route::post('gigs/{gig}/setlist', [
    'as' => 'setlist.store',
    'uses' => 'SetlistController@store'
]);

Route::post('setlists/{setlist}/export', [
    'as' => 'setlist.export',
    'uses' => 'SetlistController@export'
]);

Route::resource('setlist', 'SetlistController', ['except' => ['index', 'create', 'store']]);

// SetlistSongs

Route::resource('setlistsongs', 'SetlistSongController', ['only' => ['store', 'update', 'destroy']]);
