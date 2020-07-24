<?php

namespace zachsprogramdotorg\controllers;

class Cars
{
	function page()
	{
		use zachsprogramdotorg\models\Cars;
		
		require VIEWS . DIRSEP . 'car_table.php';
	}
}
