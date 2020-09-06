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
		
		<form action="/zl/CreateUser/page" method="post">
			
		<div class="tool_holder">
			<center><h1>(---Add User---)</h1></center>
			<center><?php require SESSIONMESSAGE; ?></center>
		</div>
		
		<div class="tool_holder">
			<center><h2>User Credentials</h2></center>
			<section>
				<p>
					<label for="name">Username (<em>like Tendo_64</em>:) </label>
					<input id="name" name="username" type="text" value="" required minlength="7" maxlength="12" size="12" spellcheck="false">
				</p>
			</section>
			<section>
				<p>
					<label for="first_try">Password 1st try: </label>
					<input id="first_try" name="password" type="password" value="" required minlength="7" spellcheck="false">
				</p>
				<p>
					<label for="pwd">Password 2nd try: </label>
					<input id="pwd" name="password" type="password" value="" required minlength="7" spellcheck="false">
				</p>
			</section>
			<center><h2>Other Info</h2></center>
			<section>
			   <p>
				   <label for="title">Title:  </label>
				   <input id="title" name="title" value="" spellcheck="false">
			   </p>
		    </section>
	        <p>
	            <label for="box1">Description <strong><abbr title="required">*</abbr></strong> :
	            </label>
	            <textarea id="box1" name="comment" rows="5" cols="83" wrap="soft" maxlength="800" spellcheck="false"
	                      placeholder="Any other important info."></textarea>
	        </p>
	        <p>
	            <label for="timezone">PHP Time Zone 
	            </label>
	            <input id="timezone" name="timezone" type="text" placeholder="America/New_York" value="" required
	                   minlength="2" maxlength="60" size="18">
	        </p>
	        <p>
	            <label for="date">Creation's date (<em>mm/dd/yyyy</em>): </label>
	            <input id="date" name="date" type="text" value="" required minlength="10" spellcheck="false">
	        </p>
			<center><h2>User Comunication</h2></center>
			<section>
				<p>
					<label for="email">Email:  </label>
					<input id="email" name="email" type="text" value="" minlength="4">
				</p>
			</section>
			<?php require SUBMITEXIT; ?>
		</form>
	    <?php require FOOTER; ?>
	</div>
</body>
</html>