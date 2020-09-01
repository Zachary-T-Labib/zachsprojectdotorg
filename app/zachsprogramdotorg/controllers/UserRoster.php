<?php

namespace zachsprogramdotorg\controllers;

use zachsprogramdotorg\models\User;

class UserRoster
{
	function page()
	{
		global $sessionMessage;
			
		$db = get_db();
		
		$sql = 'SELECT * FROM `users`';
		$array = User::find_by_sql($db, $sessionMessage, $sql);
		
		require VIEWS . DIRSEP . "userroster.php";
	}
}
