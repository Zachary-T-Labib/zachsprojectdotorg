<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/css/styles.css">
</head>
<body>
	<?php require TOPPER; ?>
	
	<div class="createcarholder">
	<form action="/zl/UpdateCarData/page" method="post">
		<center><h1>Update a Car</h1></center>
		<section>
			<p>
				<label for="LicensePlate">LicensePlate: </label>
				<input id="LicensePlate" name="LicensePlate" type="text" value="<?= $object->LicensePlate ?>" required minlength="3"
				       maxlength="8" size="61" spellcheck="false">
			</p>
			<p>
				<label for="Type">Type: </label>
				<input id="Type" name="Type" type="text" value="<?= $object->Type ?>" required minlength="1"
				       maxlength="35" size="61" spellcheck="false">
			</p>
			<p>
				<label for="Brand">Brand: </label>
				<input id="Brand" name="Brand" type="text" value="<?= $object->Brand ?>" required minlength="1"
				       maxlength="30" size="61" spellcheck="false">
			</p>
			<p>
				<label for="Seats">Seats: </label>
				<input id="Seats" name="Seats" type="text" value="<?= $object->Seats ?>" required minlength="1"
				       maxlength="16" size="61" spellcheck="false">
			</p>
		</section>
		<?php require SUBMITEXIT; ?>
	</form>
    </div>
	<?php require FOOTERBAR; ?>
</body>
</html>
