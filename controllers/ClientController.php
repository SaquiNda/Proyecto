<?php

class ClientController extends Controller{
	
	function __construct(){
		$this->helper('jwtHelper');
		$this->model('ClientModel');
	}
	
	//----------------------------------------------------------------------
	
	/**
	* Mostrar vista de perfil
	*/
	function profile(){
		$this->view('client/templates/header');
		$this->view('client/profile/header');
		$this->view('client/profile/body');
		$this->view('client/templates/footer');
	}
	
	//----------------------------------------------------------------------
	
	/**
	* Obtener información del perfil del usuario logueado
	*/
	function get(){
		
		global $params;
		
		$userdata = $this->jwtHelper->verify(array('all'));
		
		$data = $this->ClientModel->get($userdata['user_id']);
		
		if(!$data)
			$this->HttpException('Usuario no encontrado');
		
		echo json_encode (array(
			'codeStatus'=>200,
			'message'=>'Datos obtenidos',
			'data'=>$data
		));
		
	}
}

?>