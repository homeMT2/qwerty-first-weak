<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require 'core/bootstrap.php';

$uri = trim( $_SERVER['REQUEST_URI'], '/' );

$router = Router::load('routes.php');
require $router->direct();