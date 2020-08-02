<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/css/styles.css">
</head>
<body>
	<?php require TOPPER; ?>
	
	<div class="createcarholder">
	<form action="/zl/CreateCarData/page" method="post">
		<h1>Create a Car</h1>
	    <section>
	        <p>
	            <label for="LicensePlate">License Plate: </label>
	            <input id="LicensePlate" name="LicensePlate" type="text" value="" required minlength="3" maxlength="8"
	                   size="61" spellcheck="false">
	        </p>
	        <p>
	            <label for="Type">Type: </label>
	            <input id="Type" name="Type" type="text" value="" required minlength="1" maxlength="35"
	                   size="61" spellcheck="false">
	        </p>
	        <p>
	            <label for="Brand">Brand: </label>
	            <input id="Brand" name="Brand" type="text" value="" required minlength="1" maxlength="30"
	                   size="61" spellcheck="false">
	        </p>
			<p>
	            <label for="Seats">Seats: </label>
	            <input id="Seats" name="Seats" type="text" value="" required minlength="1" maxlength="16"
	                   size="61" spellcheck="false">
		    </p>
	    </section>
	        <?php require SUBMITEXIT; ?>
	</form>
</div>
	<?php require FOOTERBAR; ?>
	
	</html>
