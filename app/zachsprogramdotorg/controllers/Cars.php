<?php

namespace zachsprogramdotorg\controllers;

use zachsprogramdotorg\models\CarsObject;

class Cars
{
	function page()
    {	
		global $g;
		
		$sql = 'SELECT * FROM `carsobject`';
		$array = CarsObject::find_by_sql($sql);
		
		
		require VIEWS . DIRSEP . 'car_table.php';
	}
}

?>
