<?php

$routes = array(
    '/' => array('controller' => 'HomeController', 'method' => 'index', 'middleware' => ''),
    '/home' => array('controller' => 'HomeController', 'method' => 'index', 'middleware' => ''),
    '/products' => array('controller' => 'ProductController', 'method' => 'index', 'middleware' => 'AuthMiddleware'),
    '/product-create' => array('controller' => 'ProductController', 'method' => 'create', 'middleware' => 'AuthMiddleware'),
);


$uri = $_SERVER['REQUEST_URI'];
$matchedRoute = null;

foreach ($routes as $route => $handler) {
    if ($route === $uri) {
        $matchedRoute = $handler;
        break;
    }
}

if ($matchedRoute) {
    $controllerName = $matchedRoute['controller'];
    $methodName = $matchedRoute['method'];
    $middlewareName = $matchedRoute['middleware'];

    if (!empty($middlewareName)) {
        require_once './middlewares/' . $middlewareName . '.php';
        $middleware = new $middlewareName();
        $middleware->handle($_REQUEST);
    }

    require_once './controllers/' . $controllerName . '.php';

    $controller = new $controllerName();
    $controller->$methodName();
} else {
    echo "404 ERROR";
}
