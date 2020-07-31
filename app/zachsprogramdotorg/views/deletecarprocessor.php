<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/css/styles.css">
</head>
<body>
	<?php require TOPPER; ?>
	<div class="createcarholder">
	<form action="/zl/DeleteATaskData/page" method="post">
		<h1>Confirm</h1>
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
<?php require FOOTERBAR; ?>
</body>
</html>
	