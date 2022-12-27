<?php

	// Definición de variables Globales
	DEFINE('PATH',dirname(__FILE__));
	DEFINE('URI_PATH',$_SERVER['REQUEST_URI']);
	DEFINE('BASE_URL',"http://35.225.56.11/");

	// Establecer true para visualizar los errores
	if(true) {
	    ini_set('display_errors', 1);
	    ini_set('display_startup_errors', 1);
	    error_reporting(E_ALL);
	}

	// Llamar al archivo de enrutamiento
	require_once('router.php');

?>