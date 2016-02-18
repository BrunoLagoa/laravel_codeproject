angular.module('app.controllers')
    .controller('ClientDashboardController',
        ['$scope','$location','$routeParams','Client',
            function($scope,$location,$routeParams,Client) {
        $scope.client = Client.get({id: $routeParams.id});

        $scope.save = function() {
            if($scope.form.$valid){
                Client.update({id: $scope.client.id},$scope.client,function(){
                    $location.path('/clients');
                });
            }
        }
    }]);