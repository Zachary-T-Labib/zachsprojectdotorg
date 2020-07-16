<?php
// INIT
require __DIR__ . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "2a-config.php";
require PATH_LIB . "2b-lib-address.php";
$abLib = new Address();
$pass = true;
$message = "";
$data = null;

// HANDLE AJAX REQUEST
if (isset($_POST['req'])) { switch ($_POST['req']) {
  default:
    $pass = false;
    $message = "Invalid Request";
    break;

  case "create":
    $pass = $abLib->create($_POST['task']);
    $message = $pass ? "Task Entry Created" : $abLib->error;
    break;

  case "read":
    $pass = true;
    $data = $abLib->read();
    break;

  case "update":
    $pass = $abLib->update($_POST['task'], $_POST['id']);
    $message = $pass ? "Task Entry Updated" : $abLib->error;
    break;

  case "delete":
    $pass = $abLib->delete($_POST['id']);
    $message = $pass ? "Task Entry Deleted" : $abLib->error;
    break;
}}

// SERVER RESPONSE
echo json_encode([
  "status" => $pass,
  "message" => $message,
  "data" => $data
]);
?>