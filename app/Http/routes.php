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
Route::get('/',                  ['as' => 'dashboard',         'uses' => 'MainController@index']);

Route::get('/populationpyramid', ['as' => 'populationpyramid', 'uses' => 'MainController@populationPyramid']);

Route::get('/heatmap',           ['as' => 'heatmap',           'uses' => 'MainController@heatMap']);

Route::get('/inputclubdata',     ['as' => 'inputclubdata',     'uses' => 'MainController@inputClubData']);

Route::get('/importcsv',         ['as' => 'importcsv',         'uses' => 'MainController@importCsv']);


// call Admin_template
Route::get('admin', function() {
    return view('admin_template');
});

// call Admin_template
Route::get('test', function() {
    return view('test');
});
