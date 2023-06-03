<?php

require_once(ROOT_PATH.'/core/controller.php');
require_once(ROOT_PATH.'/models/productModel.php');

class HomeController extends Controller
{
    function __construct() {
        $this->model = new ProductModel();
    }

    public function index()
    {
        $data = $this->model->get_all();
        $this->load_view('home/homepage',$data);
    }

    public function cart_get()
    {
        $data = $this->model->get_all();
        $this->load_view('home/cart',$data);
    }

    public function products_get()
    {
        $data = $this->model->get_all();
        $this->load_view('home/products',$data);
    }
    public function admin()
    {
        $data = $this->model->get_all();
        $this->load_view('admin',$data);
    }

}