<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->

    </head>
    <body ng-app="app">
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Laravel
                    <% 'test' %>
                    <div ng-view></div>
                </div>
            </div>
        </div>

        <script src="{{ asset('js/angular/angular.min.js') }}"></script>
        <script src="{{ asset('js/angular/angular-animate.min.js') }}"></script>
        <script src="{{ asset('js/angular/angular-route.min.js') }}"></script>
        <script src="{{ asset('js/angular/angular-resource.min.js') }}"></script>
        <script src="{{ asset('js/angular/angular-sanitize.min.js') }}"></script>
        <script src="{{ asset('js/angular/angular-ui/angular-route.min.js') }}"></script>
        <script src="{{ asset('plugins') }}"></script>
        <script src="{{ asset('js/common/helpers.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('js/jquery/jquery-2.2.0.js') }}"></script>
        <script src="{{ asset('views/test1/index.js') }}"></script>
    </body>
</html>
