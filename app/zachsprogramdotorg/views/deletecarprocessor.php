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
	<form action="/zl/DeleteCarData/page" method="post">
		<center><h1>Confirm</h1></center>
		<p>&nbsp;</p>
		<p><b>License Plate: </b><?php echo $object->LicensePlate; ?></p>
	    <p><b>Type: </b><?= $object->Type ?></p>
	    <p><b>Brand: </b><?= $object->Brand ?></p>
		<p><b>Seats: </b><?= $object->Seats ?></p>
		<p>&nbsp;</p>
		<p>Are you sure you want to delete this?</p>
		<section>
			<label for="yes" class="radio">
				<input type="radio" id="yes" name="choice" value="yes">
				Yes<br>
			</label>
			<label for="no" class="radio">
				<input type="radio" id="no" name="choice" value="no">
				No
			</label>
		</section>
		<?php require SUBMITEXIT; ?>
	</form>
    </div>
	
	<p></p>
	<p></p>
	<p></p>
	
<?php require FOOTERBAR; ?>
   </div>
</body>
</html>
	