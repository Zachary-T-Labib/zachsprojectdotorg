<?php

namespace zachsprogramdotorg\controllers;

class Home
{
    function page()
    {
        echo "It works!";
		
		require VIEWS . DIRSEP . 'todo.php';
    }
}