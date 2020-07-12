<?php

function redirect_to(string $location)
{
	if ($location != NULL) {

		header("Location: {$location}");
		exit;
	}
}


function CamelCase($string, $capitalizeFirstCharacter = false) 
{

    $str = str_replace('-', '', ucwords($string, '-'));

    if (!$capitalizeFirstCharacter) {
        $str = lcfirst($str);
    }

    return $str;
}
	

?>
