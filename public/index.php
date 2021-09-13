<?php
use \App\Application;
use \App\Route;
use \App\Http\Request;
use \App\Http\Response;

require_once '../constants.php';

require_once '../vendor/autoload.php';

$router =  Route::getInstance();
$app = Application::getInstance($router, new Request(), new Response());

require_once '../routes.php';

$app->mount();
// end of file
