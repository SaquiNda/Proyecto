<?php

	require_once "vendor/autoload.php";

	class Controller{
		
		/**
		* Función para llamar a una vista dentro de la carpeta views
		* Establecer las variables que se manden como Arumentos a esta función
		*/
		function view($pg, $vars = false){
			extract((array)$this);
			if($vars) extract($vars);
			include(PATH.'/views/'.$pg.".php");
		}
		
		//----------------------------------------------------------------------
		
		/**
		*  Functión para llamar a un modelo dentro de la carpeta models
		*/
		function model($file = null){
			require(PATH.'/models/'.$file.".php");
			$this->$file = new $file();
		}
		
		//----------------------------------------------------------------------
		
		function helper($file){
			require(PATH.'/helpers/'.$file.".php");
			$this->$file = new $file();
		}
		
		
		//----------------------------------------------------------------------
		
		/**
		* Función para devolver un mensaje de tipo error con Header 404
		*/
		function HttpError($data){
			header("HTTP/1.0 404 Not Found");
			echo json_encode($data);
			die();
		}
		
		//----------------------------------------------------------------------
		
		/**
		* Verificar si el usuario tiene una sesión activa
		*/
		function isLoggin(){
			session_start();
			return $_SESSION['user_id'] ?? false;
		}
		
		//----------------------------------------------------------------------
		
		/**
		* Obtener todos los datos de sesión del usuario logueado
		*/
		function get_userdata(){
			session_start();
			return array(
				'username'=>$_SESSION['username'],
				'user_email'=>$_SESSION['user_email'],
				'user_role_id'=>$_SESSION['user_role_id'],
				'user_id'=>$_SESSION['user_id']
			);
		}
		
		//----------------------------------------------------------------------
		
		/**
		* Obtener id del usuario logueado
		*/
		function get_user_id(){
			session_start();
			return $_SESSION['user_id'];
		}
    }

?>