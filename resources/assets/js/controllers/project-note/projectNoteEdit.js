angular.module('app.controllers')
    .controller('ProjectNoteEditController',
        ['$scope', '$location', '$routeParams', 'ProjectNote',
            function ($scope, $location, $routeParams, ProjectNote) {

                $scope.project_id = $routeParams.id;
                $scope.projectNote = ProjectNote.get({
                    id: $routeParams.id,
                    idNote: $routeParams.idNote
                });

                $scope.save = function () {

                    if ($scope.form.$valid) {
                        ProjectNote.update({
                            //id: null, idNote: $scope.projectNote.id
                            id: $routeParams.id,
                            idNote: $scope.projectNote.id
                        }, $scope.projectNote, function () {
                            $location.path('/project/' + $routeParams.id + '/notes');
                        });
                    }
                }
            }]);