<?php

namespace zachsprogramdotorg\controllers;

class InfiniteLoopPrevent
{
	function page()
	{
		global $sessionMessage;
		
		require VIEWS . DIRSEP . 'infiniteloopprevent.php';
	}
}
