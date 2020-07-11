<?php

function redirect_to(string $location)
{
	if ($location != NULL) {

		header("Location: {$location}");
		exit;
	}
}


?>
