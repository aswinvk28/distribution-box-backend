<?php

define('PAGE_ROOT', dirname(dirname(__FILE__)));

require_once '../vendor/autoload.php';
require_once '../includes/routes.php';
require_once '../config.php';
require_once 'errors.php';
require_once '../includes/page.php';

global $routes;
session_start();

require_once 'session.php';
require_once 'query.php';
require_once 'database.php';

$context = get_page_context();

$q = new \PowerDistribution\Access\Query(\PowerDistribution\Access\Database::getConnection());

var_dump($q->selectAllFromTemplated("templated_items"));

if($GLOBALS['debug']) {
    $params = (array) $context;
    $params = var_export($params, true);
    trigger_error("Context\n{$params}\n" . 
    " on " . date("Y-m-d H:i:s") . " using " . $context->ip, E_USER_NOTICE);
}

register_shutdown_function('page_shutdown_site');
