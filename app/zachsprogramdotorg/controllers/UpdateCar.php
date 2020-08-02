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
		
		global $sessionMessage;
		$sessionMessage = "Hello";
		
		$db = get_db();
		
		$sql = "SELECT * FROM 'carsobject'";
		
		$array = CarsObject::find_by_sql($db, $sessionMessage, $sql);
		
        require VIEWS . DIRSEP . 'featureatask.php';
		
	}
}
