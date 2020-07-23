<?php

namespace zachsprogramdotorg\models;

class Cars extends ZachObject
{
	
	protected static $table_name = cars
		
	protected static $fields = ['id', 'LicensePlate', 'Type', 'Brand', 'Seats']
		
	public $id;
	
	public $LicensePlate;
	
	public $Type;
	
	public $Brand;
	
	public $Seats;
}

?>
