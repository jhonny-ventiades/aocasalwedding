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
	$app->post('/user/profile/savePerson','App\Controllers\PersonController:savePerson');
	$app->post('/user/profile/logIn', 'App\Controllers\PersonController:logIn');
	$app->put('/user/profile/updatePerson/:id', 'App\Controllers\PersonController:updatePerson');
	$app->put('/user/profile/updateUser/:id', 'App\Controllers\PersonController:updateUser');	
});

$app->notFound(function () use ($app) {
    $app->render('index.html');
});

$app->run();
?>
