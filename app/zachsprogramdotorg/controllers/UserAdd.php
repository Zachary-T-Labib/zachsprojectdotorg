<?php

namespace zachsprogramdotorg\controllers;

class UserAdd
{
	function page()
	{
        global $sessionMessage;

        kick_out_nonadmins();
		
		
		
		require VIEWS . DIRSEP . 'adminpasscodegenformprocessor.php';
	}
}
