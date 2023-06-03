<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'shop',
    'username' => 'root',
    'password' => '',
    'port'=>3307
]);


$capsule->bootEloquent();