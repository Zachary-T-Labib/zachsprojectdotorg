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
	<form action="/zl/DeleteCarProcessor/page" method="post">
		<center><h1>Delete a Car</h1></center>
		<p></p>
		<p></p>
		<p></p>
		<h4>Which Car?</h4>
		<section>
			<?php /** @noinspection PhpUndefinedVariableInspection */
			foreach ($array as $key => $object): ?>
			<label for="c<?php echo $key; ?>" class="radio">
				<input type="radio" id="c<?= $key ?>" name="choice" value="<?= $object->id ?>">
				<?= $object->LicensePlate ?>
			</label>
		<?php endforeach; ?>
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