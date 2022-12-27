<?php

if (!class_exists('DB')) {
	class DB{
		private $servername = "localhost";
		private $username = "administrator";
		private $password = 'iJN&r^$04r652&OK';
		private $dbname = "incomex";
		public $db;
		public $query;

		public function __construct(){

			// Crear Conexión
			$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

			// Checar si la conexión fue exitosa
			if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
			}else{
				$this->db = $conn;
			}
		}

		public function query_data(){
			$data = array();
			while($row = $this->query->fetch_assoc())
				array_push($data,$row);

			return $data;
		}
	}
}

?>
