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
		
		<center><h3 align="center" style="font-size: .78em;" >Welcome, <?php echo $_SESSION['user_username']; ?> 👔</h3></center>
		
</div>

<div id="admindiv">
	<a href="/zl/AdminTools/page"><img src="/adminbox.png" alt="Admin Panel" height="86" width="108"></a>
</div>
</body>
</html>

	  
