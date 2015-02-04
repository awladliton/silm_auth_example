<?php
/**
 * Step 1: Require the Slim Framework
 *
 * If you are not using Composer, you need to require the
 * Slim Framework and register its PSR-0 autoloader.
 *
 * If you are using Composer, you can skip this step.
 */
require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

/**
 * Step 2: Instantiate a Slim application
 *
 * This example instantiates a Slim application using
 * its default settings. However, you will usually configure
 * your Slim application now by passing an associative array
 * of setting names and values into the application constructor.
 */

$app = new \Slim\Slim();

/**
 * Step 3: Define the Slim application routes
 *
 * Here we define several Slim application routes that respond
 * to appropriate HTTP request methods. In this example, the second
 * argument for `Slim::get`, `Slim::post`, `Slim::put`, `Slim::patch`, and `Slim::delete`
 * is an anonymous function.
 */
//$app->get('/:id/:key', 'verifyKey',  'getItem');
$app->get('/', 'verifyKey', 'root');
$app->get('/users', 'verifyKey', 'user_list');
$app->get('/user/:id', 'verifyKey', 'get_user');

$app->run();

function root() {
    echo "Hello world";
};

function user_list() {
    echo json_encode(array('status' => 'ok', 'message' => 'here goes user list'));
}

function get_user($id) {
    echo 'here goes user '. $id;
}


function verifyKey() {
    $app = \Slim\Slim::getInstance();
    $uid = $app->request->headers('uid');
    $key = $app->request->headers('key');
    if (validateUserKey($uid, $key) === false) {
        echo json_encode(array('status' => 'unauthorized', 'message' => 'invalid api key'));
        $app->status(401);
        $app->stop();
    }
}

function validateUserKey($uid, $key) {
    if ($uid == 'demo' && $key == 'demo') {
        return true;
    } else {
        return false;
    }
}