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

// Home and general
Route::get('/', 'HomeController@getIndex');

// Player search
Route::controller('players', 'PlayerController');
Route::get('player/{player}', 'PlayerController@getShow');

// Ally search
Route::controller('allies', 'AllyController');
Route::get('ally/{ally}', 'AllyController@getShow');

