<?php

class SessionModel extends DB{
	
	/**
	* Validar Usuario y contraseña del usuario
	* @param {object} data Recibe parámetros email y password en un arreglo
	*/
	function validate($data){
		
		$password = md5($data['password']);
		
		$query = $this->db->query('SELECT 
			role_name,user_id,user_name,user_lastname,user_email,user_picture,user_role_id
			FROM user 
			JOIN role ON role.role_id = user.user_role_id
			WHERE user_email = "' .$data['email']. '" 
			AND user_password = "' .$password. '"
			AND user_status = 1'
		);
		
		if($query && $query->num_rows > 0)
			return $query->fetch_assoc();
		else
			return false;
		
	}
	
	//----------------------------------------------------------------------
	
	/**
	* Registrar un nuevo cliente
	* @param {string} user_name Nombre del cliente
	* @param {string} user_lastname Apellidos del cliente
	* @param {string} user_email Correo del cliente
	* @param {string} user_password Contraseña del cliente
	* @return {int} ID Del cliente registrado
	*/
	function register($data){
		$query = $this->db->query(
			'INSERT INTO user(user_name,user_lastname,user_email,user_password)
			 VALUES(
				"'.$data['user_name'].'",
				"'.$data['user_lastname'].'",
				"'.$data['user_email'].'",
				"'.md5($data['user_password']).'",
			);'
		);
		
		if($query->affected_rows > 0){
			return $query->insert_id;
		}else{
			return false;
		}
	}
}

?>