angular.module('app.controllers')
    .controller('LoginController',['$scope','$location','OAuth',function($scope,$location,OAuth) {
        $scope.user = {
            username: '',
            password: ''
        };

        $scope.error = {
            message: '',
            error: false
        };

        $scope.login = function() {
            // console.log($scope.user);
            if($scope.form.$valid){
                OAuth.getAccessToken($scope.user).then(function(){
                    $location.path('home');
                },function(data){
                    // alert('Login invalido');
                    $scope.error.error = true;
                    $scope.error.message = data.data.error_description;
                });
            }
        };
    }]);