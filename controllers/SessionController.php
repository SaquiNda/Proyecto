<?php


class SessionController extends Controller{
	
	function __construct(){
		$this->model('SessionModel');
		$this->helper('Validator');
		$this->helper('jwtHelper');
	}
	
	//----------------------------------------------------------------------
	
	/**
	* Redirijir al inicio de sesión, si el usuario ya tiene una sesión activa, lo redirije al home
	*/
	function index(){
		
		// Validar si ya tiene una sessión iniciada
		if($this->isLoggin())
			header('Location: /');
	
		$this->view('session/header');
		$this->view('session/login');
		$this->view('session/footer');
		
	}
	
	//----------------------------------------------------------------------
	
	/**
	* Función para validar un usuario
	* @param {string} email Correo del usuario
	* @param {string} password contraseña del usuario
	*/
	function validate(){
		global $params;
		$response = array();
		
		$this->Validator->validate(array(
			'email'=>'string|required',
			'password'=>'string|required'
		));
		
		$userdata = $this->SessionModel->validate($params);
		
		if(!$userdata){
			$this->HttpError(array(
				'codeStatus'=>404,
				'message'=>'Correo o Contraseña incorrecta'
			));
		}else{
			$response = array(
				'codeStatus'=>200,
				'message'=>"Has iniciado sesión correctamente",
				"data"=>$userdata,
				"token"=>$this->jwtHelper->sign($userdata['user_id'],$userdata['role_name'])
			);
		}
		
		echo json_encode($response);
	}
	
	//----------------------------------------------------------------------
	
	/**
	* Registrar un nuevo cliente
	*/
	function register(){
		global $params;
		
		/*$this->Validator->validate(array(
			'user_name'=>'string|required',
			'user_lastname'=>'string|required',
			'user_email'=>'string|required|email',
			'password'=>'string|required|email'
		));*/
		
		$this->SessionModel->register($params);
		
		
	}
}

?>