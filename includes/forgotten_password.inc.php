<?php
if (isset($_POST['send_mail'])) {
	include '../config/database.php';
	$email = $_POST['email'];

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: ../forgetten_password.php?error=invalidmail");
		exit();
	} else {
		$sql = "SELECT * FROM `users` WHERE email = :mail";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(":mail", $email);
		$stmt->execute();

		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		$user_id = $result['user_id'];
		$username = $result['username'];

		$to = $email;
		$url = "http://localhost:8081/camagru/includes/update.inc.php?code=" . base64_encode($user_id);
		$msg = "
		<p>Hi $username,</p>
		<p>Click the link below to change password<br /><br /></p>
		<p>$verificationlink</p>
		<p>From,<br /> Bear</p>
		";

		$headers = "Content-type:text/html;charset=UTF-8" . "\r\n";

		$headers .= 'From: Bear <no-reply@superposable.com>' . "\r\n";
	}
}
