<?php

namespace zachsprogramdotorg\controllerhelpers;

/**
 * @param string $field_name
 * @param int $min_length
 * @param int $max_length
 * @return string
 */
function standard_form_field_prep(string $field_name, int $min_length, int $max_length): string
{
	
	if (!isset($_POST[$field_name])) {

	        breakout(" The value for {$field_name} is missing. ");

	}
	
	$string_for_return = $_POST[$field_name];
	
	$string_for_return = trim($string_for_return);
	
	if (strlen($string_for_return) < $min_length) {

	        breakout(" The string value for {$field_name} is too short. ");

	}
	
	if (strlen($string_for_return) > $max_length) {

	        breakout(" The string value for {$field_name} is too long. ");

	}
	
	$string_for_return = htmlspecialchars($string_for_return, ENT_NOQUOTES | ENT_HTML5);
	
	return $string_for_return;
}
		
		
		
