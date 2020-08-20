<!DOCTYPE html>
<?php use zachsprogramdotorg\models\User; ?>

<html>

<body>

<div id="topper">
    <p align="center" style="font-size: .78em;">

		<h1><a href="/zl" class="button">:  🏠 </a>
                \---*---/
		<a href="/zl/Logout/page">⭕ Log out! </a></h1>
		
	</p>
</div>

<div id="greeter">
	<p align="center" style="font-size: .78em;">
		
		<h3>Welcome, <?php echo $_SESSION['user_username']; ?></h3>
		
	</p>
</div>
</body>
</html>

	  
