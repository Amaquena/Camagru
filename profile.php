<?php
require 'header.php';
include 'functions/image_functions.php';
?>

<main>
	<?php
	if (!$_SESSION) {
		header("Location: index.php");
		exit();
	} else { ?>
		<?php
			$images = get_images();
			$array_size = count($images);
			$i = 0;
			$username = $_SESSION['username'];
			$user_id = $_SESSION['userId'];
			$pp_src = $_SESSION['pp_src'];
			$email = $_SESSION['email'];
			?>
		<h3>Information</h3>
		<section class="user-info">
			<div id="pp"></div>
			Username: <input type="text" name="username" value="<?php echo $username; ?>" disabled><br>
			Email: <input type="email" name="email" value="<?php echo $email; ?>" disabled><br>
			Password: <input type="password" name="password" value="00000000" disabled><br>
			<button id="info" onclick="change_info()">Edit information</button>
			<button id="info" onclick="change_pwd()">Change password</button>
		</section>
		<h3>Personal Gallery</h3>
		<section class="user-images">
			<?php while ($i < $array_size) { ?>
				<a href="<?php echo $images[$i]; ?>"><img src="<?php echo $images[$i]; ?>" /></a>
			<?php $i++;
				} ?>
		</section>
	<?php }
	?>
</main>
<script>
	function change_info() {
		window.open("update.php", "_blank", "left=500,width=500,scrollbars=no,resizable=no,top=300,height=500");
	}

	function change_pwd() {
		window.open("update_password.php", "_blank", "left=500,width=500,scrollbars=no,resizable=no,top=300,height=500");
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