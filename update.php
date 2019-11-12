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
	$username = $_SESSION['username'];
	$user_id = $_SESSION['userId'];
	$pp_src = $_SESSION['pp_src'];
	$email = $_SESSION['email'];
	?>
	<section class="user-info">
		<div id="pp"></div>
		<?php
		if (isset($_GET['error'])) {
			if ($_GET['error'] == "emptyfields") {
				echo '<p>Fill in all fields</p>';
			} else if ($_GET['error'] == "invalidmailuid") {
				echo '<p>Invalid username & password</p>';
			} else if ($_GET['error'] == "invalidmail") {
				echo '<p>Invalid email</p>';
			} else if ($_GET['error'] == "invaliduid") {
				echo '<p>Invalid username</p>';
			} else if ($_GET['error'] == "wrongpwd") {
				echo '<p>Incorrect password</p>';
			} else if ($_GET['error'] == "mailtaken") {
				echo '<p>Email already registered</p>';
			}
		}
		?>
		<form action="includes/update.inc.php" method="post">
			Username: <input type="text" name="username" value="<?php echo $username; ?>"><br>
			Email: <input type="email" name="email" value="<?php echo $email; ?>"><br>
			Password: <input type="password" name="password" placeholder="Enter to confirm changes"><br>
			<button type="submit" name="update-info">Update info</button>
		</form>
		<!-- Confirm password: <input type="password" name="pwd-repeat" placeholder="Re-enter new password"><br> -->
		<button id="info" onclick="change_field()">close</button>
	</section>

</body>

</html>

<script>
	function change_field() {
		window.close();
	}
</script>