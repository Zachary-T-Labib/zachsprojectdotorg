<?php

namespace zachsprogramdotorg\controllerhelpers;


/**
 * @param string $field_name
 * @return string
 */
function title_ofaperson_form_field_prep(string $field_name): string
{
    require_once CONTROLLERHELPERS . DIRSEP . 'standard_form_field_prep.php';

    $submitted_title = standard_form_field_prep($field_name, 3, 4);

    require_once CONTROLLERHELPERS . DIRSEP . 'is_title_ofaperson.php';

    if (!is_title_ofaperson($submitted_title)) {

        breakout(' This title value is invalid. ');

    }

    return $submitted_title;
}