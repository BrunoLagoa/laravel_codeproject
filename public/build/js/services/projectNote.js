angular.module('app.services')
    .service('ProjectNote',['$resource','appConfig',function($resource,appConfig){
        return $resource(appConfig.baseUrl + '/project/:id/note/:idNote',{
            id: '@id',
            idNote: '@idNote'
        },{
            update: {
                method: 'PUT'
            }
        });
    }]);


/*
Route::get('/{id}/note', 'ProjectNoteController@index');
Route::post('/{id}/note', 'ProjectNoteController@store');
Route::get('/{id}/note/{nodeId}', 'ProjectNoteController@show');
Route::put('/{id}/note/{nodeId}', 'ProjectNoteController@update');
Route::delete('/{id}/note/{nodeId}', 'ProjectNoteController@destroy');
    */