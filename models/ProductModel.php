<?php

class ProductModel extends DB{
	
	/**
	* Listar todos los productos
	*/
	function list(){
		$query = $this->db->query('SELECT * FROM product');
		return $query->num_rows > 0 ? $query : false;
	}
	
	//----------------------------------------------------------------------
	
	/**
	* Obtener la información de un producto específico
	* @param {int} product_id ID del produto a buscar
	*/
	function get($product_id){
		$query = $this->db->query("SELECT * FROM product WHERE product_id = $product_id");
		return $query->num_rows > 0 ? $query->fetch_assoc() : false;
	}
		
}

?>