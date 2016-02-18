angular.module('app.controllers')
    .controller('ClientDashboardController',
        ['$scope', '$location', '$routeParams', 'Client',
            function ($scope, $location, $routeParams, Client) {
                Client.query({
                    orderBy: 'created_at',
                    sortedBy: 'desc',
                    limit: 8
                }, function (response) {
                    $scope.clients = response.data;
                });
            }]);