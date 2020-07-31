<?php

namespace zachsprogramdotorg\controllers;

class DeleteCarProcessor
{
	function page()
	{
		
		require CONTROLLERINCLUDES . DIRSEP . 'get_car.php';
		
        require VIEWS . DIRSEP . 'deletecarprocessor.php';
		
	}
}
