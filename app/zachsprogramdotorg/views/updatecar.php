<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/css/styles.css">
</head>
<body>
	<?php require TOPPER; ?>
	
	<div class="createcarholder">
	<form action="/zl/UpdateCarEdit/page" method="post">
		<center><h1>Update a Car</h1></center>
		<section>
			<?php foreach ($array as $key => $object): ?>
				<label for="c<?= $key ?>" class="radio">
					<input type="radio" id="c<?= $key ?>" name="choice" value="<?= $object->id ?>">
					<?= $object->label ?>
				</label>
			<?php endforeach; ?>
		</section>
		<?php require SUBMITEXIT; ?>
	</form>
    </div>
	
	<?php require FOOTERBAR; ?>
</body>
</html>
