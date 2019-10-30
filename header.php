<?php session_start() ?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Camagru - Super Posable</title>
	<link rel="stylesheet" media="all" href="style.css">

</head>
<header>
	<div id="header-image"></div>
	<div class="header-input"></div>
	<form action="includes/login.inc.php" method="post">
		<input type="text" name="mailuid" placeholder="Username/E-mail">
		<input type="password" name="pwd" placeholder="Password">
		<button type="submit" name="login-submit">Login</button>
	</form>
		<input type="button" value="Signup" onclick="location.href='signup.php';" >
		<form action="inludes/logout.inc.php" method="post">
			<button id="logout-butt" type="submit" name="logout-submit">Logout</button>
		</form>
</header>

</html>