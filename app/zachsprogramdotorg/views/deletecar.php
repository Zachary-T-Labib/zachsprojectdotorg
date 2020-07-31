<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/css/styles.css">
</head>
<body>
	<?php require TOPPER; ?>
	
	<div class="createcarholder">
	<form action="/zl/DeleteCarData/page" method="post">
		<h1>Delete a Car</h1>
		<p></p>
		<p></p>
		<p></p>
		<p>Which Car?</p>
		<section>
			<?php /** @noinspection PhpUndefinedVariableInspection */
			foreach ($array as $key => $object): ?>
			<label for="c<?php echo $key; ?>" class="radio">
				<input type="radio" id="c<?= $key ?>" name="choice" value="<?= $object->id ?>">
				<?= $object->label ?>
			</label>
		<?php endforeach; ?>
	    </section>
		<?php require SUBMITEXIT; ?>
	</form>
   </div>
   
   <?php require FOOTERBAR; ?>
   
   </html>