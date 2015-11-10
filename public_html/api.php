<?php
require '../vendor/autoload.php';

$app = new \Slim\App();
$app->add(new \GaleriaBrasil\Middleware\Authenticate());
