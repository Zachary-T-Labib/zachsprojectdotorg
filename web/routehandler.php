<?php

require(__DIR__ . '/../config.php');

define('DIRSEP', DIRECTORY_SEPARATOR);
define('WEB_DIR', PROJ_ROOT . DIRSEP . 'web');
define('VENDOR_DIR', PROJ_ROOT . DIRSEP . 'vendor');

define('VIEWS', PROJ_ROOT . DIRSEP . 'app' . DIRSEP . 'zachsprogramdotorg' . DIRSEP . 'views');
define('VIEWSINCLUDES', PROJ_ROOT . DIRSEP . 'app' . DIRSEP . 'zachsprogramdotorg' . DIRSEP . 'viewsincludes');
define('CONTROLLERHELPERS', PROJ_ROOT . DIRSEP . 'app' . DIRSEP . 'zachsprogramdotorg' . DIRSEP . 'controllerhelpers');
define('CONTROLLERINCLUDES', PROJ_ROOT . DIRSEP . 'app' . DIRSEP . 'zachsprogramdotorg' . DIRSEP . 'controllerincludes');

define('SESSIONMESSAGE', VIEWSINCLUDES . DIRSEP . 'sessionmessage.php');
define('FOOTERBAR', VIEWSINCLUDES . DIRSEP . 'footerbar.php');
define('TOPPER', VIEWSINCLUDES . DIRSEP . 'topper.php');
define('SUBMITEXIT', VIEWSINCLUDES . DIRSEP . 'submitexit.php');

$path3 = VENDOR_DIR . DIRSEP . 'autoload.php';
$path4 = WEB_DIR . DIRSEP . 'functions.php';
require $path3;
require $path4;

session_start();

$sessionMessage = (isset($_SESSION['message'])) ? $_SESSION['message'] : '';
$_SESSION['message'] = '';

$user_id = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 0;

$user_username = (isset($_SESSION['user_username'])) ? $_SESSION['user_username'] : '';

$role = (isset($_SESSION['role'])) ? $_SESSION['role'] : '';

$timezone = (isset($_SESSION['timezone'])) ? $_SESSION['timezone'] : 'America/New_York';

$when_last_checked_suspend = (isset($_SESSION['when_last_checked_suspend'])) ? $_SESSION['when_last_checked_suspend'] : 1554825315;

$saved_str01 = (isset($_SESSION['saved_str01'])) ? $_SESSION['saved_str01'] : '';

$saved_str02 = (isset($_SESSION['saved_str02'])) ? $_SESSION['saved_str02'] : '';

$saved_int01 = (isset($_SESSION['saved_int01'])) ? $_SESSION['saved_int01'] : 0;

$saved_int02 = (isset($_SESSION['saved_int02'])) ? $_SESSION['saved_int02'] : 0;

$is_logged_in = (!empty($user_id)) ? true : false;

$is_admin = ($role === 'admin') ? true : false;


$route_segments_array = [];

if (!empty($_SERVER['PATH_INFO'])) {
    $route = rtrim($_SERVER['PATH_INFO'], '/ ');
    $route = ltrim($route, '/');
    $route = filter_var($route, FILTER_SANITIZE_URL);
    $route_segments_array = explode('/', $route);
}

$controller_name = 'Home';    // Default controller

if (!empty($route_segments_array[0])) {
    $route_segments_array[0] = convert_snake_case_to_pascal_case($route_segments_array[0]);
    $file_path_to_controller = PROJ_ROOT . DIRSEP . 'app' . DIRSEP . 'zachsprogramdotorg' . DIRSEP . 'controllers' . DIRSEP .
        "{$route_segments_array[0]}.php";
    if (file_exists($file_path_to_controller)) {
        $controller_name = $route_segments_array[0];
        unset($route_segments_array[0]);
    }
}

$fully_qualified_controller_name = 'zachsprogramdotorg\controllers\\' . $controller_name;

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
