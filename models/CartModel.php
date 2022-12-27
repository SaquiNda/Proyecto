<?php

class CartModel extends DB{
	
	/**
	* Listar el carrito de un usuario
	* @param {int} user_id Id del usuario a listar sus productos
	*/
	function list($user_id){
		$this->query = $this->db->query('select * from cart inner join product on product.product_id = cart.cart_product_id where cart_user_id = ' . $user_id);
		return $this->query->num_rows > 0 ? $this->query_data() : false;
	}

    //----------------------------------------------------------------------

    /**
     * Agregar un producto al carrito de un cliente
     * @param {int} product_id ID del producto a agregar
     * @param {int} user_id ID del usuario
     */
    function add($user_id,$product_id){
        return $this->db->query('INSERT INTO cart(cart_user_id,cart_product_id) VALUES('.$user_id.','.$product_id.')');
    }
}

?>