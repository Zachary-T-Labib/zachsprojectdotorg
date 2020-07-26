<?php

namespace zachsprogramdotorg\controllers;

use zachsprogramdotorg\models\CarsObject;

class cars
{
	function page()
    {
		
		require VIEWS . DIRSEP . 'car_table.php';
	}
}

?>
