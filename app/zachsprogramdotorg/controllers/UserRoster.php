<?php

namespace zachsprogramdotorg\controllers;

use zachsprogramdotorg\models\User;

class UserRoster
{
	function page()
	{
		global $g;
		
		kick_out_nonadmins();
			
	    get_db();
		
		$g->db = get_db();
		
		$sql = 'SELECT * FROM `users`';
		$g->array = User::find_by_sql($sql);
		
		require VIEWS . DIRSEP . "userroster.php";
	}
}
