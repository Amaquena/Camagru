<?php
include	"header.php";
?>

<main>
	<div class="center">
		<div class="logins">
		<?php
			if (isset($_GET['error'])) {
				if ($_GET['error'] == "emptyfields") {
					echo '<p>Fill in all fields</p>';
				} else if ($_GET['error'] == "invalidmailuid") {
					echo '<p>Invalid username & password</p>';
				}
				else if ($_GET['error'] == "invalidmail") {
					echo '<p>Invalid email</p>';
				}
				else if ($_GET['error'] == "invaliduid") {
					echo '<p>Invalid username</p>';
				}
				else if ($_GET['error'] == "passwordcheck") {
					echo '<p>Passwords doesn\'t match</p>';
				}
				else if ($_GET['error'] == "mailtaken") {
					echo '<p>Email already registered</p>';
				}
			}
			?>
			<form action="includes/signup.inc.php" method="post">
				<input id="email" type="text" name="uid" placeholder="Username"><br>
				<input id="email" type="text" name="mail" placeholder="E-mail"><br>
				<input id="pwd" type="password" name="pwd" placeholder="Password"><br>
				<input id="pwd" type="password" name="pwd-repeat" placeholder="Confirm password"><br>
				<button class="signup-butt" type="submit" name="signup-submit">Signup</button>
			</form>
		</div>
	</div>
</main>
<?php
require "footer.php";
?>