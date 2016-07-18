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

// PopulationPyramid
Route::get('/populationpyramid', ['as' => 'populationpyramid', 'uses' => 'PopulationPyramidController@index']);
Route::post('/populationpyramid', ['as' => 'populationpyramid', 'uses' => 'PopulationPyramidController@clubMembers']);

// heatmap
Route::get('/heatmap',           ['as' => 'heatmap',           'uses' => 'HeatMapController@index']);
Route::post('/heatmap',          ['as' => 'heatmap',           'uses' => 'HeatMapController@index']);

//inputclubdata
Route::get('/inputclubdata',     ['as' => 'inputclubdata',     'uses' => 'InputClubDataController@index']);
Route::get('/inputclubdata/clubList',  ['as' => 'clubList',    'uses' => 'InputClubDataController@clubList']);
Route::get('/inputclubdata/edit', ['as' => 'updateClubData',  'uses' => 'InputClubDataController@edit']);
Route::post('/inputclubdata/update', ['as' => 'update',  'uses' => 'InputClubDataController@update']);
Route::post('/inputclubdata/delete', ['as' => 'update',  'uses' => 'InputClubDataController@delete']);
Route::post('/inputclubdata/create',     ['as' => 'inputclubdata',     'uses' => 'InputClubDataController@create']);

//clubmembership
Route::post('/clubmembership/create',     ['as' => 'createMemberShip',     'uses' => 'ClubMemberShipController@create']);
Route::post('/clubmembership/update',     ['as' => 'updateMemberShip',     'uses' => 'ClubMemberShipController@update']);
Route::post('/clubmembership/delete',     ['as' => 'deleteMemberShip',     'uses' => 'ClubMemberShipController@delete']);

// importcsv
Route::get('/importcsv',         ['as' => 'importcsvIndex',         'uses' => 'ImportCsvController@index']);
Route::post('/importcsv/create',         ['as' => 'importcsvCreate',         'uses' => 'ImportCsvController@create']);


// call Admin_template
Route::get('admin', function() {
    return view('admin_template');
});

// call Admin_template
Route::get('test', function() {
    return view('test');
});
