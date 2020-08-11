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
		
        self::init($db, $sessionMessage, $is_logged_in);

        self::assimilate_input($sessionMessage, $submitted_username, $submitted_password);

        $user = User::authenticate($db, $sessionMessage, $submitted_username, $submitted_password);

        self::login_the_user($sessionMessage, $user);

        self::store_application_state($db, $sessionMessage, $user);
		
        breakout(' It is advisable to logout at least once a week so that your session will Not expire in the middle of
         doing something. ');
    }
		
    /**
     * @param mysqli $db
     * @param string $error
     * @param object $user
     */
    private static function store_application_state(mysqli $db, string &$error, object $user)
    {
        /**
         * Put user's data in session.
         */
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_username'] = $user->username;
        $_SESSION['role'] = $user->role;
        $_SESSION['is_suspended'] = $user->is_suspended;
        $_SESSION['timezone'] = $user->timezone;
		
    }
	
    /**
     * @param string $error
     * @param $user
     */
    private static function login_the_user(string $error, $user)
    {
        if ($user === false) {
            $error .= " Authentication failed! ";
            $_SESSION['message'] = $error;
            reset_feature_session_vars();
            redirect_to("/zl/LoginForm/page");
        }

        /**
         * So we have a User object.
         */

        /**
         * If this user is suspended don't let them in.
         */
        if ($user->is_suspended) {
            $error .= " No active account exists for this username. ";
            $_SESSION['message'] = $error;
            reset_feature_session_vars();
            redirect_to("/ax1/LoginForm/page");
        }

        /**
         * This counts as a suspension check therefore:
         */
        $_SESSION['when_last_checked_suspend'] = time();
    }
	
    /**
     * @param string $error
     * @param string $submitted_username
     * @param string $submitted_password
     */
    private static function assimilate_input(string $error, string &$submitted_username, string &$submitted_password)
    {
        require_once CONTROLLERHELPERS . DIRSEP . 'standard_form_field_prep.php';

        $submitted_username = standard_form_field_prep('username', 7, 12);

        $submitted_password = standard_form_field_prep('password', 10, 264);


        require_once CONTROLLERHELPERS . DIRSEP . 'is_username_syntactically.php';
        require_once CONTROLLERHELPERS . DIRSEP . 'is_password_syntactically.php';

        if (!is_username_syntactically($error, $submitted_username) ||
            !is_password_syntactically($error, $submitted_password)) {
            $_SESSION['message'] = $error;
            reset_feature_session_vars();
            redirect_to("/zl/LoginForm/page");
        }
    }
	
    /**
     * @param $db
     * @param $error
     * @param $is_logged_in
     */
    private static function init($db, $error, $is_logged_in)
    {
        if ($is_logged_in) {
            $error .= " I don't know exactly why you ended up on this page but what I do know is that
             you submitted your username and password to log in although the session already considers you logged in. ";
            $_SESSION['message'] = $error;
            reset_feature_session_vars();
            redirect_to("/zl/InfiniteLoopPrevent/page");
        }

        // For denial of service attacks
        sleep(1);

        if (!empty($error) || $db === false) {
            $error .= ' Database connection failed. ';
            $_SESSION['message'] = $error;
            reset_feature_session_vars();
            redirect_to("/zl/LoginForm/page");
        }
    }
}