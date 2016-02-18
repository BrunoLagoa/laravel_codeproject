angular.module('app.controllers')
    .controller('ProjectDashboardController',
        ['$scope', '$routeParams', '$location', 'Project',
            function ($scope, $routeParams, $location, Project) {

                $scope.project = {

                };

                Project.query({
                    orderBy: 'created_at',
                    sortedBy: 'desc',
                    limit: 5
                }, function (response) {
                    $scope.projects = response.data;
                });

                $scope.showProject = function (client) {
                    $scope.project = client;
                };
            }]);