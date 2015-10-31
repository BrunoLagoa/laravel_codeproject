var app = angular.module('app',[]);

app.config(function($routeProvider){
    $routeProvider
        .when('/login',{
            templateUrl: 'build/views/login.html',
            controller: 'LoginController'
        })
        .when('/home',{
            templateUrl: 'build/views/home.html',
            controller: 'HomeController'
        })
});