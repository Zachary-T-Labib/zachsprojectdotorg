<?php

namespace zachsprogramdotorg\controllers;

use zachsprogramdotorg\models\CarsObject;

class UpdateCar
{
	function page()
	{
		
        /**
         * Present the Task(s/plural) as radio buttons.
         */
		
		global $g;
		
		get_db();
		
		$g->db = get_db();
		
		$sql = 'SELECT * FROM `carsobject`';
		
		$g->array = CarsObject::find_by_sql($sql);
		
        require VIEWS . DIRSEP . 'updatecar.php';
		
	}
}
