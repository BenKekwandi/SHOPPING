<?php 

require_once(ROOT_PATH.'/core/model.php');

class CategoryModel extends Model{

	function __construct(){
		parent::__construct();
	}

	function get_all()
	{
		return $this->read('category',array('*'),null);
	}

	function get($id)
	{
		return $this->read('category', array('*'), array('id'=>$id));
	}
}

?>

