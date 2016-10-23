(function () {
    'use strict';
    var app = angular.module('app', [
        'ngRoute',
        'ngAnimate',
        'ngSanitize',
        'ui.bootstrap',
        'ngResource'
    ], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });

    var config = {};

    //-- Generando constante Config
    app.constant('Config', config);

    app.config(function($routeProvider) {
        $routeProvider.when('/test',{
            templateUrl: 'views/test1/index.html'
        }).otherwise({
            redirectTo:'/'
        });
    });
})();