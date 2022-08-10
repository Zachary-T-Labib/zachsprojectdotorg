<?php

namespace zachsprogramdotorg\controllers;

class AdminTools
{
	function page()
	{
		global $g;
		
        if (!$g->is_logged_in OR !$g->is_admin) {
            kick();
        }
		
		$show_poof = true;
		
		$g->message .= " Welcome to your Tools. ";
		
		require VIEWS . DIRSEP . 'adminpanel.php';
	}
}
