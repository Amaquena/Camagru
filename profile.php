<?php
require 'header.php';
include 'functions/php_functions.php';
?>

<main>
	<?php
	if (!$_SESSION) {
		header("Location: index.php");
		exit();
	} else { ?>
		<?php
			$images = get_user_images(0);
			$images_id = get_user_images(1);
			$array_size = count($images);
			$notify = intval(notify_comments());
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
			<h6>Do you want to recieve email notifaction on comments? </h6>
			<form id="notify_form" action="includes/comments_notification.inc.php" method="post">
				<?php if ($notify == 1) { ?>
					<input id="box" type="checkbox" name="mail-notify" value="yes" checked="true" onclick="com_not()">
				<?php } else if ($notify == 0) { ?>
					<input id="box" type="checkbox" name="mail-notify" value="no" onclick="com_not()">
				<?php } ?>
			</form>
		</section>
		<h3>Personal Gallery</h3>
		<section class="user-images">
			<?php while ($i < $array_size) { ?>
				<fieldset>
					<?php $loc = "comments.php?image=" . $images[$i] . "&id=" . $images_id[$i]; ?>
					<img onclick="window.location.href='<?php echo $loc; ?>'" src="<?php echo $images[$i]; ?>" />
					<span onclick="delete_img('<?php echo $images_id[$i]; ?>')">&xotime;</span>
					<form id="<?php echo $images_id[$i] . "_form"; ?>" action="includes/delete_img.inc.php" method="post">
						<input type="hidden" name="del_img" value="<?php echo $images_id[$i]; ?>">
					</form>
				</fieldset>
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

	function delete_img(id) {
		let con = confirm("Are you sure you want to delete image!");
		if (con)
			document.getElementById(id + '_form').submit();
	}

	function com_not() {
		var checkbox = document.getElementById('box');
		if (checkbox.checked == true)
			checkbox.checked = false;
		else
			checkbox.checked = true
		document.getElementById('notify_form').submit();
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