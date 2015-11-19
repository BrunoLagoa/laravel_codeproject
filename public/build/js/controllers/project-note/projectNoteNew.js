angular.module('app.controllers')
    .controller('ProjectNoteNewController',
        ['$scope', '$location', '$routeParams', 'ProjectNote',
            function ($scope, $location, $routeParams, ProjectNote) {
                $scope.projectNote = new ProjectNote();
                $scope.projectNote.project_id = $routeParams.id;

                $scope.save = function () {
                    if ($scope.form.$valid) {
                        $scope.projectNote.$save({id: $routeParams.id}).then(function () {
                            $location.path('/project/' + $routeParams.id + '/notes');
                        });
                    }
                }
            }]);