<?php

namespace zachsprogramdotorg\controllerhelpers;

/**
 * @param string $field_name
 * @return string
 */
function timezone_form_field_prep(string $field_name): string
{
    /**
     * Side effect: changes default timezone for the script.
     */

    require_once CONTROLLERHELPERS . DIRSEP . 'standard_form_field_prep.php';

    $timezone = standard_form_field_prep($field_name, 2, 60);

    if (!date_default_timezone_set($timezone)) {

        breakout(' Invalid PHP time zone submitted 👎🏽 ');

    }

    return $timezone;
}