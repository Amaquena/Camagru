<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport"  content="width=device-width, initial-scale=1.0">
		<title></title>
		<link ref="stylesheet" type="text/css" href="style.css"/>
	</head>
	<body>
		<header>
			<img id="header-image" src="images/header-name.png"/>
		</header>
		<div class="center">
			<div class="logins">
				<form action="includes/login.inc.php" method="post">
					<input id="email" type="text" name="mailuid" placeholder="E-mail"> <br>
					<input id="pwd" type="password" name="pwd" placeholder="password"> <br>
					<button class="login-butt" type="submit" name="login-submit">Login</button>
				</form>
			</div>
		</div>
	</body>
</html>