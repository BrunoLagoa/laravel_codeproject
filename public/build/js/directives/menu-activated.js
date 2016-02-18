angular.module('app.directives')
    .directive('menuActivated',
        ['$location', function ($location) {
            return {
                restrict: 'A',
                link: function (scope, element, attr) {
                    scope.$watch(function(){
                        return $location.path();
                    }, function(){
                        var liElements = element[0].querySelectorAll('li[data-match-route]');
                        var pattern = liElements.attr('data-match-route').replace('/','\\/');
                        var regexp = new RegExp(pattern, 'i');
                        if(regexp.test(newValue)){
                            liElements.children().first().addClass('actived');
                        }else{
                            liElements.children().first().removeClass('actived');
                        }
                    });
                }
            };
        }]);