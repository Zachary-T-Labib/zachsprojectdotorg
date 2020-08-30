<?php

namespace zachsprogramdotorg\controlllers;

use zachsprogramdotorg\models\Users;

class Cars
{
	function page()
	{
		global $sessionMessage
			
		$db = get_db();
		
		$sql = 'SELECT * FROM `users`';
		$array = Users::find_by_sql($db, $sessionMessage, $sql);
		
		require VIEWS . DIRSEP . "userroster.php";
	}
}
