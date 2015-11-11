angular.module('app.controllers')
    .controller('ClientListController',['$scope','Client',function($scope,Client) {
        options.async = true;
        $scope.clients = Client.query();
    }]);