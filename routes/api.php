<?php

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

// List articles
Route::get('episodes', 'EpisodeController@index');

// List single article
Route::get('episode/{id}', 'EpisodeController@show');

// Create new article
Route::post('episode', 'EpisodeController@store');

// Update article
Route::put('episode', 'EpisodeController@update');

// Delete article
Route::delete('episode/{id}', 'EpisodeController@destroy');
