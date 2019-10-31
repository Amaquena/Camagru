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
	<div id="logo"></div>
	<?php
	if (isset($_SESSION['userId'])) {
		echo '<nav>
		<ul class="nav-links">
			<li><a href="">profile</a></li>
			<li><a href="">gallery</a></li>
			<li><a href="">editor</a></li>
		</ul>
	</nav>

	<div class="nav-input">
		<form action="includes/login.inc.php" method="post">
			<button type="submit" name="logout-submit">Logout</button>
		</form>
	</div>';
	}
	if (isset($_GET['guest'])) {
		echo '<div class="nav-input">
		<form action="includes/login.inc.php" method="post">
		<input type="text" name="mailuid" placeholder="Username/E-mail">
		<input type="password" name="pwd" placeholder="Password">
		<button type="submit" name="guest-login-submit">Login</button>
		<input id="signup-butt" type="button" value="Signup" onclick="location.href=\'signup.php\'";">
		</form>'?>
		<?php
		if (isset($_GET['error'])) {
			if ($_GET['error'] == "emptyfields") {
				echo '<p>Fill in all fields</p>';
			} else if ($_GET['error'] == "nouser") {
				echo '<p>Please sign-up to sign-in</p>';
			} else if ($_GET['error'] == "wrongpwd") {
				echo '<p>Incorrect password</p>';
			} else if ($_GET['error'] == "nouser") {
				echo '<p>Please sign-up to sign-in</p>';
			}
		}
		echo '</div>';
	}
	?>
</header>

</html>

<!-- <nav>
		<ul class="nav-links">
			<li><a href="">acount details</a></li>
			<li><a href="">gallery</a></li>
			<li><a href="">editor</a></li>
		</ul>
	</nav>

	<div class="nav-input">
		<form action="includes/login.inc.php" method="post">
			<input type="text" name="mailuid" placeholder="Username/E-mail">
			<input type="password" name="pwd" placeholder="Password">
			<button type="submit" name="login-submit">Login</button>
			<input id="signup-butt" type="button" value="Signup" onclick="location.href="signup.php";">
			<button type="submit" name="logout-submit">Logout</button>
		</form>
	</div> -->