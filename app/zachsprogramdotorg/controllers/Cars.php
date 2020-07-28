<?php

namespace zachsprogramdotorg\controllers;

use zachsprogramdotorg\models\CarsObject;

class Cars
{
	function page()
    {
		
		$user_id = "";
		
		$db = get_db();
		
		$sql = 'SELECT * FROM `carsobject` = ' . $db->real_escape_string($user_id);
		$array = CarsObject::find_by_sql($db, $sessionMessage, $sql);
		
		if (!$array || !empty($sessionMessage)) {
		            breakout(' I could NOT find any tasks. ');
		        }
		
		require VIEWS . DIRSEP . 'car_table.php';
	}
}

?>
