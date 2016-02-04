angular.module('app.controllers')
    .controller('ProjectNoteRemoveController',
        ['$scope', '$location', '$routeParams', 'ProjectNote',
            function ($scope, $location, $routeParams, ProjectNote) {
                //$scope.projectNote = ProjectNote.get({id: $routeParams.id});

                $scope.project_id = $routeParams.id;
                $scope.projectNote = ProjectNote.get({
                    id: $routeParams.id,
                    idNote: $routeParams.idNote
                });

                //console.log($scope.client);

                $scope.remove = function () {
                    $scope.projectNote.$delete({
                        //id: null,
                        id: $routeParams.id,
                        idNote: $scope.projectNote.id
                    }).then(function () {
                        $location.path('/project/' + $routeParams.id + '/notes');
                    });

                }
            }]);