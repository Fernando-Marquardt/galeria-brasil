<?php
$loader = require 'vendor/autoload.php';
$loader->addPsr4('Modules\\', __DIR__ . '/modules');

$app = new \Slim\Slim();

require 'routes.php';