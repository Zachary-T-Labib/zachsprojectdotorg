<?php

namespace zachsprogramdotorg\controllers;

use function zachsprogramdotorg\controllerhelpers\username_for_specifying_which_prep;

class UserSuspendProccessor
{
	function page()
	{
		global $seessionMessage;
		
		kick_out_nonadmins();
		
        /**
         * Goal:
         *  1) Validate submitted username
         *  2) Save submitted username
         *  3) Redirect to a route
         */

        $db = get_db();
		
        require_once CONTROLLERHELPERS . DIRSEP . 'username_for_specifying_which_prep.php';

        $submitted_username = username_for_specifying_which_prep($db);
		
        $_SESSION['saved_str01'] = $submitted_username;

        redirect_to("/zl/SuspendAccountSuspend/page");
	}
}
