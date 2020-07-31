<?php

use zachsprogramdotorg\models\CarsObject;
use funtion zachsprogramdotorg\controllerhelpers\integer_form_field_prep;

global $sessionMessage;

$sessionMessage = "Hello";

require_once CONTROLLERHELPERS . DIRSEP . 'integer_form_field_prep.php';

$chosen_id = integer_form_field_prep('choice', 1, PHP_INT_MAX);

$_SESSION['saved_int01'] = $chosen_id;



$db = get_db();

$object = CarObject::find_by_id($db, $sessionMessage, $chosen_id);

if (!$object) {

    breakout(' Unexpectedly, I could not find that task. ');

}
