<?php

class CartController extends Controller{

    private $userdata;
	
	function __construct(){
		$this->model('CartModel');
        $this->helper('jwtHelper');
        $this->helper('Validator');

        $this->userdata = $this->jwtHelper->verify(array('all'));
	}
	
	//----------------------------------------------------------------------
	
	/**
	* Listar carrito
	*/
	function list(){

		$data = $this->CartModel->list($this->userdata['user_id']);
		
		if($data){
			$response = array(
				'codeStatus'=>200,
				'message'=>"Datos Obtenidos",
				'data'=>$data
			);
		}else{
			$response = array(
				'codeStatus'=>401,
				'message'=>"No tienes productos agregados al carrito"
			);
		}
		
		echo json_encode($response);
	}

    //----------------------------------------------------------------------

    /**
    * Agregar producto al carrito
    */
    function add(){
        global $params;

        $this->Validator->validate(array(
            'product_id'=>'required'
        ));

        $userdata = $this->jwtHelper->verify(array('all'));
        $query = $this->CartModel->add($userdata['user_id'],$params['product_id']);

        if($query){
            $response = array(
                'codeStatus'=>200,
                'message'=>'Registro agregado correctamente'
            );
        }else{
            $response = array(
                'codeStatus'=>404,
                'message'=>'No se pudo agregar el producto al carrito'
            );
        }

        echo json_encode($response);
    }
}

?>