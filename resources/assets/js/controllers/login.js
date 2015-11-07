angular.module('app.controllers')
    .controller('LoginController',['$scope','$location','OAuth',function($scope,$location,OAuth) {
        $scope.user = {
            username: '',
            password: ''
        };

        $scope.login = function() {
            // console.log($scope.user);
            if($scope.form.$valid){
                OAuth.getAccessToken($scope.user).then(function(){
                    $location.path('home');
                },function(){
                    alert('Login invalido');
                });
            }
        };
    }]);