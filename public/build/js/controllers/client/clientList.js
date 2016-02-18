angular.module('app.controllers')
    .controller('ClientListController',['$scope','Client',function($scope,Client) {
        Client.query({
            orderBy: 'created_at',
            sortedBy: 'desc',
            limit: 8
        }, function (response) {
            $scope.clients = response.data;
        });
    }]);