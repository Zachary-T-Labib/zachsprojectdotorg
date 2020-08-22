<?php

namespace zachsprogramdotorg\controllers;

use zachsprogramdotorg\models\CarsObject;

class DeleteCar
{
	function page()
	{
		global $sessionMessage;
		
		$sessionMessage = "Hello";
		
		$db = get_db();
		
		$sql = 'SELECT * FROM `carsobject`';
		$array = CarsObject::find_by_sql($db, $sessionMessage, $sql);
		
		
		require VIEWS . DIRSEP . 'deletecar.php';
		
		
	}
}
