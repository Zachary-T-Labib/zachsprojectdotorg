<!DOCTYPE html>
<html>

<?php function carCreate()
{ ?>
	<form action="/zl/Cars/page" method="post">
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
	<?php
} 
?>
</html>