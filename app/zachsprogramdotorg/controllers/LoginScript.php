<?php

namespace GoodToKnow\Controllers;

use GoodToKnow\Models\User;
use mysqli;

use function GoodToKnow\ControllerHelpers\standard_form_field_prep;

class LoginScript 
{
	function page()
	{
        global $is_logged_in;
        global $sessionMessage;
		
        $db = db_connect($sessionMessage);

        $submitted_username = '';
        $submitted_password = '';
		
		
	}
}