<?php
	include	"header.php";
?>

<style> 
<?php include "style.css"; ?>
</style>

<main>
<div class="center">
	<div class="logins">
		<form action="includes/signup.inc.php" method="post">
			<input id="email" type="text" name="uid" placeholder="Username"><br>
			<input id="email" type="text" name="mail" placeholder="E-mail"><br>
			<input id="pwd" type="password" name="pwd" placeholder="Password"><br>
			<input id="pwd" type="password" name="pwd-repeat" placeholder="Confirm password"><br>
			<button class="login-butt" type="submit" name="signup-submit">Signup</button>
		</form>
	</div>
</div>
</main>
<?php
	require "footer.php"
?>