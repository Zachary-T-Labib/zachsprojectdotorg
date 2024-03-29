<?php

namespace zachsprogramdotorg\controllerhelpers;


/**
 * @return string
 */
function password_for_regandchange_prep(): string
{
    /**
     * This function gets the submitted password when the user is either being registered or is
     * having his password changed.
     */

    require_once CONTROLLERHELPERS . DIRSEP . 'standard_form_field_prep.php';

    $submitted_first_try = standard_form_field_prep('first_try', 10, 264);

    $submitted_password = standard_form_field_prep('password', 10, 264);

    require_once CONTROLLERHELPERS . DIRSEP . 'is_password_asapair.php';

    if (!is_password_asapair($submitted_first_try, $submitted_password)) {

        breakout(' There is something invalid about the password pair which you entered. ');

    }

    return $submitted_password;
}