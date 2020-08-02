<!DOCTYPE html>
<html>
<head>
<?php require "/zachsprogramdotorg/web/car_function.php" ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/css/styles.css">

<body>
	
	<?php require TOPPER; ?>
	
	
	<div class="content">
		<center><h1>_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_</h1></center>
		<p></p>
		<p></p>
		<p></p>
		<center><h1>Car Details Records</h1></center>
		<p></p>
		<p></p>
		<p></p>
		<center><h1>_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_</h1></center>
	</div>
	
	<div class="car_holder">
		<p></p>
		<p></p>
		<p></p>
	    <div class="container">
	      <p><input type="button" class="green" value="Reload" onclick="history.go(0)" />
	      <a class="green1" href="/zl/CreateCar/page"> Create </a>.
		   
		  <a class="green1" href="/zl/DeleteCar/page"> Delete </a>.
		  
		  <a class="green1" href="/zl/UpdateCar/page"> Update </a></p>
	    </div>
		<p></p>
		<p></p>
		<p></p>
        <?php if (!empty($array)): ?>
            <?php foreach ($array as $key => $object): ?>
                <p>⇀ <em>License Plate: <?= $object->LicensePlate ?></em> -- Type: <?= $object->Type ?> -- Brand: <?= $object->Brand ?> -- Seats: <?= $object->Seats ?></p>
            <?php endforeach; ?>
        <?php else: ?>
            <p>There are no cars.</p>
        <?php endif; ?>
	</div>
		
  <?php require FOOTERBAR; ?>

</head>


</html>
