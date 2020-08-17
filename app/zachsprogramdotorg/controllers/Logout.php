<?php

namespace zachsprogramdotorg\controllers;

class Logout
{
	function page()
	{
		
        /**
         * The purpose is to destroy the session file
         * then redirect to the login page.
         */

        $_SESSION = [];
        session_destroy();
        redirect_to("/zl/LoginForm/page");
		
		
	}
}
