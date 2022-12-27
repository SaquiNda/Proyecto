<?php

class ProductController extends Controller{
		
	function __construct(){
		$this->model('ProductModel');
	}
	
	//----------------------------------------------------------------------
	
	/**
	* Mostrar vista de productos
	*/
	function index(){
		$data['data'] = $this->ProductModel->list();

		$this->view('client/templates/header');
		$this->view('client/product/body',$data);
		$this->view('client/templates/footer');
	}
	
	//----------------------------------------------------------------------
	
	/**
	* Entrar al detalle de un producto
	* @param {int} product_id Id del producto a obtener el detalle
	*/
	function detail(){
		global $params;
		
		$data['data'] = $this->ProductModel->get($params['id']);
		
		$this->view("client/templates/header");
		$this->view("client/product/detail",$data);
		$this->view("client/templates/footer");
	}
}

?>