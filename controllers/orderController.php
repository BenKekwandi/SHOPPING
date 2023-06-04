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

    function order_post()
    {
        echo "Hey there\n";
        $requestBody = file_get_contents('php://input');
        $data = json_decode($requestBody, true);
        print_r($data);
    }

    public function index()
    {
        $data = $this->model->all();
        $this->load_view('order',$data);
    }

}