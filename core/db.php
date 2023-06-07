<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => '127.0.0.1',
    'database' => 'shop',
    'username' => 'root',
    'password' => '',
    'port'=>3306
]);


$capsule->bootEloquent();