<?php

namespace zachsprogramdotorg\controllerhelpers;

function yes_no_form_field_prep(string $field_name): string
{
	
	require_once CONTROLLERHELPERS . DIRSEP . 'standard_form_field_prep.php';
	
	$choice = standard_form_field_prep($field_name, 2, 3);
	
    if ($choice != "yes" && $choice != "no") {

        breakout(' You didn\'t enter a yes/no choice. ');

    }
	
	return $choice;
}
