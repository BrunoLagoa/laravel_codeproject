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
    return view('app');
});

Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});

Route::group(['middleware'=>'oauth'], function () {
    Route::resource('client','ClientController', ['except' => ['create','edit']]);
    Route::resource('project', 'ProjectController', ['except' => ['create', 'edit']]);

    Route::group(['prefix' => 'project'], function() {

        Route::get('{id}/note', 'ProjectNoteController@index');
        Route::get('{id}/note/{noteId}', 'ProjectNoteController@show');
        Route::post('{id}/note', 'ProjectNoteController@store');
        Route::put('{id}/note/{noteId}', 'ProjectNoteController@update');
        Route::delete('{id}/note/{noteId}', 'ProjectNoteController@destroy');

        Route::get('/{id}/task', 'ProjectTaskController@index');
        Route::post('/{id}/task', 'ProjectTaskController@store');
        Route::get('/{id}/task/{taskId}', 'ProjectTaskController@show');
        Route::put('/{id}/task/{taskId}', 'ProjectTaskController@update');
        Route::delete('/{id}/task/{taskId}', 'ProjectTaskController@destroy');

        Route::get('/{id}/members', 'ProjectController@showMembers');
        Route::delete('/{id}/member/{memberId}', ['uses' => 'ProjectController@removeMember']);

        Route::get('/{id}/file', 'ProjectFileController@index');
        Route::get('/{id}/{fileId}', 'ProjectFileController@show');
        Route::get('/{id}/{fileId}/download', 'ProjectFileController@showFile');
        Route::post('/{id}/file', 'ProjectFileController@store');
        Route::put('/{id}/file', 'ProjectFileController@update');
        Route::delete('/{id}/file}', 'ProjectFileController@destroy');
    });

    Route::get('user/authenticated', 'UserController@authenticated');

});