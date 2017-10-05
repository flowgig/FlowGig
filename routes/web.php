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
})->middleware('guest');

Auth::routes();

Route::post('email-verification/send-token', [
    'as' => 'email-verification.send-token',
    'uses' => 'Auth\VerifyController@sendVerificationToken'
]);

Route::get('email-verification/info', [
    'as' => 'email-verification.info',
    'uses' => 'Auth\VerifyController@getVerificationInfo'
]);

Route::get('email-verification/check/{token}', [
    'as' => 'email-verification.check',
    'uses' => 'Auth\VerifyController@getVerification'
]);

Route::get('email-verification/error', [
    'as' => 'email-verification.error',
    'uses' => 'Auth\VerifyController@getVerificationError'
]);

// Dashboard

Route::get('dashboard', [
    'as' => 'dashboard',
    'uses' => 'DashboardController@index'
]);

// Account

Route::get('account', [
    'as' => 'account.show',
    'uses' => 'AccountController@show'
]);

Route::get('account/edit', [
    'as' => 'account.edit',
    'uses' => 'AccountController@edit'
]);

Route::put('account/update', [
    'as' => 'account.update',
    'uses' => 'AccountController@update'
]);

Route::singularResourceParameters();

// Bands

Route::resource('bands', 'BandController');

// BandMemberships

Route::get('bands/{band}/band-memberships', [
    'as' => 'band-memberships.index',
    'uses' => 'BandMembershipController@index'
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

Route::get('setlists/{setlist}/export', [
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

// Band invitations

Route::get('bands/{band}/invitations/create', [
    'as' => 'band-invitations.create',
    'uses' => 'BandInvitationController@create'
]);

Route::post('bands/{band}/invitations', [
    'as' => 'band-invitations.store',
    'uses' => 'BandInvitationController@store'
]);

Route::put('band-invitations/{band_invitation}/accept', [
    'as' => 'band-invitations.accept',
    'uses' => 'BandInvitationController@accept'
]);

Route::put('band-invitations/{band_invitation}/decline', [
    'as' => 'band-invitations.decline',
    'uses' => 'BandInvitationController@decline'
]);

Route::put('band-invitations/{band_invitation}/set-expired', [
    'as' => 'band-invitations.set-expired',
    'uses' => 'BandInvitationController@setExpired'
]);
