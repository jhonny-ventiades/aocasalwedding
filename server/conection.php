
<?php

/**
 * Laravel Eloquent ORM
 */
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;



$database_capsule = new Capsule;

$database_capsule->addConnection([
		'driver'    => 'mysql',
		'host'      => '127.0.0.1',

	   	'database'  => 'bd_aocasalwedding',
		'username'  =>  'root',
		'password'  =>  '',
	
		'charset'   => 'utf8',
		'collation' => 'utf8_general_ci',
		'prefix'    => ''
		]);

$database_capsule->setAsGlobal();
$database_capsule->bootEloquent();
?>
