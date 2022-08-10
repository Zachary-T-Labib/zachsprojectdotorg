<?php

$newMessage = "Hello";

function redirect_to(string $location)
{
	global $g;
	
    $_SESSION['message'] = $g->message;
	
	if ($location != NULL) {

		header("Location: {$location}");
		exit;
	}
}


function convert_snake_case_to_pascal_case(string $string)
{
    return str_replace('_', '', ucwords($string, '_'));
}

function reset_feature_session_vars()
{
    $_SESSION['saved_str01'] = '';
    $_SESSION['saved_str02'] = '';
    $_SESSION['saved_int01'] = 0;
    $_SESSION['saved_int01'] = 0;
}

function breakout(string $newMessage)
{
    global $g;

    $g->message = $newMessage;

    redirect_to("/zl/Home/page");

}

function kick()
{
     redirect_to("/zl/Home/page");
}

function kick_out_nonadmins()
{
    global $g;

    if (!$g->is_logged_in OR !$g->is_admin) {
        kick();
    }
}

function get_db()
{
    global $g;

    $g->message = "Hello";

    $g->db = db_connect();

    if ($g->db === false) {
        breakout(' I was unable to connect to the database. ');
    }

    return $g->db;
}

function db_connect()
{
		global $g;
		
    try {

        $g->db = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

        if ($g->db->connect_error) {

            $g->message .= ' ' . htmlspecialchars($g->db->connect_error, ENT_NOQUOTES | ENT_HTML5) . ' ';
            return false;

        }

        $g->db->set_charset('utf8mb4');

    } catch (\Exception $e) {

        $g->message .= ' ' . htmlspecialchars($e->getMessage(), ENT_NOQUOTES | ENT_HTML5) . ' ';
        return false;

    }

    return $g->db;
}
