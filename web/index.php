<?php

define('WEB_DIR', __DIR__);
require_once "../vendor/autoload.php";
use AeriaGames\Core;
error_reporting(-1);
ini_set('display_errors', 'On');

$request = new Core\Request($_REQUEST);
$response = (new Core\Application($request))->execute();

$response->send();
