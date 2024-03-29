<?php

namespace zachsprogramdotorg\controllers;

use zachsprogramdotorg\models\CarsObject;
use function zachsprogramdotorg\controllerhelpers\standard_form_field_prep;
use function zachsprogramdotorg\controllerhelpers\yes_no_form_field_prep;

class DeleteCarData
{
	function page()
	{
		
        global $g;
		$g->message = "Hello";

		require_once CONTROLLERHELPERS . DIRSEP . 'yes_no_form_field_prep.php';
		
		$choice = yes_no_form_field_prep('choice');
		
		if ($choice == "no") {

		            breakout(' Nothing was deleted. ');
					redirect_to("/zl/Cars/page");

		}
		
		if ($choice == "yes") {
		
		$g->db = get_db();
		
		$object = CarsObject::find_by_id($_SESSION['saved_int01']);
		
		if (!$object) {

		            breakout(' I was not able to find the record. ');

		}
		
		$result = $object->delete();
		
		if (!$result) {

		            breakout(' Unexpectedly I could not delete the record. ');

		}
		
		breakout(' I deleted the Task. ');
		redirect_to("/zl/Cars/page");
	}
		
	}
}
