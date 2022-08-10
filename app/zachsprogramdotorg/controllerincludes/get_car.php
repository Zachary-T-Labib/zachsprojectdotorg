<?php

use zachsprogramdotorg\models\CarsObject;
use function zachsprogramdotorg\controllerhelpers\integer_form_field_prep;

global $g;

$g->message = "Hello";

reset_feature_session_vars();

require_once CONTROLLERHELPERS . DIRSEP . 'integer_form_field_prep.php';

$chosen_id = integer_form_field_prep('choice', 1, PHP_INT_MAX);

var_dump($chosen_id);

$g->saved_int01 = $chosen_id;



$g->db = get_db();

$object = CarsObject::find_by_id($chosen_id);

if (!$object) {

    breakout(' Unexpectedly, I could not find that car. ');

}
