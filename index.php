<?php

require_once 'app/actions/ActionRouter.php';
require_once 'app/config.php';

global $registry;

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

if (!$action ) {
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    
    if (!$action) {
        $action = 'index';
    }
}

$registry->set('action', $action);

try {
    $router = new ActionRouter($registry);
    $router->run();
} catch (Exception $ex) {

    /**
     * replace with error handler
     */
    $error_msg = $ex->getMessage();
    //$registry['view_data']['error_message'] = $error_msg;
    setcookie('error_message', $error_msg);

    header('location: index');
}