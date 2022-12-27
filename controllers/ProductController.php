<?php

class ProductController extends Controller{
		
	function __construct(){
		$this->model('ProductModel');
        $this->helper('jwtHelper');
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
     * Listar productos
     */
    function list(){
        global $params;
        $data = $this->ProductModel->list();

        if(!$data)
            $this->HttpError(array(
                'codeStatus'=>404,
                'message'=>'No se encontraron resultados'
            ));

        echo json_encode(array(
            'codeStatus'=>200,
            'message'=>'Datos obtenidos',
            'data'=>$data
        ));
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