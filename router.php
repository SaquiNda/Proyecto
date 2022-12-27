<?php

$route = array();

// Home
$route[''] = 'HomeController/inicio';
$route['iniciarSesion'] = 'SessionController/index';

// Session
$route['login'] = 'SessionController/index';
$route['session/validate'] = 'SessionController/validate';

// Productos
$route['productos'] = 'ProductController/index';
$route['productos/:id'] = 'ProductController/detail';

// Carrito
$route['carrito/listar'] = 'CartController/list';
$route['carrito/agregar'] = 'CartController/add';

// Perfil
$route['perfil'] = 'ClientController/profile';


//----------------------------------------------------------------------
//----------------------------------------------------------------------

// API
$route['api/perfil/obtener'] = 'ClientController/get';
$route['api/auth/login'] = 'SessionController/validate';

// Obtener parámetros
global $params;
$params = (array)json_decode(file_get_contents('php://input'));

$defined_route = URI_PATH;
$uri = substr($defined_route,1); // Remover primer slash

$method = $_SERVER['REQUEST_METHOD'];

// Verificar si la ruta tiene parámetros permitidos
function verify_uri_params($route,$uri){

    global $params;

    $record = "";
    foreach($route as $key=>$value){

        $uri_route = "";
        $a = explode('/',$key);
        $u = explode('/',$uri);

        for($x = 0; $x < count($a); $x++){

            if(strpos($a[$x],':') > -1){
                $params[str_replace(':','',$a[$x])] = $u[$x];
                $record = $value;
                continue;
            }

            if(!isset($u[$x]))
                continue;

            if($a[$x] != $u[$x]){
                continue;
            }

            $record = $value;
        }
    }

    return $record;
}

// Validar si la ruta está definida
$f = false;
if(!isset($route[$uri])){

    $u = verify_uri_params($route,$uri);

    if(!$u){
        header("HTTP/1.0 404 Not Found");
        echo json_encode("Ruta no existe");
        die();
    }else{
        $f = explode("/",$u);
    }
}

// Validar si el archivo existe
if(!$f)
    $f = explode("/",$route[$uri]);


if(!file_exists('controllers/'.$f[0].'.php')){
    echo json_encode("Archivo no existe");
    die();
}

require('Controller.php');
require('db.php');
include("controllers/".$f[0].'.php');
$f1 = $f[1]."";
(new $f[0])->$f1();

?>