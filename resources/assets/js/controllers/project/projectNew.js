angular.module('app.controllers')
    .controller('ProjectNewController',
        ['$scope', '$location', 'Project', 'Client', function ($scope, $location, Project, Client) {
            $scope.project = new Project();
            $scope.clients = Client.query();

            $scope.save = function () {
                if ($scope.form.$valid) {
                    $scope.projectNote.$save().then(function () {
                        $location.path('/projects');
                    });
                }
            }
        }]);