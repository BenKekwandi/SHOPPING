<?php

require_once 'vendor/autoload.php';
define('BASE_URL', 'http://127.0.0.1:8000');

define('ROOT_PATH', __DIR__);

session_start();

$controllers = [
    '/' => 'HomeController@index',
    '/cart' => 'HomeController@cart_get',
    '/all-products' => 'HomeController@all_products_get',
    '/category-products' => 'HomeController@category_products_get',
    '/admin' => 'HomeController@admin',
    '/products' => 'ProductController@index',
    '/api-products' => 'ProductController@viewAll_get',
    '/product' => 'ProductController@viewAll_get',
    '/product-create' => 'ProductController@create',
    '/categories' => 'CategoryController@index',
    '/category-create' => 'CategoryController@create',
    '/api-categories' => 'CategoryController@viewAll_get',
    '/test' => 'TestController@index',
    '/buy'=>'OrderController@order_post',
    '/orders' => 'OrderController@index',
    '/users' => 'UserController@index',
    '/login' => 'HomeController@login',
    '/logout' => 'HomeController@logout',
    '/register' => 'HomeController@register',
    '/shop' => 'ShopController@index'
];

function isLoggedIn()
{
    return isset($_SESSION['username']);
}

$uri = $_SERVER['REQUEST_URI'];
$segments = explode('/', trim($uri, '/'));

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
    if(!isLoggedIn()) 
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

if (isset($controllers[$uri])) {
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

echo "404 ERROR";
