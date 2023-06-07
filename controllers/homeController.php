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
            if(isset($_POST['username'])&&isset($_POST['password']))
            {
                $user=UserModel::where('email','=',$_POST['username'])
                ->where('password','=',encryptData($_POST['password'],APP_KEY,INIT_VECTOR))
                ->first();
                if($user)
                {
                    $_SESSION['username']=$user->name.' '.$user->surname;
                    if($user->user_type_id==1)
                    {
                        $_SESSION['user_type']='normal';
                    }
                    else
                    {
                        $_SESSION['user_type']='admin';
                        $_SESSION['admin_name']=$user->name.' '.$user->surname;
                    }
                    header('Location: /');
                }
                else
                {
                    header('Location: /login');
                    exit;
                }
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
        $data = UserModel::all();
        if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['Submit']))
        {
            $user=array(
                'name'=>$_POST['name'],
                'surname'=>$_POST['surname'],
                'email'=>$_POST['email'],
                'password'=>encryptData($_POST['password'],APP_KEY,INIT_VECTOR),
                'cell'=>$_POST['cell'],
                'address'=>$_POST['address'],
            );
            $insert=UserModel::create($user);
            if(!$insert)
            {
                header('Location: /login');
                exit;  
            }
            else
            {
                header('Location: /login');
                exit; 
            } 
        }
        
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
    

}