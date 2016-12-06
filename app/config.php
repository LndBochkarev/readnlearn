<?php

error_reporting(E_ALL);

$site_root = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR;

/**
 * @todo handle errors
 */
require_once $site_root . 'app/classes/Registry.php';
require_once $site_root . 'app/classes/ViewData.php';

$registry = new Registry();

$registry->set('site_root', $site_root);
$registry->set('templates_path', $site_root . 'app/templates/');
$registry->set('view_path', $site_root . 'app/view/');

$registry->set('db_host', 'localhost');
$registry->set('db_name', 'readnlearn');
$registry->set('db_username', 'readlearn');
$registry->set('db_pass', '3a5badyr');//!!!

$data = new ViewData();
$registry->set('view_data', $data);

$registry->set('error_handler', '');
$registry->set('error_page', $site_root . 'app/scripts/error_page.php');

$registry->set('translator_key', 
        'trnsl.1.1.20161022T180721Z.918112200d7f79e8.18e153e5213fa8d6a7a82b0e0ce0552c0dd3394c');
$registry->set('translator_url', 'https://translate.yandex.net/api/v1.5/tr.json/translate?');