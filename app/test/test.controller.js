angular.module('test').
controller('TestController', function ($scope, $rootScope, $location) {
    var user = $rootScope.user;

    if (!user.name) {
        $location.path('/');
    }
});