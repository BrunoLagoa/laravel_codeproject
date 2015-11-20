angular.module('app.controllers')
    .controller('ProjectNoteEditController',
        ['$scope','$location','$routeParams','ProjectNote',
            function($scope,$location,$routeParams,ProjectNote) {
        $scope.ProjectNote = ProjectNote.get({
            id: $routeParams.id,
            nodeId: $routeParams.nodeId
        });

        $scope.save = function() {
            if($scope.form.$valid){
                ProjectNote.update({id: null,nodeId: $scope.projectNote.id},$scope.projectNote,function(){
                    $location.path('/project/' + $routeParams.id + '/notes');
                });
            }
        }
    }]);