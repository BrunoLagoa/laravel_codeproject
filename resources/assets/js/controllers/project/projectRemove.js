angular.module('app.controllers')
    .controller('ProjectRemoveController',
        ['$scope', '$location', '$routeParams', 'Project',
            function ($scope, $location, $routeParams, Project) {

                $scope.project_id = $routeParams.id;
                $scope.project = Project.get({id: $routeParams.id});

                //console.log($scope.client);

                $scope.remove = function () {
                    $scope.project.$delete({id: $scope.project.id}).then(function () {
                        $location.path('/projects/');
                    });

                }
            }]);