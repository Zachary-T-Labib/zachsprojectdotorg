<?php

namespace zachsprogramdotorg\controllers;

use zachsprogramdotorg\models\CarsObject;

class Cars
{
	function page()
    {
		global $sessionMessage;
		
		$db = get_db();
		
		$sql = 'SELECT * FROM `carsobject`';
		$array = CarsObject::find_by_sql($db, $sessionMessage, $sql);
		
		
		require VIEWS . DIRSEP . 'car_table.php';
	}
}

?>
