angular.module('app.directives')
    .directive('tabProject',
        [function () {
            return {
                restrict: 'A',
                link: function (scope, element, attrs) {
                    $(element).find('a').click(function () {
                        var tabContent = $(element).parent().find('.tab-content'),
                            a = $(this);
                        $(element).find('.active').removeClass('active');
                        tabContent.find('.active').removeClass('active');
                        tabContent.find("[id=" + a.attr('aria-controls') + "]").addClass('active');
                        a.addClass('active');
                    });
                }
            };
        }]);