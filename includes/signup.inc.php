<?php
if (isset($_POST['signup-submit'])) {
	require '../config/database.php';

	$username = $_POST['uid'];
	$email = $_POST['mail'];
	$password = $_POST['pwd'];
	$passwordRepeat = $_POST['pwd-repeat'];
	if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
		header("Location: ../signup.php?error=emptyfields&uid=" . $username . "&mail=" . $email);
		exit();
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location: ../signup.php?error=invalidmailuid");
		exit();
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: ../signup.php?error=invalidmail&uid=" . $username);
		exit();
	} else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location: ../signup.php?error=invaliduid&mail=" . $email);
		exit();
	} else if ($password !== $passwordRepeat) {
		header("Location: ../signup.php?error=passwordcheck&uid=" . $username . "&mail=" . $email);
		exit();
	} else {
		try {
			// $sql = "SELECT COUNT(*) FROM `users` Where email=:mail";
			// $stmt = $conn->prepare($sql);
			// $stmt->bindParam(":mail", $email);
			// $stmt->execute();
			// $count = $stmt->fetchColumn();
			// if ($count > 0) {
			// 	header("Location: ../signup.php?error=mailtaken&uid=" . $username);
			// 	exit();
			// } else {
			// $sql = "INSERT INTO `users` (username, email, password) VALUES (?, ?, ?)";
			// $hashed =  password_hash($password, PASSWORD_DEFAULT);
			// $stmt = $conn->prepare($sql);
			// $stmt->bindParam(1, $username);
			// $stmt->bindParam(2, $email);
			// $stmt->bindParam(3, $hashed);
			// $stmt->execute();

			$to = $email;
			$subject = "Babe It's Me!";
			$msg = '
			 	<p>Hi ' . $username . ',</p>
				<p>I just manage to figure out how to send an email via my website.</p>
				<p>I\'m sending this from my website:)</p>
				<p>With Love, From,<br /> Bear</p>
				';

			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			$headers .= 'From: Alvin <alvin1king@gmail.com>' . "\r\n";

			if (mail($to,$subject,$msg,$headers))
				echo "success";
			else
				echo "failed";
		} catch (PDOException $e) {
			echo $e->getMessage();
			header("Location: ../signup.php?error=sqlerror");
			exit();
		}
	}
	$conn = null;
} else {
	header("Location: ../signup.php");
	exit();
}
