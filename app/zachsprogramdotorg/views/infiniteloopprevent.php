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
		        <h1>Infinite Loop Prevention</h1>
		        <p>You've arrived at this page because something went wrong. Either it is a simple anomaly
		            where your session expired while you were using this app. Or, it is a serious mistake in the app's
		            logic.</p>
		        <p>If the former then just go back and log in. If its the later then please notify the admin.</p>
		</div>
		
		<p></p>
		<p></p>
		<p></p>
		
		<?php require FOOTERBAR; ?>
		
	</div>
</body>
</html>
