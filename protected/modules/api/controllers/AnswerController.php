<?php

class AnswerController extends ApiController
{
    public function actionCreate()
    {
        try {
            $data = CJSON::decode(Yii::app()->request->rawBody);

            $user = User::findOrCreate($data['username']);
            $test = Test::getTestByUserId($user->id);

            $dict = Dict::model()->findByPk($data['dict_id']);

            $testLog = new TestLog();
            $testLog->test_id = $test->id;
            $testLog->dict_id = $dict->id;
            $testLog->question_lang = $data['question_lang'];
            $testLog->is_correct = $data['answer'] == $dict->{$data['question_lang'] == 'en' ? 'ru' : 'en'};
            $testLog->save(false);

            $status = $testLog->is_correct ? 1 : 0; // 0 - ошибка, 1 - верно
            $test = Test::model()->findByPk($test->id);
            if ($test->is_finished) {
                $status = 2; // тест завершен
            }

            $user = User::model()->findByPk($user->id);
            $this->sendSuccessResponse([
                'status' => $status,
                'score' => $user->score,
            ]);
        } catch (Exception $ex) {
            $this->sendErrorResponse($ex->getMessage());
        }
    }
}