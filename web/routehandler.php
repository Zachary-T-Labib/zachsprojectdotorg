<?php

use zachsprogramdotorg\models\app_state;

require(__DIR__ . '/../config.php');

require('constant_definitions.php');

$path3 = VENDOR_DIR . DIRSEP . 'autoload.php';
$path4 = WEB_DIR . DIRSEP . 'functions.php';
require $path3;
require $path4;

session_start();

$g = new app_state();

date_default_timezone_set($g->timezone);

$route_segments_array = [];

if (!empty($_SERVER['PATH_INFO'])) {
    $route = rtrim($_SERVER['PATH_INFO'], '/ ');
    $route = ltrim($route, '/');
    $route = filter_var($route, FILTER_SANITIZE_URL);
    $route_segments_array = explode('/', $route);
}

$g->controller_name = 'Home';    // Default controller

if (!empty($route_segments_array[0])) {
    $route_segments_array[0] = convert_snake_case_to_pascal_case($route_segments_array[0]);
    $file_path_to_controller = PROJ_ROOT . DIRSEP . 'app' . DIRSEP . 'zachsprogramdotorg' . DIRSEP . 'controllers' . DIRSEP .
        "{$route_segments_array[0]}.php";
    if (file_exists($file_path_to_controller)) {
        $g->controller_name = $route_segments_array[0];
        unset($route_segments_array[0]);
    }
}

$fully_qualified_controller_name = 'zachsprogramdotorg\controllers\\' . $g->controller_name;

$controller_object = new $fully_qualified_controller_name;

$method_name = 'page';

if (!empty($route_segments_array[1])) {
    if (method_exists($controller_object, $route_segments_array[1])) {
        $method_name = $route_segments_array[1];
        unset($route_segments_array[1]);
    }
}

$parameters_array = [];

if (!empty($route_segments_array)) {
    $parameters_array = array_values($route_segments_array);
}

call_user_func_array([$controller_object, $method_name], $parameters_array);
