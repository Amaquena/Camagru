<?php

if (isset($_POST['update-info'])) {
	require '../config/database.php';
	$username = $_POST['username'];
	$email = $_POST['username'];
	$password = $_POST['username'];
	// $pwd_repeat = $_POST['pwd-repeat'];
	$user_id = $_SESSION['userId'];

	if (empty($username) || empty($email) || empty($password)) {
		header("Location: ../update.php?error=emptyfields&uid=" . $username . "&mail=" . $email);
		exit();
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location: ../update.php?error=invalidmailuid");
		exit();
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: ../update.php?error=invalidmail&uid=" . $username);
		exit();
	} else {
		try {
			$sql = "SELECT * FROM `users` WHERE `user_id` = :userid";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(":userid", $user_id);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			$passCheck = password_verify($password, $result['password']);
			if ($passCheck == false) {
				header("Location: ../update.php?error=wrongpwd");
				exit();
			}

			$sql = "SELECT COUNT(*) FROM `users` WHERE email=:mail";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(":mail", $email);
			$stmt->execute();
			$count = $stmt->fetchColumn();
			if ($count > 0) {
				header("Location: ../update.php?error=mailtaken&uid=" . $username);
				exit();
			} else {
				$sql = "UPDATE `users` SET `username`, `email`, `password`) VALUES (?, ?, ?)";
				$hashed =  password_hash($password, PASSWORD_DEFAULT);
				$stmt = $conn->prepare($sql);
				$stmt->bindParam(1, $username);
				$stmt->bindParam(2, $email);
				$stmt->bindParam(3, $hashed);
				$stmt->execute();

				header("Location: ../update.php?success=signup&uid=" . $username . "&email=" . $email);
				exit();
			}
		} catch (PDOException $e) {
			echo $e->getMessage();
			header("Location: ../update.php?error=sqlerror");
			exit();
		}
	}
} else {
	header("Location: ../profile.php");
	exit();
}
