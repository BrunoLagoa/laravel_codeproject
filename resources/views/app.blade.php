<!DOCTYPE html>
<html lang="pt-br" ng-app="app">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    @if(Config::get('app.debug'))
        <link rel="stylesheet" href="{{ asset('build/css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('build/css/components.css') }}">
        <link rel="stylesheet" href="{{ asset('build/css/flaticon.css') }}">
        <link rel="stylesheet" href="{{ asset('build/css/font-awesome.css') }}">
    @else
        <link rel="stylesheet" href="{{ elixir('css/all.css') }}">
        @endif

        <!-- Fonts -->
        <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>
<body>

<load-template url="build/views/templates/menu.html"></load-template>

<div ng-view>

</div>
<!-- Scripts -->
@if(Config::get('app.debug'))
    <script src="{{ asset('build/js/vendor/jquery.min.js') }}"></script>
    <script src="{{ asset('build/js/vendor/angular.min.js') }}"></script>
    <script src="{{ asset('build/js/vendor/angular-route.min.js') }}"></script>
    <script src="{{ asset('build/js/vendor/angular-resource.min.js') }}"></script>
    <script src="{{ asset('build/js/vendor/angular-animate.min.js') }}"></script>
    <script src="{{ asset('build/js/vendor/angular-messages.min.js') }}"></script>
    <script src="{{ asset('build/js/vendor/ui-bootstrap-tpls.min.js') }}"></script>
    <script src="{{ asset('build/js/vendor/navbar.min.js') }}"></script>
    <script src="{{ asset('build/js/vendor/angular-cookies.min.js') }}"></script>
    <script src="{{ asset('build/js/vendor/query-string.js') }}"></script>
    <script src="{{ asset('build/js/vendor/angular-oauth2.min.js') }}"></script>
    <script src="{{ asset('build/js/vendor/ng-file-upload.min.js') }}"></script>
    <script src="{{ asset('build/js/vendor/angular-locale_pt-br.js') }}"></script>
    <script src="{{ asset('build/js/vendor/http-auth-interceptor.js') }}"></script>
    <script src="{{ asset('build/js/vendor/dirPagination.js') }}"></script>


    <script src="{{ asset('build/js/app.js') }}"></script>

    <!-- CONTROLLERS -->
    <script src="{{ asset('build/js/controllers/login.js') }}"></script>
    <script src="{{ asset('build/js/controllers/loginModal.js') }}"></script>
    <script src="{{ asset('build/js/controllers/home.js') }}"></script>

    <!-- CONTROLLER: Clientes -->
    <script src="{{ asset('build/js/controllers/client/clientList.js') }}"></script>
    <script src="{{ asset('build/js/controllers/client/clientNew.js') }}"></script>
    <script src="{{ asset('build/js/controllers/client/clientEdit.js') }}"></script>
    <script src="{{ asset('build/js/controllers/client/clientRemove.js') }}"></script>

    <!-- CONTROLLER: Projects -->
    <script src="{{ asset('build/js/controllers/project/projectList.js') }}"></script>
    <script src="{{ asset('build/js/controllers/project/projectNew.js') }}"></script>
    <script src="{{ asset('build/js/controllers/project/projectEdit.js') }}"></script>
    <script src="{{ asset('build/js/controllers/project/projectRemove.js') }}"></script>

    <!-- CONTROLLER: Project Notes -->
    <script src="{{ asset('build/js/controllers/project-note/projectNoteShow.js') }}"></script>
    <script src="{{ asset('build/js/controllers/project-note/projectNoteList.js') }}"></script>
    <script src="{{ asset('build/js/controllers/project-note/projectNoteNew.js') }}"></script>
    <script src="{{ asset('build/js/controllers/project-note/projectNoteEdit.js') }}"></script>
    <script src="{{ asset('build/js/controllers/project-note/projectNoteRemove.js') }}"></script>

    <!-- CONTROLLER: Project Files -->
    <script src="{{ asset('build/js/controllers/project-file/projectFileList.js') }}"></script>
    <script src="{{ asset('build/js/controllers/project-file/projectFileNew.js') }}"></script>
    <script src="{{ asset('build/js/controllers/project-file/projectFileEdit.js') }}"></script>
    <script src="{{ asset('build/js/controllers/project-file/projectFileRemove.js') }}"></script>


    <!-- CONTROLLER: Project Tasks -->
    <script src="{{ asset('build/js/controllers/project-task/projectTaskList.js') }}"></script>
    <script src="{{ asset('build/js/controllers/project-task/projectTaskNew.js') }}"></script>
    <script src="{{ asset('build/js/controllers/project-task/projectTaskEdit.js') }}"></script>
    <script src="{{ asset('build/js/controllers/project-task/projectTaskRemove.js') }}"></script>

    <!-- CONTROLLER: Project Members -->
    <script src="{{ asset('build/js/controllers/project-member/projectMemberList.js') }}"></script>
    <script src="{{ asset('build/js/controllers/project-member/projectMemberRemove.js') }}"></script>

    <!-- DIRECTIVES -->
    <script src="{{ asset('build/js/directives/projectFileDownload.js') }}"></script>
    <script src="{{ asset('build/js/directives/loginForm.js') }}"></script>
    <script src="{{ asset('build/js/directives/loadTemplate.js') }}"></script>

    <!-- FILTERS -->
    <script src="{{ asset('build/js/filters/date-br.js') }}"></script>

    <!-- SERVICES -->
    <script src="{{ asset('build/js/services/url.js') }}"></script>
    <script src="{{ asset('build/js/services/oauthFixInterceptor.js') }}"></script>
    <script src="{{ asset('build/js/services/client.js') }}"></script>
    <script src="{{ asset('build/js/services/project.js') }}"></script>
    <script src="{{ asset('build/js/services/projectNote.js') }}"></script>
    <script src="{{ asset('build/js/services/projectFile.js') }}"></script>
    <script src="{{ asset('build/js/services/projectTask.js') }}"></script>
    <script src="{{ asset('build/js/services/user.js') }}"></script>
    <script src="{{ asset('build/js/services/projectMember.js') }}"></script>
@else
    <script src="{{ elixir('js/all.js') }}"></script>
@endif

</body>
</html>