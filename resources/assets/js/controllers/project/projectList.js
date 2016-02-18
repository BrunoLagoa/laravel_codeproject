angular.module('app.controllers')
    .controller('ProjectListController', [
        '$scope', '$routeParams', 'Project', function ($scope, $routeParams, Project) {

            $scope.projects = [];
            $scope.totalProjects = 0;
            $scope.projecstPerPage = 15;

            $scope.pagination = {
                current: 1
            };

            $scope.pageChanged = function (newPage) {
                getResultsPage(newPage);
            };

            function getResultsPage(pageNumber) {
                Project.query({}, function (data) {
                    $scope.projects = data;
                    //$scope.totalUsers = result.data.Count
                });
            }

            getResultsPage(1);
        }]);