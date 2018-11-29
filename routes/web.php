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

// tracker routes to the track view
Route::get('/tracker','TrainingController@tracker');

//trackrun adds the run to the database
Route::get('/trackrun','TrainingController@trackrun');

//viewruns routes to viewruns view
Route::get('/viewruns','TrainingController@viewruns');

//searchusers finds users to view run history
Route::get('/searchusers','TrainingController@searchusers');

Route::fallback(function () {
    return view('welcome');
});