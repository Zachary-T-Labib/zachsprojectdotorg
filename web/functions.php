<?php

function redirect_to(string $location)
{
	if ($location != NULL) {

		header("Location: {$location}");
		exit;
	}
}


function convert_snake_case_to_pascal_case(string $string)
{
    return str_replace('_', '', ucwords($string, '_'));
}
