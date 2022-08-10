<?php

namespace zachsprogramdotorg\controllers;

use zachsprogramdotorg\models\User;
use function zachsprogramdotorg\controllerhelpers\date_form_field_prep;
use function zachsprogramdotorg\controllerhelpers\password_for_regandchange_prep;
use function zachsprogramdotorg\controllerhelpers\standard_form_field_prep;
use function zachsprogramdotorg\controllerhelpers\timezone_form_field_prep;
use function zachsprogramdotorg\controllerhelpers\title_ofaperson_form_field_prep;
use function zachsprogramdotorg\controllerhelpers\username_for_specifying_which_prep;

class UserAddData
{
	function page()
	{
		
		global $g;
		// $g->saved_int01 choice
		
		kick_out_nonadmins();
		
		get_db();
		
		$g->db = get_db();
		
        /**
         * Variables to work with:
         *   $g->saved_int01, 'username', 'first_try', 'password',
         *   'title', 'comment', 'timezone', 'date', 'submit'
         */
		
		require_once CONTROLLERHELPERS . DIRSEP . 'standard_form_field_prep.php';
		require_once CONTROLLERHELPERS . DIRSEP . 'date_form_field_prep.php';
		require_once CONTROLLERHELPERS . DIRSEP . 'title_ofaperson_form_field_prep.php';
		require_once CONTROLLERHELPERS . DIRSEP . 'username_for_specifying_which_prep.php';
		require_once CONTROLLERHELPERS . DIRSEP . 'password_for_regandchange_prep.php';
		require_once CONTROLLERHELPERS . DIRSEP . 'timezone_form_field_prep.php';
		
		$submitted_username = username_for_specifying_which_prep();
		
		$submitted_password = password_for_regandchange_prep();
		
		$submitted_title = title_ofaperson_form_field_prep('title');
		
		$submitted_comment = standard_form_field_prep('comment', 0, 1800);
		
		$submitted_timezone = timezone_form_field_prep('timezone');
		
		$submitted_date = date_form_field_prep('date');
		
        /**
         * $new_user_role needs to have a value
         * since there is a role field in the users table
         */
		
		$new_user_role = '';
		$new_user_is_suspended = 0;
		
        /**
         * Store user.
         *
         * The password needs to be processed before save().
         */
		
		$hash_of_submitted_password = password_hash($submitted_password, PASSWORD_DEFAULT);
		
		// See steps in ZachObject for storing a new object.
		
		
		// First step:
		
        $array_of_submitted_data = ['username' => $submitted_username,
            'password' => $hash_of_submitted_password,
            'timezone' => $submitted_timezone,
            'title' => $submitted_title,
            'role' => $new_user_role,
            'is_suspended' => $new_user_is_suspended,
            'date' => $submitted_date,
            'comment' => $submitted_comment];
			
			var_dump($array_of_submitted_data);
			
		
		//Second step
		
		$new_user_object = user::array_to_object($array_of_submitted_data);
		
		
		//Third step
		
		$consequence_of_save = $new_user_object->save();
		
        if (!$consequence_of_save) {

            breakout(' The save method for user returned false. ');

        }
		
        if (!empty($g->message)) {

            breakout(' The save method for user did not return false but it did send back a message.
             Therefore, it probably did not create your account. ');

        }
		
		breakout(' The new user account has just been created 🎈 ');
	}
}
