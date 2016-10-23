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

    var getNextQuestion = function () {
        $http.get('/api/test', {params: {username: user.name}}).
            then(function (response) {
                var data = response.data;
                if (data.result) {
                    $scope.question = data.data.question;
                    $scope.variants = data.data.variants;
                }
            });
    };

    getNextQuestion();

    $scope.answer = '';

    $scope.selectVariant = function () {
        if ($scope.answer) {
            $http.post('/api/answer', {
                dict_id: $scope.question.dict_id,
                question_lang: $scope.question.question_lang,
                answer: $scope.answer,
                username: user.name
            }).then(function (response) {
                var data = response.data;
                if (data.result) {
                    data = data.data;
                    if (data.status === 1) {
                        $scope.answer = '';
                        getNextQuestion();
                    } else if (data.status === 0) {
                        alert('Ошибка. Попробуйте еще раз.');
                    } else if (data.status === 2) {
                        alert('Тест завершен. Ваша оценка - ' + data.score);
                        $location.path('/');
                    }
                }
            });
        } else {
            alert('Выберите вариант ответа');
        }
    };
});