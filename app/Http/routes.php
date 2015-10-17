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

Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});

Route::group(['middleware'=>'oauth'], function() {

    Route::resource('client', 'ClientController', ['except' => ['create', 'edit']]);

    Route::group(['prefix' => 'project'], function() {
        Route::resource('', 'ProjectController', ['except' => ['create', 'edit']]);

        Route::get('/{id}/note', 'ProjectNoteController@index');
        Route::post('/{id}/note', 'ProjectNoteController@store');
        Route::get('/{id}/note/{nodeId}', 'ProjectNoteController@show');
        Route::put('/{id}/note/{nodeId}', 'ProjectNoteController@update');
        Route::delete('/{id}/note/{nodeId}', 'ProjectNoteController@destroy');

        Route::get('/{id}/task', 'ProjectTaskController@index');
        Route::post('/{id}/task', 'ProjectTaskController@store');
        Route::get('/{id}/task/{taskId}', 'ProjectTaskController@show');
        Route::put('/{id}/task/{taskId}', 'ProjectTaskController@update');
        Route::delete('/{id}/task/{taskId}', 'ProjectTaskController@destroy');

        Route::get('/{id}/members', 'ProjectController@showMembers');
        Route::delete('/{id}/member/{memberId}', ['uses' => 'ProjectController@removeMember']);
    });

});