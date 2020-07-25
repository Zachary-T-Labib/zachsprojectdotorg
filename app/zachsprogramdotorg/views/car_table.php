<!DOCTYPE html>
<html>
<head>
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
        <?php if (!empty($array)): ?>
            <?php foreach ($array as $key => $object): ?>
                <p>⇀ <em><?= $object->LicensePlate ?></em> ◜ <?= $object->Type ?> ⇁ <?= $object->Brand ?> ◜ <?= $object->Brand ?></p>
            <?php endforeach; ?>
        <?php else: ?>
            <p>There are no cars.</p>
        <?php endif; ?>
	</div>
		
		

</head>


</html>
