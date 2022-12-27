<?php

class HomeController extends Controller{
		
	function __construct(){
		$this->model('HomeModel');
	}
	
	//----------------------------------------------------------------------
	
	/**
	* Mostrar vista de inicio
	*/
	function inicio(){
		$data['title'] = 'Inicio';
		$this->view('client/templates/header',$data);
		$this->view('client/home/body');
	}
}

?>