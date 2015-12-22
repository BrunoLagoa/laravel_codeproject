angular.module('app.controllers')
    .controller('ProjectNewController',
        ['$scope', '$location', 'Project', function ($scope, $location, Project) {
            $scope.project = new Project();

            $scope.save = function () {
                if ($scope.form.$valid) {
                    $scope.projectNote.$save().then(function () {
                        $location.path('/projects');
                    });
                }
            }
        }]);