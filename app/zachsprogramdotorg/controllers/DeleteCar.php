<?php

namespace zachsprogramdotorg\controllers;

use zachsprogramdotorg\models\CarsObject;

class DeleteCar
{
	function page()
	{
		global $g;
		
		get_db();
		
		$g->message = "Hello";
		
		$g->db = get_db();
		
		$sql = 'SELECT * FROM `carsobject`';
		$array = CarsObject::find_by_sql($sql);
		
		
		require VIEWS . DIRSEP . 'deletecar.php';
		
		
	}
}
