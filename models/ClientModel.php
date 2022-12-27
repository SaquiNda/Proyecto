<?php

class ClientModel extends DB{
	
	/*
	* Obtener información del perfil del usuario logueado
	*/
	function get($user_id){
		$query = $this->db->query('SELECT * FROM user WHERE user_id = ' . $user_id);
		return $query->num_rows > 0 ? $query->fetch_assoc() : false;
	}
}

?>