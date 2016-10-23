angular.module('index').
controller('IndexController', function ($scope, $rootScope, $location, localStorageService) {
    var user = $rootScope.user;

    $scope.user = user;

    $scope.beginTest = function () {
        if (!user.name) {
            alert('Введите имя');
        } else {
            localStorageService.set('user.name', user.name);
            $location.path('/test');
        }
    }
});