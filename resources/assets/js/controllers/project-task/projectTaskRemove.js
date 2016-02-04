angular.module('app.controllers')
    .controller('ProjectTaskRemoveController',
        ['$scope', '$location', '$routeParams', 'ProjectTask',
            function($scope, $location, $routeParams, ProjectTask){
                //$scope.projectTask = ProjectTask.get({id: $routeParams.id});

                $scope.projectTask = ProjectTask.get({
                    id: $routeParams.id,
                    idTask: $routeParams.idTask
                });

                //console.log($scope.client);

                $scope.remove = function(){
                    $scope.projectTask.$delete({
                        //id: null,
                        id: $routeParams.id,
                        idTask: $scope.projectTask.id
                    }).then(function(){
                        $location.path('/project/' + $routeParams.id + '/tasks');
                    });

                }
            }]);