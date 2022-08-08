<?php

namespace zachsprogramdotorg\controllerhelpers;

/**
 * @param string $title
 * @return bool
 */
function is_title_ofaperson(string &$title): bool
{
    /**
     * Trim it.
     * Can't be empty.
     */

    global $g;

    $title = trim($title);

    if (empty($title)) {

        $g->message .= " Your title is missing. ";

        return false;
    }

    return true;
}