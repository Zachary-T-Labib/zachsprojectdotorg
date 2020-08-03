<?php

namespace zachsprogramdotorg\controllers;

use function zachsprogramdotorg\controllerhelpers\standard_form_field_prep;
use zachsprogramdotorg\models\CarsObject;

class UpdateCarData
{
	function page()
	{
	         /**
	         * This function will:
	         * 1) Validate the submitted featureataskedit.php form data. (and apply htmlspecialchars)
	         * 2) Retrieve the existing record from the database.
	         * 3) Modify the retrieved record by updating it with the submitted data.
	         * 4) Update/save the updated record in the database.
	         * 5) Report success.
	         */
	
	global $sessionMessage;
	$sessionMessage = "Hello";	
	
	require_once CONTROLLERHELPERS . DIRSEP . 'standard_form_field_prep.php';
	
	$edited_LicensePlate = standard_form_field_prep('LicensePlate', 3, 8);
	$edited_Type = standard_form_field_prep('Type', 1, 35);
	$edited_Brand = standard_form_field_prep('Brand', 1, 30);
	$edited_Seats = standard_form_field_prep('Seats', 1, 16);
	
	$db = get_db();
	
	
	$object = CarsObject::find_by_id($db, $sessionMessage, $_SESSION['saved_int01']);
	
	
	if (!$object) {

	            breakout(' Unexpectedly I could not find that record. ');

	        }
	
	$object->LicensePlate = $edited_LicensePlate;
	$object->Type = $edited_Type;
	$object->Brand = $edited_Brand;
	$object->Seats = $edited_Seats;
	
	$result = $object->save($db, $sessionMessage);
	
	if ($result === false) {

	            breakout(' I failed at saving the updated object. ');

	        }
	
	breakout(" I've updated <b>{$object->label}</b>. ");
	
	       
	}
}
