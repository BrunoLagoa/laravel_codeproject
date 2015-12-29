angular.module('app.directives')
    .directive('projectFileDownload',
        ['appConfig', 'ProjectFile', function (appConfig, ProjectFile) {
        return {
            restrict: 'E',
            templateUrl: appConfig.baseUrl + '/build/views/templates/projectFileDownload.html',
            link: function(scope, element, attr){

            },
            controller: ['$scope', '$attrs',function($scope, $attrs){

            }]
        };
    }]);