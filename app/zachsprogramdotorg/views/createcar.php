<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css2?family=Quantico&family=Ubuntu:wght@500&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/css/styles.css">
	
	<style>	
		h1 {
		font-family: 'Ubuntu', sans-serif;
	    }
		p {
		font-family: 'Quantico', sans-serif;
	    }
	</style>
	
</head>
<body>
	<div class="mainholder">
	<?php require TOPPER; ?>
	
	<p></p>
	<p></p>
	<p></p>
	
	<div class="createcarholder">
	<form action="/zl/CreateCarData/page" method="post">
		<center><h1>Create a Car</h1></center>
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
 
 <p></p>
 <p></p>
 <p></p> 
 
	<?php require FOOTERBAR; ?>
	
	
   </div>
	
	</html>
