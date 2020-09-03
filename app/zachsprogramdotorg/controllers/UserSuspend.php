<?php

namespace zachsprogramdotorg\controllers;

class UserSuspend
{
	function page()
	{
		global $sessionMessage;
		
		kick_out_nonadmins();
		
		require VIEWS . DIRSEP . 'usersuspend.php';
	}
}
