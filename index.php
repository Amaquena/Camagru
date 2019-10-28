<?php require "header.php"; ?>

<main>
		<div class="center">
			<div class="logins">
				<h5>Welcome!</h5>
				<form action="includes/login.inc.php" method="post">
					<input id="email" onkeyup="stoppedTyping()" type="text" name="mailuid" placeholder="Username/E-mail"><br>
					<input id="pwd" onkeyup="stoppedTyping()" type="password" name="pwd" placeholder="Password"><br>
					<button id="login-butt" type="submit" name="login-submit">Login</button><br>
				</form>
				<input type="button" class="signup-butt" value="Signup" onclick="location.href='signup.php';" />
				<!-- <form action="signup.php">
						<button class="signup-butt" type="submit" name="signup-butt">Signup</button>
					</form> -->
			</div>
		</div>
		<script>
			$m = document.getElementById("email");
			$p = document.getElementById("pwd");

			function stoppedTyping() {
				if ($m.value.length > 0 && $p.value.length > 0) {
					document.getElementById("login-butt").disable = false;
				} else {
					document.getElementById("login-butt").disable = true;
				}
			}
		</script>
</main>

<?php require "footer.php"; ?>