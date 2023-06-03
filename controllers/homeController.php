<?php

require_once(ROOT_PATH.'/core/controller.php');
require_once(ROOT_PATH.'/models/productModel.php');
require_once(ROOT_PATH.'/models/categoryModel.php');

class HomeController extends Controller
{
    function __construct() 
    {
        $this->model = new ProductModel();
        $this->category_model = new CategoryModel();
    }

    public function index()
    {
        $data = $this->category_model->all();
        $this->load_view('home/homepage',$data);
    }

    public function cart_get()
    {
        $data = $this->model->all();
        $this->load_view('home/cart',$data);
    }

    public function products_get($category_id)
    {
        $data = ProductModel::where('category_id','=',$category_id)->get();
        $this->load_view('home/products', $data);
    }
    public function admin()
    {
        $data = $this->model->all();
        $this->load_view('admin',$data);
    }

}