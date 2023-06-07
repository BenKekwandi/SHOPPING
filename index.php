<?php

define('ROOT_PATH', __DIR__);

require_once (ROOT_PATH.'/config.php');
require_once (ROOT_PATH.'/encryption.php');

require_once 'vendor/autoload.php';

session_start();

require_once (ROOT_PATH.'/routes.php');

echo "404 ERROR";

