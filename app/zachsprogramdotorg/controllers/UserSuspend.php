<?php

namespace zachsprogramdotorg\controllers;

class UserSuspend
{
	function page()
	{
		global $sessionMessage;
		
		kick_out_nonadmins();
		
		get_db();
		
		require VIEWS . DIRSEP . 'usersuspend.php';
	}
}
