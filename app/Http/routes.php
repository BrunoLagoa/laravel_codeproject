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

Route::get('/', function () {
    return view('welcome');
});

Route::get('client', 'ClientController@index');
Route::post('client', 'ClientController@store');
Route::get('client/{id}', 'ClientController@show');
Route::put('client/{id}', 'ClientController@update');
Route::delete('client/{id}', 'ClientController@destroy');

Route::get('project/{id}/note', 'ProjectNoteController@index');
Route::post('project/{id}/note', 'ProjectNoteController@store');
Route::get('project/{id}/note/{nodeId}', 'ProjectNoteController@show');
Route::put('project/{id}/note/{nodeId}', 'ProjectNoteController@update');
Route::delete('project/{id}/note/{nodeId}', 'ProjectNoteController@destroy');

Route::get('project/{id}/task', 'ProjectTaskController@index');
Route::post('project/{id}/task', 'ProjectTaskController@store');
Route::get('project/{id}/task/{taskId}', 'ProjectTaskController@show');
Route::put('project/{id}/task/{taskId}', 'ProjectTaskController@update');
Route::delete('project/{id}/task/{taskId}', 'ProjectTaskController@destroy');

Route::get('project/{id}/members', 'ProjectController@showMembers');

Route::get('project', 'ProjectController@index');
Route::post('project', 'ProjectController@store');
Route::get('project/{id}', 'ProjectController@show');
Route::put('project/{id}', 'ProjectController@update');
Route::delete('project/{id}', 'ProjectController@destroy');