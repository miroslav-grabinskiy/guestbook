<?php
	function autoload($className) {
	    $className = ltrim($className, '\\');
	    $fileName  = '';
	    $namespace = '';

	    if ($lastNsPos = strrpos($className, '\\')) {
	        $namespace = substr($className, 0, $lastNsPos);
	        $className = substr($className, $lastNsPos + 1);
	    	//$className = strtolower($className);
	        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
	    }
	    
	    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

	    $paths = explode('/', $fileName);
	    $pathLen = count($paths);

	    for ($i = 0; $i < $pathLen - 1; $i++) {
	    	$paths[$i] = strtolower($paths[$i]);
	    }

	    $paths[$pathLen - 1][0] = strtolower($paths[$pathLen - 1])[0];
	    $fileName = implode('/', $paths);

	    require_once $_SERVER["DOCUMENT_ROOT"] . '/' . $fileName;
	}
	
	spl_autoload_register('autoload');

	/*$array_paths = [
		"config",
		"controllers",
		"models",
		"views"
	];

	spl_autoload_register(function($class) {
	    $parts = explode('\\', $class);
	    $fileName = 'class_'.strtolower($class_name).'.php';
	    $path = end($parts) . '.php';
	    echo $path;

		for ($i = 0; $i < $total_paths; $i++) {

	        if ( file_exists($_SERVER["DOCUMENT_ROOT"] . '/' .$array_paths[$i].$file_name) ) {
	            include_once AP_SITE.$array_paths[$i].$file_name;
	        } 

	    }

	    require $_SERVER["DOCUMENT_ROOT"] . '/' . $path;
	});*/
	/*


	/*spl_autoload_register( function ($className) {
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    echo $fileName;
    echo '<br>';
    echo $_SERVER["DOCUMENT_ROOT"] . '/' . $fileName;
    require $_SERVER["DOCUMENT_ROOT"] . '/' . $fileName;*
	});/

?>