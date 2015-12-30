angular.module('app.controllers')
    .controller('ProjectFileRemoveController',
        ['$scope', '$location', '$routeParams', 'ProjectFile',
            function ($scope, $location, $routeParams, ProjectFile) {
                $scope.project_id = $routeParams.id;
                $scope.projectFile = ProjectFile.get({
                    id: null,
                    idFile: $routeParams.idFile
                });

                $scope.remove = function () {
                    $scope.projectFile.$delete({
                        id: null,
                        idFile: $scope.projectFile.id
                    }).then(function () {
                        $location.path('/project/' + $routeParams.id + '/files')
                    });
                }
            }]);