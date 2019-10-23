<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport"  content="width=device-width, initial-scale=1.0">
		<title>Camagru</title>
		<link ref="stylesheet" href="style.css"/>
	</head>
	<body>
		<header>
			<img id="header-image" src="images/header-name.png"/>
			<form action="inludes/logout.inc.php" method="post">
				<button id="logout-butt" type="submit" name="logout-submit">Logout</button>
			</form>
		</header>
		<div class="center">
			<div class="logins">
				<form action="includes/login.inc.php" method="post">
					<input id="email" type="text" name="mailuid" placeholder="E-mail"><br>
					<input id="pwd" type="password" name="pwd" placeholder="password"><br>
					<button class="login-butt" type="submit" name="login-submit">Login</button><br>
				</form>
				<input type="button" class="signup-butt" value="Signup" onclick="location.href='signup.php';"/>
				<!-- <form action="signup.php">
					<button class="signup-butt" type="submit" name="signup-butt">Signup</button>
				</form> -->
			</div>
		</div>
	</body>
</html> 