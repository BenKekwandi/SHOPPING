<?php

require_once (ROOT_PATH.'/middleware.php');

$controllers = [

    //Home Routes 

    '/' => 'HomeController@index',
    '/cart' => 'HomeController@cart_get',
    '/all-products' => 'HomeController@all_products_get',
    '/category-products' => 'HomeController@category_products_get',
    '/test' => 'TestController@index',
    '/buy'=>'OrderController@order_post',
    '/login' => 'HomeController@login',
    '/logout' => 'HomeController@logout',
    '/register' => 'HomeController@register',
    '/shop' => 'ShopController@index',

    //admin routes

    '/admin' => 'AdminController@admin',
    '/admin/products' => 'ProductController@index',
    '/admin/product' => 'ProductController@viewAll_get',
    '/admin/product-create' => 'ProductController@create',
    '/admin/categories' => 'CategoryController@index',
    '/admin/category-create' => 'CategoryController@create',
    '/admin/orders' => 'OrderController@index',
    '/admin/login' => 'HomeController@admin_login',
    '/admin/logout' => 'HomeController@admin_logout',
    '/admin/users' => 'UserController@index',

    //api
    '/admin/api-products' => 'ProductController@viewAll_get',
    '/admin/api-categories' => 'CategoryController@viewAll_get',
    '/admin/api-admin-users' => 'UserController@viewAll_get',
    '/admin/api-users' => 'UserController@viewAll_get',
    '/admin/api-orders' => 'OrderController@viewAll_get',
    '/admin/api-delivered-orders' => 'OrderController@viewAll_get',
    '/admin/api-not-delivered-orders' => 'OrderController@viewAll_get',

    //api post
    
];

$uri = $_SERVER['REQUEST_URI'];
$segments = explode('/', trim($uri, '/'));
$sections = explode('-',$segments[0]);

if($segments[0]=='cart')
{
    if (!isLoggedIn()) 
    {
        header('Location: /login');
        exit;
    }
}
if($segments[0]=='admin')
{
    if (!isAdminLoggedIn() || !isAdmin())
    {
        header('Location: /login');
        exit;
    }
}


if ($segments[0] === 'category-products') {
    $id = isset($segments[1]) ? $segments[1] : null;
    $routeWithId = '/category-products';

    if (isset($controllers[$routeWithId])) {
        [$controllerName, $methodName] = explode('@', $controllers[$routeWithId]);
        $controllerClassName = ucfirst($controllerName);
        $controllerName = lcfirst($controllerName);
        $controllerFilePath = ROOT_PATH . '/controllers/' . $controllerName . '.php';

        if (file_exists($controllerFilePath)) {
            require_once $controllerFilePath;
            $controller = new $controllerClassName();

            if (method_exists($controller, $methodName)) {
                $controller->$methodName($id);
                exit;
            }
        }
    }
}

if (isset($controllers[$uri])) 
{
    if($uri)
    [$controllerName, $methodName] = explode('@', $controllers[$uri]);
    $controllerClassName = ucfirst($controllerName);
    $controllerName = lcfirst($controllerName);
    $controllerFilePath = ROOT_PATH . '/controllers/' . $controllerName . '.php';

    if (file_exists($controllerFilePath)) {
        require_once $controllerFilePath;
        $controller = new $controllerClassName();

        if (method_exists($controller, $methodName)) {
            $controller->$methodName();
            exit;
        }
    }
}
