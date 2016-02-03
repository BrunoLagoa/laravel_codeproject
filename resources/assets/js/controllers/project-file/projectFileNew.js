angular.module('app.controllers')
    .controller('ProjectFileNewController',
        ['$scope', '$location', '$routeParams', 'appConfig', 'Url', 'Upload',
            function ($scope, $location, $routeParams, appConfig, Url, Upload) {
                $scope.project_id = $routeParams.id;
                $scope.save = function () {
                    if ($scope.form.$valid) {
                        var url = appConfig.baseUrl +
                            Url.getUrlFromUrlSymbol(appConfig.urls.projectFile, {
                                id: $routeParams.id,
                                idFile: ''
                            });
                        Upload.upload({
                            url: url,
                            fields: {
                                name: $scope.projectFile.name,
                                description: $scope.projectFile.description,
                                project_id: $routeParams.id
                            },
                            file: $scope.projectFile.file
                        }).success(function (data, status, headers, config) {
                            $location.path('/project/' + $routeParams.id + '/files');
                        });
                    }
                }
            }]);