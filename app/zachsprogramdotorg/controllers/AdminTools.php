<?php

namespace zachsprogramdotorg\controllers;

class AdminTools
{
	function page()
	{
        global $is_logged_in;
        global $is_admin;
		global $sessionMessage;
		global $type_of_resource_requested;
		
        if (!$is_logged_in OR !$is_admin) {
            kick();
        }
		
		$show_poof = true;
		
		$sessionMessage .= " Welcome to your Tools. ";
		
		require VIEWS . DIRSEP . 'controlpanel.php';
	}
}
