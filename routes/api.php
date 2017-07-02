<?php

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
				//This URI does not exist in api.themoviedb.org
				//Route::get('','ActorController@index');
				//This route must be first that {id} because we need to avoid
				//that popular is taken like id
				Route::get('popular', 'ActorController@popular');
				Route::get('search','ActorController@search');
				Route::get('{id}/movies','ActorController@movies');
				Route::get('{id}','ActorController@show');
				
			}
		);

	    //Actors route
		Route::prefix('movies')->group(
			function () {
				Route::get('','MovieController@index');
				//This route must be first that {id} because we need to avoid
				//that popular is taken like id
				Route::get('popular', 'MovieController@popular');
				Route::get('search','MovieController@search');
				Route::get('{id}','MovieController@show');
			}
		);

		//Multi-search route
		Route::get('multi', 'MultiController@index');
	}
);