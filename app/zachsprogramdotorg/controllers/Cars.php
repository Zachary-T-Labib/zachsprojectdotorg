<?php

namespace zachsprogramdotorg\controllers;

use zachsprogramdotorg\models\Cars

class Cars
{
	function page()
    {
		
		require VIEWS . DIRSEP . 'car_table.php';
	}
}
