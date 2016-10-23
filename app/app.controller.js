angular.module("dictApp").
controller("AppController", function ($scope, $rootScope, $location) {
    $rootScope.user = {
        'name': ''
    };
});