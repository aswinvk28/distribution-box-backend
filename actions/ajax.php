<?php

define('PAGE_ROOT', dirname(__FILE__));

require_once '../config.php';
require_once 'errors.php';
require_once 'session.php';
require_once '../includes/page.php';
require_once '../includes/routes.php';

require_once '../includes/routes.php';

global $routes;
session_start();
$context = get_page_context();



if($GLOBALS['debug']) {
    $params = (array) $context;
    $params = var_export($params, true);
    trigger_error("Context\n{$params}\n" . 
    " on " . date("Y-m-d H:i:s") . " using " . $context->ip, E_USER_NOTICE);
}

register_shutdown_function('page_shutdown_site');