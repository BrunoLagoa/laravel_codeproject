angular.module('app.controllers')
    .controller('ProjectNoteListController',['$scope','Client',function($scope,Client) {
        $scope.clients = Client.query();
    }]);