<?php

namespace zachsprogramdotorg\controllers;

class Home
{
    function page()
    {
        global $sessionMessage;
        global $is_logged_in;
		
		self::redirect_if_not_logged_in($sessionMessage, $is_logged_in);
		
		require '/zachsprogramdotorg/app/zachsprogramdotorg/views/display.html';
    }
	
    private static function redirect_if_not_logged_in($error, bool $is_logged_in)
       {
           if (!$is_logged_in) {
               $_SESSION['message'] = $error;
               reset_feature_session_vars();
               redirect_to("/zl/LoginForm/page");
           }
}
