<?php 

require_once(ROOT_PATH.'/core/model.php');

class HomeModel extends Model{

	function __construct() {
		parent::__construct();
	}

	function get_all(){
		return $this->read('product',array('*'),null);
	}

	function get($id){
		return $this->read('product', array('*'), array('id'=>$id));
	}
}
 ?>