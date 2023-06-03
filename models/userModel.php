<?php 

require_once(ROOT_PATH.'/core/model.php');

class   UserModel extends Model{

	function __construct(){
		parent::__construct();
	}

	function get_all(){
		return $this->read('users',array('*'),null);
	}

	function get($id){
		return $this->read('users', array('*'), array('id'=>$id));
	}
}
 ?>