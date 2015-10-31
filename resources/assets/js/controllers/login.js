angular.module('app.controller')
    .controller('LoginController', ['$scope', function($scope) {
        $scope.user = {
            username: '',
            password: ''
        };

        $scope.login = function() {

        };
    }]);