angular.module('dictApp').
config(['$locationProvider', '$routeProvider',
    function config($locationProvider, $routeProvider) {
        $locationProvider.html5Mode(false);

        $routeProvider.
            when('/', {
                templateUrl: '/app/index/index.template.html',
                controller: 'IndexController'
            }).
            when('/test', {
                templateUrl: '/app/test/test.template.html',
                controller: 'TestController'
            }).
            otherwise('/');
    }
]);