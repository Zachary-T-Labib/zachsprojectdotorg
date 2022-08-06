<?php

namespace zachsprogramdotorg\controllers;

class UserAdd
{
	function page()
	{
        global $sessionMessage;

        kick_out_nonadmins();
		
		get_db();
		
		require VIEWS . DIRSEP . 'useradd.php';
	}
}
