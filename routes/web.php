<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//welcome is the home or default page
Route::get('/', 'TrainingController@welcome');

//estimate routes to the estimate view
Route::get('/estimate', 'TrainingController@estimate');

//calculate performs the pace estimate calculation
Route::get('/calc','TrainingController@calculate');

//planner routes to the plan view
Route::get('/planner', 'TrainingController@planner');

// plan calculates the goal pace for planned race time
Route::get('/plan','TrainingController@plan');

// tracker routes to the track view to add a run

Route::group(['middleware' => 'auth'], function () {
    Route::get('/tracker', 'TrainingController@tracker');
//Route::get('/tracker', [
//    'middleware' => 'auth',
//    'uses' => 'TrainingController@tracker'
//]);

//trackrun adds the run to the database from form input
    Route::get('/trackrun', 'TrainingController@trackrun');

//searchruns routes to viewruns view with search page
    Route::get('/viewruns', 'TrainingController@viewruns');

//edit routes to edit view with the current Run to edit
    Route::get('{id}/editrun', 'TrainingController@editrun');

//edit routes to edit view with the current Run to edit
    Route::put('{id}/updaterun/', 'TrainingController@updaterun');

//delete routes to delete view with the current Run
    Route::get('{id}/deleterun', 'TrainingController@deleterun');

//destroy routes delete the current Run
    Route::delete('{id}/destroyrun/', 'TrainingController@destroyrun');


//View Challenges displays all challenges
    Route::get('/challenge', 'TrainingController@viewchallenge');

//View users challenges
    Route::get('/mychallenge', 'TrainingController@mychallenge');

//Allow user to join challenges
    Route::put('/joinchallenge', 'TrainingController@joinchallenge');


});

//Route::fallback(function () {
//    return view('welcome');
//});
Auth::routes();

