<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css2?family=Quantico&family=Ubuntu:wght@500&display=swap" rel="stylesheet">
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
		
		<p></p>
		<p></p>
		<p></p>
		
  <?php require FOOTERBAR; ?>
  </div>
</body>


</html>
