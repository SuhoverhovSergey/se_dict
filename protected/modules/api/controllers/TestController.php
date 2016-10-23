<?php

class TestController extends ApiController
{
    public function actionGet($username)
    {
        try {
            $user = User::findOrCreate($username);
            $test = Test::getTestByUserId($user->id);

            $question = Dict::model()->getNextQuestion($test->id);
            $variants = $question->getVariants();

            $questionType = rand(0, 1); // 0 = en, 1 = ru
            $variantList = [$question->{!$questionType ? 'en' : 'ru'}];
            foreach ($variants as $variant) {
                $variantList[] = $variant->{!$questionType ? 'en' : 'ru'};
            }
            shuffle($variantList);

            $this->sendSuccessResponse([
                'question' => [
                    'dict_id' => $question->id,
                    'text' => $questionType ? $question->en : $question->ru,
                    'question_lang' => $questionType ? 'en' : 'ru',
                ],
                'variants' => $variantList,
            ]);
        } catch (Exception $ex) {
            $this->sendErrorResponse($ex->getMessage());
        }
    }
}