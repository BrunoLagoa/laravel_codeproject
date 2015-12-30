angular.module('app.directives')
    .directive('projectFileDownload',
        ['appConfig', 'ProjectFile', function (appConfig, ProjectFile) {
        return {
            restrict: 'E',
            templateUrl: appConfig.baseUrl + '/build/views/templates/projectFileDownload.html',
            link: function(scope, element, attr){

            },
            controller: ['$scope', '$element', '$attrs',function($scope, $element, $attrs){
                $scope.downloadFile = function(){
                    var anchor = $element.children()[0];
                    $(anchor).addClass('disabled');
                    $(anchor).text('Carregando...');
                }
            }]
        };
    }]);