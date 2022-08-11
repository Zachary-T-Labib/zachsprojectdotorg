<?php

namespace zachsprogramdotorg\controllers;

use function zachsprogramdotorg\controllerhelpers\standard_form_field_prep;
use zachsprogramdotorg\models\CarsObject;



class CreateCarData
{
	function page()
    {
		
		global $g;
		
		$g->message = "Hello";
		
		require_once CONTROLLERHELPERS . DIRSEP . 'standard_form_field_prep.php';
		
		$LicensePlate = standard_form_field_prep('LicensePlate', 3, 8);
		$Type = standard_form_field_prep('Type', 1, 35);
		$Brand = standard_form_field_prep('Brand', 3, 30);
		$Seats = standard_form_field_prep('Seats', 1, 16);
		
		get_db();
		
		$array_record = ['LicensePlate' => $LicensePlate, 'Type' => $Type, 'Brand' => $Brand, 'Seats' => $Seats];
		
		ob_start();
		
		var_dump($array_record);
		
		$object = CarsObject::array_to_object($array_record);
		
		$result = $object->save();
		
		if (!$result) {

		            breakout(' The objects save method returned false. ');

		}
		
		redirect_to("/zl/Cars/page");
	}
}
		
