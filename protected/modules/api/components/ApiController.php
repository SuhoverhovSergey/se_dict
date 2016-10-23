<?php

class ApiController extends CController
{
    public function sendErrorResponse($message)
    {
        $this->sendResponse(500, [
            'result' => false,
            'message' => $message,
        ]);
    }

    public function sendSuccessResponse($data = [])
    {
        $this->sendResponse(200, [
            'result' => true,
            'data' => $data,
        ]);
    }

    public function sendResponse($status, $data = [])
    {
        header('HTTP/1.1 ' . $status . ' ');
        header('Content-type: application/json');
        echo CJSON::encode($data);
        Yii::app()->end();
    }
}