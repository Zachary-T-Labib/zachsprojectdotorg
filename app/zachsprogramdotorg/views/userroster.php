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
		<center><h1>-------- User Roster --------</h1></center>
	</div>
	
	<div class="tool_holder">
		<input type="button" id="userb" value="Reload" onclick="history.go(0)" />
		<a href="/zl/UserAdd/page" id="userb" class="btn">Add User</a>
		<a href="/zl/UserSuspend/page" id="userb" class="btn">Suspend User</a>
		
		<center><h2>User List</h2></center>
		
        <?php if (!empty($array)): ?>
            <?php foreach ($array as $key => $object): ?>
                <p>⇀ <em>Username: <?= $object->username ?></em> -- Role: <?= $object->role ?></p>
            <?php endforeach; ?>
        <?php else: ?>
            <p>There are no users.</p>
        <?php endif; ?>
	</div>
	
	<?php require FOOTERBAR; ?>
	</div>
</body>
</html>
	
	
