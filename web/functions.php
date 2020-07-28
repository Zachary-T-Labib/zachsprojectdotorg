<?php

function redirect_to(string $location)
{
	if ($location != NULL) {

		header("Location: {$location}");
		exit;
	}
}


function convert_snake_case_to_pascal_case(string $string)
{
    return str_replace('_', '', ucwords($string, '_'));
}


function get_db()
{
    global $sessionMessage;

    $db = db_connect($sessionMessage);

    if (!empty($sessionMessage) || $db === false) {
        breakout(' I was unable to connect to the database. ');
    }

    return $db;
}

function db_connect(string &$error)
{
    try {

        $db = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

        if ($db->connect_error) {

            $error .= ' ' . htmlspecialchars($db->connect_error, ENT_NOQUOTES | ENT_HTML5) . ' ';
            return false;

        }

        $db->set_charset('utf8mb4');

    } catch (\Exception $e) {

        $error .= ' ' . htmlspecialchars($e->getMessage(), ENT_NOQUOTES | ENT_HTML5) . ' ';
        return false;

    }

    return $db;
}
