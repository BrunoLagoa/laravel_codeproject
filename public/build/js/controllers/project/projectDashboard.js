angular.module('app.controllers')
    .controller('ProjectDashboardController',
        ['$scope', '$routeParams', '$location', 'Project', 'ProjectTask', 'appConfig',
            function ($scope, $routeParams, $location, Project, ProjectTask, appConfig) {

                $scope.project = {};

                $scope.status = appConfig.project.status;

                $("#progress").addClass('hidden');

                Project.query({
                    orderBy: 'created_at',
                    sortedBy: 'desc',
                    limit: 5
                }, function (response) {
                    $scope.projects = response.data;
                });

                $scope.showProject = function (client) {
                    $("#progress").removeClass('hidden');
                    $scope.project = client;
                };

                $scope.updateTask = function (task) {
                    task.status = 3;
                    ProjectTask.update({id:task.project_id, taskId:task.id}, task, function(data){
                        console.log(data);
                        $scope.project.progress = data.project.progress;
                    });
                };


            }]);