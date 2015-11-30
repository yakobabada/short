<?php

function callHook() {
    $url = $_GET['url'];

    //Matching url param from route list
    $routes = getRoute();
    $controllerMatch = '';
    $actionMatch = '';
    foreach ($routes as $route) {
        $routeUrl = $route['url'];
        if (preg_match("/^$routeUrl$/", $url, $match)) {
            $controllerMatch = $route['controller'];
            $actionMatch = $route['action'];
            if (isset($match[1])) {
                setGetParams($match, $route['params']);
            }
            break;
        }
    }

    //Create actual action and dispatcher names to be called
    $urlArray   = explode("/", $url);
    $controller = $controllerMatch;
    $action     = $actionMatch;
    $action    .= 'Action';

    $controller  = ucwords($controller);
    $controller .= 'Controller';
    $dispatch = new $controller();

    if (method_exists($dispatch, $action)) {
        echo call_user_func_array(array($dispatch, $action), array());
    } else {
        //404
        return new View('page/404.php', array());
    }

}

function callConstants() {
    require_once('config/database.php');
    require_once('config/default.php');
}

function setGetParams($match, $params) {
    $parmNo = 1;
    foreach ($params as $param) {
        if (isset($match[$parmNo])) {
            $_GET[$param] = $match[$parmNo];
            $parmNo++;
        } else {
            break;
        }        
    }
}

function __autoload($className) {

    if (file_exists('controller/' . strtolower($className) . '.php')) {
        require_once('controller/' . strtolower($className) . '.php');
    } elseif (file_exists('system/core/' . strtolower($className) . '.php')) {
        require_once('system/core/' . strtolower($className) . '.php');
    } elseif (file_exists('model/' . strtolower($className) . '.php')) {
        require_once('model/' . strtolower($className) . '.php');
    } elseif (file_exists('service/' . strtolower($className) . '.php')) {
        require_once('service/' . strtolower($className) . '.php');
    } elseif(file_exists('library/' . strtolower($className) . '.php')) {
        require_once('library/' . strtolower($className) . '.php');
    } else {
        //Error not implemented
        return new View('page/505.php', array());
    }
}

function getRoute() {
    return require_once('config/router.php');
}

callConstants();
callHook();