angular.module('app.controllers')
    .controller('ProjectNewController',
        ['$scope', '$location', 'Project', 'Client', 'appConfig',
            function ($scope, $location, Project, Client, appConfig) {
            $scope.project = new Project();
            $scope.clients = Client.query();
            $scope.status = appConfig.project.status;

            $scope.save = function () {
                if ($scope.form.$valid) {
                    $scope.projectNote.$save().then(function () {
                        $location.path('/projects');
                    });
                }
            }
        }]);