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

<div id="utilities">
<div id="greeter">
		
		<p><center><h2>Welcome, <?php echo $_SESSION['user_username']; ?> 👔</h2></center></p>
		
</div>

<div id="admindiv">
	<center><a href="/zl/AdminTools/page"><img src="/img/adminbox.png" alt="Admin Panel" height="86" width="108"></a></center>
</div>

<div id="sessionmsg">
	<p><center><h2><?php require SESSIONMESSAGE; ?></h2></center></p>
</div>

</div>

</body>
</html>

	  
