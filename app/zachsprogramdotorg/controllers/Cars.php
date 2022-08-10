<?php

namespace zachsprogramdotorg\controllers;

use zachsprogramdotorg\models\CarsObject;

class Cars
{
	function page()
    {	
		global $g;
		
		get_db();
		
		$sql = 'SELECT * FROM `carsobject`';
		$g->array = CarsObject::find_by_sql($sql);
		
		
		require VIEWS . DIRSEP . 'car_table.php';
	}
}

?>
