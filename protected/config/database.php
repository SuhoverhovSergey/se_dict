<?php

$dbConf = [
    'connectionString' => 'mysql:host=localhost;dbname=sedict',
    'emulatePrepare' => true,
    'username' => '',
    'password' => '',
    'charset' => 'utf8',
];

$localFilePath = dirname(__FILE__) . '/db-local.php';
if (file_exists($localFilePath)) {
    return CMap::mergeArray($dbConf, require($localFilePath));
}

return $dbConf;
