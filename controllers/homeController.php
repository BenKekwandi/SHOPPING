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
    public function login()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if(isset($_POST['username'])&&isset($_POST['username']))
            {
                $_SESSION['username']=$_POST['username'];
                header('Location: /');
            }
            else
            {
                header('Location: /login');
                exit;
            }
             
        }
        $data = $this->category_model->all();
        $this->load_view('home/login',$data);
    }
    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: /login');
        exit;
    }

    public function register()
    {
        $data = $this->category_model->all();
        $this->load_view('home/register',$data);
    }


    public function cart_get()
    {
        $data = ProductModel::all();
        $this->load_view('home/cart',$data);
    }
    public function category_products_get($category_id)
    {
        $data = ProductModel::where('category_id','=',$category_id)->get();
        $this->load_view('home/productsByCategory', $data);
    }
    public function all_products_get()
    {
        $data = ProductModel::all();
        $this->load_view('home/products', $data);
    }
    public function admin()
    {
        $data = $this->model->all();
        $this->load_view('admin',$data);
    }

}