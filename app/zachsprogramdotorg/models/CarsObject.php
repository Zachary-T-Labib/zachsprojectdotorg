<?php

namespace zachsprogramdotorg\models;

class CarsObject extends ZachObject
{
	
	@var string
	
	protected static $table_name = "carsobject";
		
	@var array
		
	protected static $fields = ['id', 'LicensePlate', 'Type', 'Brand', 'Seats'];
		
	@var int
		
	public $id;
	
	@var string
	
	public $LicensePlate;
	
	@var string
	
	public $Type;
	
	@var string
	
	public $Brand;
	
	@var int
	
	public $Seats;
}

?>
