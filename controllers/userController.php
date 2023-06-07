<?php

require_once(ROOT_PATH.'/core/controller.php');
require_once(ROOT_PATH.'/models/userModel.php');

class UserController extends Controller
{
   
    function __construct() {
        $this->model = new UserModel();
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
        $data = UserModel::all();
        $this->load_view('user',$data);
    }

}