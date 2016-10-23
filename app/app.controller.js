angular.module("dictApp").
controller("AppController", function ($scope, $rootScope, localStorageService) {
    var userName = localStorageService.get('user.name');

    $rootScope.user = {
        'name': userName
    };
});