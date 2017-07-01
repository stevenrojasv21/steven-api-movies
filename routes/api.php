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

Route::prefix('v1')->group(
	function () {
		//Actors route
		Route::prefix('actors')->group(
			function () {
				Route::get('','ActorController@index');
				Route::get('{id}','ActorController@show');
				Route::get('popular', 'ActorController@popular');
			}
		);

	    //Actors route
		Route::prefix('movies')->group(
			function () {
				Route::get('','MovieController@index');
				Route::get('{id}','MovieController@show');
				Route::get('popular', 'MovieController@popular');	
			}
		);

		//Multi-search route
		Route::get('multi', 'MultiController@index');
	}
);