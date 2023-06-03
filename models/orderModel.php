<?php 

require_once(ROOT_PATH.'/core/model.php');

class OrderModel extends Model{

	function __construct(){
		parent::__construct();
	}

	function get_all(){
		return $this->read('orders',array('*'),null);
	}

	function get($id){
		return $this->read('orders', array('*'), array('id'=>$id));
	}
}
 ?>