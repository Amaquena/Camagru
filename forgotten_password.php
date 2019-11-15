<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<?php
	if (isset($_GET['code'])) { ?>
		<section>
			<form action="includes/forgotten_password.inc.php" method="post">
				<input type="password" name="pwd" placeholder="Password"><br>
				<input type="password" name="pwd-repeat" placeholder="Confirm password"><br>
				<input type="hidden" name="code" value="<?php echo $_GET['code']; ?>">
				<button type="submit" name="reset-submit">Signup</button>
			</form>
		</section>
	<?php
	} else { ?>
		<section>
			<form action="includes/forgotten_password.inc.php" method="post">
				Enter your Email: <br>
				<input type="email" name="email" placeholder="Email"><br>
				<button type="submit" name="send_mail">Send mail</button>
			</form>
		</section>
	<?php }
	?>

</body>

</html>