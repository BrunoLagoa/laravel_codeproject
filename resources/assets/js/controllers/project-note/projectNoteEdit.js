angular.module('app.controllers')
    .controller('ProjectNoteEditController',
        ['$scope','$location','$routeParams','ProjectNote',
            function($scope,$location,$routeParams,ProjectNote) {
        $scope.ProjectNote = ProjectNote.get({
            id: $routeParams.id,
            idNode: $routeParams.idNode
        });

        $scope.save = function() {
            if($scope.form.$valid){
                ProjectNote.update({
                    idNode: $scope.projectNote.id
                },$scope.projectNote,function(){
                    $location.path('/project/' + $routeParams.id + '/notes');
                });
            }
        }
    }]);