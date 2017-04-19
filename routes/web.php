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

Route::get('/', function () {
    return view('layouts.base');
});

Route::get('/coaches', 'CoachesController@index');
Route::get('/coaches/new', 'CoachesController@create');
Route::post('/coaches/add', 'CoachesController@store');
Route::get('/coaches/edit/{id}', 'CoachesController@edit');
Route::post('/coaches/update/{id}', 'CoachesController@update');
Route::get('/coaches/delete/{id}', 'CoachesController@destroy');

Route::get('/players', 'PlayersController@index');
Route::get('/players/new', 'PlayersController@create');
Route::post('/players/add', 'PlayersController@store');
Route::get('/players/edit/{id}', 'PlayersController@edit');
Route::post('/players/update/{id}', 'PlayersController@update');
Route::get('/players/delete/{id}', 'PlayersController@destroy');

Route::get('/teams', 'TeamsController@index');
Route::get('/teams/new', 'TeamsController@create');
Route::post('/teams/add', 'TeamsController@store');
Route::get('/teams/edit/{id}', 'TeamsController@edit');
Route::post('/teams/update/{id}', 'TeamsController@update');
Route::get('/teams/delete/{id}', 'TeamsController@destroy');

Route::get('/positions', 'PositionsController@index');
Route::get('/positions/new', 'PositionsController@create');
Route::post('/positions/add', 'PositionsController@store');
Route::get('/positions/edit/{id}', 'PositionsController@edit');
Route::post('/positions/update/{id}', 'PositionsController@update');
Route::get('/positions/delete/{id}', 'PositionsController@destroy');

Route::get('/types', 'TypesController@index');
Route::get('/types/new', 'TypesController@create');
Route::post('/types/add', 'TypesController@store');
Route::get('/types/edit/{id}', 'TypesController@edit');
Route::post('/types/update/{id}', 'TypesController@update');
Route::get('/types/delete/{id}', 'TypesController@destroy');

Route::get('/about', 'AboutController@index');


