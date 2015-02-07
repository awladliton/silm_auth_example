<?php

require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

require_once 'DatabaseHandler.php';
global $objHandler;
$objHandler = new DatabaseHandler();
$app = new \Slim\Slim();

$app->post('/connect', "generateToken");
$app->get('/users', "verifyKey", 'user_list');
$app->run();

function user_list() {
    global $objHandler;
    echo json_encode($objHandler->getUserDetails());
}

function verifyKey() {
    global $objHandler;
    $app = \Slim\Slim::getInstance();
    $strToken = $app->request->params('token');
//    var_dump($objHandler->verifyToken($strToken));
    //check api key
    if (time() > $objHandler->verifyToken($strToken)) {
        echo json_encode(array('status' => 'unauthorized', 'message' => 'invalid api key'));
        $app->status(401);
        $app->stop();
    }
}

function generateToken(){
    global $objHandler;
    $app = \Slim\Slim::getInstance();
    $uid = $app->request->params('uid');
    $email = $app->request->params('email');

    //check api key
    if (! $userId = $objHandler->authenticate($uid, $email)) {
        echo json_encode(array('status' => 'unauthorized', 'message' => 'invalid api key'));
        $app->status(401);
        $app->stop();
    }
    echo json_encode(array('status' => 200, 'token' => $objHandler->generate_token($userId)));
}
