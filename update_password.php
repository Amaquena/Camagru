<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<?php
	$user_id = $_SESSION['userId'];
	$pp_src = $_SESSION['pp_src'];
	?>
	<section class="user-info">
		<div id="pp"></div>
		<?php
		if (isset($_GET['error'])) {
			if ($_GET['error'] == "emptyfields") {
				echo '<p>Fill in all fields</p>';
			} else if ($_GET['error'] == "passwordcheck") {
				echo '<p>Passwords doesn\'t match</p>';
			} else if ($_GET['error'] == "pwdshort") {
				echo '<p>Password needs to be longer than 8 characters</p>';
			} else if ($_GET['error'] == "pwdnocap") {
				echo '<p>Password needs at least 1 uppercase letter</p>';
			} else if ($_GET['error'] == "pwdnolow") {
				echo '<p>Password needs at least 1 lowercase letter</p>';
			} else if ($_GET['error'] == "pwdnospchar") {
				echo '<p>Password needs at least 1 special character</p>';
			} else if ($_GET['error'] == "pwdnodigit") {
				echo '<p>Password needs at least 1 digit</p>';
			} else if ($_GET['error'] == "pwdspace") {
				echo '<p>Password should have no spaces</p>';
			} else if ($_GET['error'] == "wrongpwd") {
				echo '<p>Incorrect password</p>';
			}
		}
		?>
		<form action="includes/update.inc.php" method="post">
			Password: <input type="password" name="pwd-current" placeholder="Enter current password"><br>
			Password: <input type="password" name="password" placeholder="Enter New password"><br>
			Confirm password: <input type="password" name="pwd-repeat" placeholder="Re-enter new password"><br>
			<button type="submit" name="update-pass">Update Password</button>
		</form>
		<button id="info" onclick="change_field()">close</button>
	</section>

</body>

</html>

<script>
	function change_field() {
		window.close();
	}
</script>