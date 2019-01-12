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
    Route::get('/tracker', 'TrackerController@tracker');
//Route::get('/tracker', [
//    'middleware' => 'auth',
//    'uses' => 'TrainingController@tracker'
//]);

//trackrun adds the run to the database from form input
    Route::get('/trackrun', 'TrackerController@trackrun');

//searchruns routes to viewruns view with search page
    Route::get('/viewruns', 'TrackerController@viewruns');

//edit routes to edit view with the current Run to edit
    Route::get('{id}/editrun', 'TrackerController@editrun');

//edit routes to edit view with the current Run to edit
    Route::put('{id}/updaterun/', 'TrackerController@updaterun');

//delete routes to delete view with the current Run
    Route::get('{id}/deleterun', 'TrackerController@deleterun');

//destroy routes delete the current Run
    Route::delete('{id}/destroyrun/', 'TrackerController@destroyrun');


//View Challenges displays all challenges
    Route::get('/challenge', 'ChallengesController@viewchallenge');

//View users challenges
    Route::get('/mychallenge', 'ChallengesController@mychallenge');

//Allow user to join challenges
    Route::put('/joinchallenge', 'ChallengesController@joinchallenge');

//View user profile - access from view profile and submitting updates
    Route::get('/profile', 'TrackerController@showprofile');

//Edit user profile - access from view profile and submitting updates
    Route::put('/editprofile', 'TrackerController@editprofile');


});

Route::fallback(function () {
    return view('welcome');
});
Auth::routes();

