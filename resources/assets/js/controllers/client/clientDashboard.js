angular.module('app.controllers')
    .controller('ClientDashboardController', ['$scope', '$location', '$routeParams', 'Client', 'appConfig',
        function ($scope, $location, $routeParams, Client, appConfig) {
            $scope.client = {};

            Client.query({
                orderBy: 'created_at',
                sortedBy: 'desc',
                limit: 8
            }, function (data) {
                $scope.clients = data.data;
            });

            $scope.status = appConfig.project.status;

            $scope.showClient = function (o) {
                $scope.client = o;
                $scope.client.skype = 'skype';
                $scope.client.twitter = '@twitter';
                $scope.client.facebook = "facebook.com/vilmarspies";
                $scope.client.google = "Codeeducation";
                $scope.client.url = 'www.code.education';
            };
        }]);