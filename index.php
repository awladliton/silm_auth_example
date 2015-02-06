<?php

require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

require_once 'DatabaseHandler.php';
global $objHandler;
$objHandler = new DatabaseHandler();
$app = new \Slim\Slim();

$app->post('/users', "verifyKey", 'user_list');
$app->run();

function user_list() {
    global $objHandler;
    echo json_encode($objHandler->getUserDetails());
}

function verifyKey() {
    global $objHandler;
    $app = \Slim\Slim::getInstance();
    $uid = $app->request->params('name');
    $email = $app->request->params('email');
    //check api key
    if ($objHandler->authenticate($uid, $email) === false) {
        echo json_encode(array('status' => 'unauthorized', 'message' => 'invalid api key'));
        $app->status(401);
        $app->stop();
    }
}
