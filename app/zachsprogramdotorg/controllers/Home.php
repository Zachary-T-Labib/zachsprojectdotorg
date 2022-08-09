<?php

namespace zachsprogramdotorg\controllers;

use zachsprogramdotorg\models\User;

class Home
{
    function page()
    {
		
		self::redirect_if_not_logged_in();
		
		require '/zachsprogramdotorg/app/zachsprogramdotorg/views/display.html';
    }
	
    private static function redirect_if_not_logged_in()
       {
		   global $g;
		   
		   if (!$g->is_logged_in) {

		               $_SESSION['message'] = $g->message;
		               reset_feature_session_vars();
		               redirect_to("/zl/LoginForm/page");

		           }
	 }
}
