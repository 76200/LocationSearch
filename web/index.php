<?php

define('WEB_DIR', __DIR__);
require_once "../vendor/autoload.php";
use AeriaGames\Core;

$request = new Core\Request($_REQUEST);
$response = (new Core\Application($request))->execute();
