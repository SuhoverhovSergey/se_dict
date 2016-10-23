<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en" ng-app="dictApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="<?php echo Yii::app()->request->baseUrl ?>/bower_components/angular/angular.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/bower_components/angular-route/angular-route.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/bower_components/angular-local-storage/dist/angular-local-storage.min.js"></script>

    <title>Dict</title>
</head>

<body ng-controller="AppController">

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Dict</a>
        </div>
    </div>
</nav>

<div class="container" ng-view></div>

<script src="<?php echo Yii::app()->request->baseUrl ?>/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="<?php echo Yii::app()->request->baseUrl ?>/app/app.module.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl ?>/app/app.config.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl ?>/app/app.controller.js"></script>

<script src="<?php echo Yii::app()->request->baseUrl ?>/app/index/index.module.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl ?>/app/index/index.controller.js"></script>

<script src="<?php echo Yii::app()->request->baseUrl ?>/app/test/test.module.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl ?>/app/test/test.controller.js"></script>

</body>
</html>
