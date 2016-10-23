angular.module('index').
controller('IndexController', function ($scope, $rootScope, $location) {
    var user = $rootScope.user;

    $scope.user = user;

    $scope.beginTest = function () {
        if (!user.name) {
            alert('Введите имя');
        } else {
            $location.path('/test');
        }
    }
});