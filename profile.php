<?php require 'header.php' ?>

<main>
	<?php
	if (!$_SESSION) {
		header("Location: index.php");
		exit();
	} else { ?>
		<?php
			$username = $_SESSION['username'];
			$user_id = $_SESSION['userId'];
			$pp_src = $_SESSION['pp_src'];
			$email = $_SESSION['email'];
			?>
		<section class="user-info">
			<div id="pp"></div>
				Username: <input type="text" name="username" value="<?php echo $username ?>" disabled><br>
				Email: <input type="email" name="email" value="<?php echo $email ?>" disabled><br>
				Password: <input type="password" name="password" value="00000000" disabled><br>
			<button id="info" onclick="change_field()">Edit information</button>
		</section>
	<?php }
	?>
</main>
<script>
	function change_field() {
		// var user = document.getElementsByName('username');
		// var mail = document.getElementsByName('email');
		// var pass = document.getElementsByName('password');
			// window.close();

			// window.open("","MsgWindow","width=200,height=200");
			window.open("update.php", "_blank", "left=500,width=500,scrollbars=no,resizable=no,top=500,height=500");
		// if (document.getElementById('info').innerText.localeCompare("Edit information")) {
		// 	for (var i = 0; i < user.length; i++) {
		// 		user[i].disabled = false;
		// 	}
		// 	for (var i = 0; i < mail.length; i++) {
		// 		mail[i].disabled = false;
		// 	}
		// 	for (var i = 0; i < pass.length; i++) {
		// 		pass[i].disabled = false;
		// 	}
		// 	document.getElementsByName('pwd-repeat')[i].type = 'text';
		// 	document.getElementById('info').innerText = "stop";
		// }

		// if (document.getElementById('info').innerText.localeCompare("stop")) {
		// 	for (var i = 0; i < user.length; i++) {
		// 		user[i].disabled = true;
		// 	}
		// 	for (var i = 0; i < mail.length; i++) {
		// 		mail[i].disabled = true;
		// 	}
		// 	for (var i = 0; i < pass.length; i++) {
		// 		pass[i].disabled = true;
		// 	}
		// 	for (var i = 0; i < document.getElementsByName('pwd-repeat').length; i++) {
		// 		document.getElementsByName('pwd-repeat')[i].type = 'text';
		// 	}
		// 	document.getElementById('info').innerText = "Edit information";
		// }
	}
</script>

<?php require 'footer.php' ?>
<!-- 
$_SESSION['userId'] = $result['user_id'];
$_SESSION['username'] = $result['username'];
$_SESSION['pp_src'] = $result['pp_src'];
$_SESSION['verify'] = $result['verified']; 
$_SESSION['email'] = $result['email'];
-->