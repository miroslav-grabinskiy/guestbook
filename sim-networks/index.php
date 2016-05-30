<?php
	use App\Config\Config;
	use App\Routes\Router;

	require_once('app/libs/lib.php');
	
	$router = new Router;
	$router->runApp();
?>