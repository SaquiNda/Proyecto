<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class jwtHelper extends Controller{
	
	function __construct(){
		$dotenv = Dotenv\Dotenv::createImmutable(PATH);
		$dotenv->load();
	}
	
	//----------------------------------------------------------------------
	
	/**
	* Generar un JWT token
	* @param {int} user_id ID del usuario
	* @param {string} role Rol del usuario
	*/
	function sign($user_id,$role){
		
		$time = time();
		
		$token = array(
			'iat'=>	$time,
			'exp'=> $time * (60*60*24),// Tiempo de expiración de 1 día
			'data'=>array(
				'user_id'=>$user_id,
				'role'=>$role
			)
		);
	
		
		return JWT::encode($token,$_ENV['JWTKEY'],'HS256');
	}
	
	//----------------------------------------------------------------------
	
	/**
	* Verificar el token y los usuarios que tienen permiso
	* @param {string} Token a validar
	* @param {array} roles_allowed Roles permitidos (Si obtiene "all", permite todos los roles)
	*/
	function verify($roles_allowed = array()){

        $token = $this->getAuthorizationHeader();
		
		if(!$token)
			$this->HttpError('No tienes permisos');
		
		try{
			
			$userdata = JWT::decode($token, new Key($_ENV['JWTKEY'], 'HS256'));
			
			if(in_array('all',$roles_allowed))
				return (array)$userdata->data;
				
				
			$role = $userdata->data->role;
			if(in_array($role,$roles_allowed)){
				return $userdata['data'];
			}else{
				$this->HttpError('No tienes permisos');
			}
			
			
		}catch(Exception $e){
			return false;
		}
	}

    //----------------------------------------------------------------------

    /**
     * Obtener Token del encabezado de la petición
     */
    function getAuthorizationHeader(){
        $headers = null;
        if (isset($_SERVER['Authorization'])) {
            $headers = trim($_SERVER["Authorization"]);
        }
        else if (isset($_SERVER['HTTP_AUTHORIZATION'])) { //Nginx or fast CGI
            $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
        } elseif (function_exists('apache_request_headers')) {
            $requestHeaders = apache_request_headers();
            // Server-side fix for bug in old Android versions (a nice side-effect of this fix means we don't care about capitalization for Authorization)
            $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
            //print_r($requestHeaders);
            if (isset($requestHeaders['Authorization'])) {
                $headers = trim($requestHeaders['Authorization']);
            }
        }
        return str_replace('Bearer ','',$headers);
    }
}

?>