<?php

namespace zachsprogramdotorg\controllers;

use zachsprogramdotorg\models\CarsObject;

class Cars
{
	function page()
    {
		
		require VIEWS . DIRSEP . 'car_table.php';
	}
}
