angular.module('test').
controller('TestController', function ($scope, $rootScope, $location, $http) {
    var user = $rootScope.user;

    if (!user.name) {
        $location.path('/');
    }

    $scope.question = {
        'dict_id': 0,
        'text': '',
        'question_lang': ''
    };
    $scope.variants = [];

    var getQuestion = function () {
        $http.get('/api/test', {params: {username: user.name}}).
            then(function(response) {
                var data = response.data;
                if (data.result) {
                    $scope.question = data.data.question;
                    $scope.variants = data.data.variants;
                }
            });
    };

    getQuestion();
});