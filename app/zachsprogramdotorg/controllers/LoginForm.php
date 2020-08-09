<?php

namespace zachsprogramdotorg\controllers;

class LoginForm
{
	function page()
	{
		global $is_logged_in;
		global $sessionMessage;

		if ($is_logged_in) {
		$_SESSION['message'] = $sessionMessage;
		reset_feature_session_vars();
		redirect_to("/ax1/InfiniteLoopPrevent/page");
		}
		
		require VIEWS . DIRSEP . 'loginform.php';
	}
}
