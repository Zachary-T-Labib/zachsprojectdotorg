<?php

namespace zachsprogramdotorg\controllers;

class UserAdd
{
	function page()
	{
        global $g;

        kick_out_nonadmins();
		
		get_db();
		
		require VIEWS . DIRSEP . 'useradd.php';
	}
}
