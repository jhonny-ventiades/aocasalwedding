<?php

require 'vendor/autoload.php';
require 'server/Controllers/AccountController.php';
require 'server/Controllers/ContributionController.php';
require 'server/Controllers/EventController.php';
require 'server/Controllers/PersonController.php';
require 'server/Controllers/WeddingController.php';
require 'server/Controllers/WishController.php';

$app = new \Slim\Slim();
date_default_timezone_set('UTC');

/*ini_set("display_errors", true);
error_reporting( E_ALL );*/
error_reporting(E_ALL);
ini_set("display_errors", 1);

$app->config(array(
    'debug' => true,
    'templates.path' => 'client/'
));

$app->get('/', function () use ($app) {
    $app->render('index.html');
});


// API group
$app->group('/api', function () use ($app) {

	$app->get('/message',function() use($app){
		echo 'hola bola';
	});
});

$app->notFound(function () use ($app) {
    $app->render('index.html');
});

$app->run();
?>
