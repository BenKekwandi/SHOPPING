<?php

class DB_Connection{

	function __construct(){
		require_once(ROOT_PATH.'/config.php');
		$this->db_params = $db_params;
	}


	function getConnection(){
		$conn = new mysqli($this->db_params['servername'],$this->db_params['username'],$this->db_params['password'],$this->db_params['dbname'],3307);
		if($conn->connect_error){
			die("Connection Failed: ". $conn->connect_error);
		}
		return $conn;
	}

}