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
	h2 {
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
	
	<div class="tool_holder">
		
		<form action="/ax1/SuspendAccountProcessor/page" method="post">
		    <h1>Suspend User</h1>
		    <?php require SESSIONMESSAGE; ?>
		    <p>Enter the Username</p>
		    <section>
				<p>
		            <label for="username">U/N: </label>
		            <input id="username" name="username" type="text" required minlength="7" maxlength="12" size="12"
		                   spellcheck="false">
				</p>
			</section>
			<?php require SUBMITEXIT; ?>
		</form>
	</div>
	
	<?php require FOOTERBAR; ?>
	
   </div>
</body>
</html>