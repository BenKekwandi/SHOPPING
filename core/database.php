<?php

class DB_Connection{

	function __construct(){
		require_once(ROOT_PATH.'/config.php');
		//$this->db_params = $db_params;
	}


	function getConnection(){
		$conn = new mysqli('localhost','root','','shop',3307);
		if($conn->connect_error){
			die("Connection Failed: ". $conn->connect_error);
		}
		return $conn;
	}

}