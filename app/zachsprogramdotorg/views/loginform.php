 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/loginform.css">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
	<form class="login" action="/zl/LoginScript/page" method="post">
		<h2>Log In</h2>
		<fieldset>
	        <input type="text" name="username" spellcheck="false" placeholder="Username" minlength="7" required>
	        <input type="password" name="password" spellcheck="false" placeholder="Password" minlength="7" required>
		</fieldset>
		<input type="submit" value="Log In">
		<div class="utilities">
			<a><?= ADMINONLOGINFORM ?></a>
            <?php require SESSIONMESSAGE; ?>
		</div>
	</form>
</body>
</html>