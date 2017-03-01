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

// BandMemberships

Route::get('bands/{band}/band-memberships', [
    'as' => 'band-memberships.index',
    'uses' => 'BandMembershipController@index'
]);

Route::get('bands/{band}/band-memberships/create', [
    'as' => 'band-memberships.create',
    'uses' => 'BandMembershipController@create'
]);

Route::post('bands/{band}/band-memberships', [
    'as' => 'band-memberships.store',
    'uses' => 'BandMembershipController@store'
]);

Route::resource('band-memberships', 'BandMembershipController', ['only' => ['destroy']]);

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

Route::post('gigs/{gig}/setlists', [
    'as' => 'setlists.store',
    'uses' => 'SetlistController@store'
]);

Route::post('setlists/{setlist}/export', [
    'as' => 'setlists.export',
    'uses' => 'SetlistController@export'
]);

Route::resource('setlists', 'SetlistController', ['except' => ['index', 'create', 'store']]);

// SetlistSongs

Route::post('setlists/{setlist}/setlistsongs', [
    'as' => 'setlistsongs.store',
    'uses' => 'SetlistSongController@store'
]);

Route::resource('setlistsongs', 'SetlistSongController', ['only' => ['update', 'destroy']]);
