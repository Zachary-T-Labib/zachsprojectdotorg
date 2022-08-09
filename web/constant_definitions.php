<?php

const DIRSEP = DIRECTORY_SEPARATOR;
const WEB_DIR = PROJ_ROOT . DIRSEP . 'web';
const VENDOR_DIR = PROJ_ROOT . DIRSEP . 'vendor';
const UPPERLIMITSEQNUM = 40000000;
const FIRSTMIDDLESEQNUM = 10500000;


/**
 * Here I can define constants for the location
 * of the directory for view includes and for
 * the files for view includes.
 */
const VIEWS = PROJ_ROOT . DIRSEP . 'app' . DIRSEP . 'GoodToKnow' . DIRSEP . 'Views';
const VIEWSINCLUDES = PROJ_ROOT . DIRSEP . 'app' . DIRSEP . 'GoodToKnow' . DIRSEP . 'ViewsIncludes';
const CONTROLLERHELPERS = PROJ_ROOT . DIRSEP . 'app' . DIRSEP . 'GoodToKnow' . DIRSEP . 'ControllerHelpers';
const CONTROLLERINCLUDES = PROJ_ROOT . DIRSEP . 'app' . DIRSEP . 'GoodToKnow' . DIRSEP . 'ControllerIncludes';
const VIEWSDUPLICATESINCLUDES = PROJ_ROOT . DIRSEP . 'app' . DIRSEP . 'GoodToKnow' . DIRSEP . 'ViewsDuplicatesIncludes';

define('SESSIONMESSAGE', VIEWSINCLUDES . DIRSEP . 'sessionmessage.php');
define('FOOTERBAR', VIEWSINCLUDES . DIRSEP . 'footerbar.php');
define('TOPPER', VIEWSINCLUDES . DIRSEP . 'topper.php');
define('SUBMITEXIT', VIEWSINCLUDES . DIRSEP . 'submitexit.php');