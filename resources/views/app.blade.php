Skip to content
Sign up Sign in
This repository
Search
Explore
Features
Enterprise
Pricing
Watch 1  Star 1  Fork 0 BrunoLagoa/laravel_codeproject
Code  Issues 0  Pull requests 0  Pulse  Graphs
Branch: master Find file Copy pathlaravel_codeproject/resources/views/app.blade.php
831427f  10 minutes ago
@BrunoLagoa BrunoLagoa - LaravelAngular-8.1-Instalando ng-file-upload
1 contributor
RawBlameHistory     122 lines (108 sloc)  5.35 KB
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
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Laravel</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/#/login') }}">Welcome</a></li>
                <li><a href="{{ url('/#/clients') }}">Clients</a></li>
                <li><a href="{{ url('/#/projects') }}">Projects</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if(auth()->guest())
                    @if(!Request::is('auth/login'))
                        <li><a href="{{ url('/auth/login') }}">Login</a></li>
                    @endif
                    @if(!Request::is('auth/register'))
                        <li><a href="{{ url('/auth/register') }}">Register</a></li>
                    @endif
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

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

    <script src="{{ asset('build/js/app.js') }}"></script>

    <!-- CONTROLLERS !-->
    <script src="{{ asset('build/js/controllers/login.js') }}"></script>
    <script src="{{ asset('build/js/controllers/home.js') }}"></script>

    <script src="{{ asset('build/js/controllers/client/clientList.js') }}"></script>
    <script src="{{ asset('build/js/controllers/client/clientNew.js') }}"></script>
    <script src="{{ asset('build/js/controllers/client/clientEdit.js') }}"></script>
    <script src="{{ asset('build/js/controllers/client/clientRemove.js') }}"></script>

    <script src="{{ asset('build/js/controllers/project/projectList.js') }}"></script>
    <script src="{{ asset('build/js/controllers/project/projectNew.js') }}"></script>
    <script src="{{ asset('build/js/controllers/project/projectEdit.js') }}"></script>
    <script src="{{ asset('build/js/controllers/project/projectRemove.js') }}"></script>

    <script src="{{ asset('build/js/controllers/project-note/projectNoteShow.js') }}"></script>
    <script src="{{ asset('projectFileList.js') }}"></script>
    <script src="{{ asset('projectFileNew.js') }}"></script>
    <script src="{{ asset('build/js/controllers/project-note/projectNoteEdit.js') }}"></script>
    <script src="{{ asset('build/js/controllers/project-note/projectNoteRemove.js') }}"></script>

    <!-- FILTERS !-->
    <script src="{{ asset('build/js/filters/date-br.js') }}"></script>

    <!-- SERVICES !-->
    <script src="{{ asset('build/js/services/client.js') }}"></script>
    <script src="{{ asset('build/js/services/project.js') }}"></script>
    <script src="{{ asset('build/js/services/projectNote.js') }}"></script>
    <script src="{{ asset('build/js/services/user.js') }}"></script>
@else
    <script src="{{ elixir('js/all.js') }}"></script>
@endif
<script src="https://code.angularjs.org/1.4.1/i18n/angular-locale_pt-br.js"></script>
</body>
</html>