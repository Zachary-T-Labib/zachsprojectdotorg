<?php

namespace zachsprogramdotorg\controllerhelpers;

/**
 * @param string $field_name
 * @param int $min_value
 * @param int $max_value
 * @return int
 */
function integer_form_field_prep(string $field_name, int $min_value, int $max_value): int
{
	
	if (!isset($_POST[$field_name])) {

	        breakout(" The value for {$field_name} is missing. ");

	    }
		
	$int_for_return = $_POST[$field_name];
	
	$int_for_return = trim($int_for_return);
	
    if (!is_numeric($int_for_return)) {

        breakout(" The value for {$field_name} is not numeric. ");

    }
	
	$int_for_return = (int)$int_for_return;
	
	if ($int_for_return < $min_value || $int_for_return > $max_value) {

	        breakout(" The value for {$field_name} is out of range. ");

	    }
		
	return $int_for_return;
}