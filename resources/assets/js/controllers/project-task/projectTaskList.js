angular.module('app.controllers')
    .controller('ProjectTaskListController',[
        '$scope','$routeParams' , 'appConfig', 'ProjectTask', function($scope, $routeParams, appConfig, ProjectTask){
            $scope.projectTask = new ProjectTask();
            $scope.project_id = $routeParams.id;

            $scope.save = function (){
                if($scope.form.$valid) {
                    $scope.projectTask.status = appConfig.projectTask.status[0].value;
                    $scope.projectTask.$save({id: $routeParams.id}).then(function () {
                        $scope.projectTask = new ProjectTask();
                        $scope.loadTask();
                    });
                }
            };

            $scope.loadTask=function(){
                $scope.projectTasks = ProjectTask.query({
                    id: $routeParams.id,
                    orderBy: 'id',
                    sortedBy: 'desc'
                });

                //console.log($scope.projectTasks);
            };

            $scope.loadTask();

        }]);