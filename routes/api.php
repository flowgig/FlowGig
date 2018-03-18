<?php

use App\Band;
use App\Http\Resources\Gig as GigResource;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Public gigs for a given band

Route::middleware('cors')->get('bands/{band}/gigs', function (Band $band) {
    return GigResource::collection($band->publicGigs()->orderBy('date')->get());
});
