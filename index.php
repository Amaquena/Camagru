<?php include "header.php"; ?>
<style> 
<?php include "style.css"; ?>
</style>

<main>
<div class="center">
	<div class="logins">
		<form action="includes/login.inc.php" method="post">
			<input id="email" type="text" name="mailuid" placeholder="Username/E-mail"><br>
			<input id="pwd" type="password" name="pwd" placeholder="Password"><br>
			<button class="login-butt" type="submit" name="login-submit">Login</button><br>
		</form>
			<input type="button" class="signup-butt" value="Signup" onclick="location.href='signup.php';"/>
			<!-- <form action="signup.php">
				<button class="signup-butt" type="submit" name="signup-butt">Signup</button>
			</form> -->
	</div>
</div>
</main>

<?php
	require "footer.php";
?>