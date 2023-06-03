<?php

require_once(ROOT_PATH.'/core/controller.php');
require_once(ROOT_PATH.'/models/orderModel.php');

class  OrderController extends Controller
{
   

    function __construct() {
        $this->model = new OrderModel();
    }


    function viewAll_get() {
        $result = $this->model->all();
        echo json_encode($result);
    }

    function getById_get($id) {
        $result = $this->model->find($id);
        echo json_encode($result);
    }


    public function index()
    {
        $data = $this->model->all();
        $this->load_view('order',$data);
    }

}