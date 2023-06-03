<?php

//echo "Hello world";

define('ROOT_PATH', __DIR__);


require_once(ROOT_PATH.'/controllers/homeController.php');
require_once(ROOT_PATH.'/controllers/categoryController.php');
require_once(ROOT_PATH.'/controllers/productController.php');
require_once(ROOT_PATH.'/controllers/userController.php');
require_once(ROOT_PATH.'/controllers/orderController.php');
require_once(ROOT_PATH.'/controllers/testController.php');

$uri = $_SERVER['REQUEST_URI'];

switch($uri)
{
    case '/':
        $home = new HomeController();
        $home->index();
        break;
    case '/cart':
        $home = new HomeController();
        $home->cart_get();
        break;
    case '/view-products':
        $home = new HomeController();
        $home->products_get();
        break;
    case '/admin':
        $home = new HomeController();
        $home->admin();
        break;

    case '/products':
        $product = new ProductController();
        $product->index();
        break;
    case '/api-products':
        $product = new ProductController();
        $product->viewAll_get();
        break;
        
    case '/product':
        $product = new ProductController();
        $product->viewAll_get();
        break;
    case '/product-create':
        $product = new ProductController();
        $product->create();
        break;

    case '/categories':
        $category = new CategoryController();
        $category->index();
        break;

    case '/category-create':
        $category = new CategoryController();
        $category->create();
        break;
    case '/api-categories':
        $category = new CategoryController();
        $category->viewAll_get();
        break;

    case '/test':
        $test = new TestController();
        $test->index();
        break;

    case '/orders':
        $order = new OrderController();
        $order->index();
        break;
    case '/users':
        $user = new UserController();
        $user->index();
        break;
    case '/login':
        echo "Logged In";
        break;
    case '/logout':
        echo "Logged Out";
        break;
    case '/shop':
        echo "shopping";
        break;
    default:
        echo "404 ERROR";
        break;
    
}