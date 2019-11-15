<?php
session_start();
require '../config/database.php';

if (isset($_POST['update-info'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
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
	} else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location: ../update.php?error=invaliduid&mail=" . $email);
		exit();
	} else {
		try {
			$sql = "SELECT `password`, `email`  FROM `users` WHERE `user_id` = :userid OR email = :mail";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(":userid", $user_id);
			$stmt->bindParam(":mail", $email);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			$passCheck = password_verify($password, $result['password']);
			$count = $stmt->rowCount();
			if ($passCheck == false) {
				header("Location: ../update.php?error=wrongpwd");
				exit();
			}
			if ($count > 0) {
				header("Location: ../update.php?error=mailtaken&uid=" . $username);
				exit();
			}
			$sql = "UPDATE `users` SET `username` = ?, `email` = ?";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(1, $username);
			$stmt->bindParam(2, $email);
			$stmt->execute();
			$_SESSION['username'] = $username;
			$_SESSION['email'] = $email;

			echo "<script> window.close(); </script>";
			exit();
		} catch (PDOException $e) {
			echo $e->getMessage();
			// header("Location: ../update.php?error=sqlerror");
			// exit();
		}
	}
} else if (isset($_POST['update-pass'])) {
	$pwd_current = $_POST['pwd-current'];
	$password = $_POST['password'];
	$pwd_repeat = $_POST['pwd-repeat'];
	$user_id = $_SESSION['userId'];

	if (empty($password) || empty($pwd_repeat) || empty($pwd_current)) {
		header("Location: ../update_password.php?error=emptyfields");
		exit();
	}
	if ((strlen($password) < 8)) {
		header("Location: ../update_password.php?error=pwdshort");
		exit();
	} else if (!preg_match('/[A-Z]/', $password)) {
		header("Location: ../update_password.php?error=pwdnocap");
		exit();
	} else if (!preg_match('/[a-z]/', $password)) {
		header("Location: ../update_password.php?error=pwdnolow");
		exit();
	} else if (!preg_match("/[!@#$%^&*()-=`~_+,.\/<>?:;\|]/", $password)) {
		header("Location: ../update_password.php?error=pwdnospchar");
		exit();
	} else if (!preg_match('/[0-9]/', $password)) {
		header("Location: ../update_password.php?error=pwdnodigit");
		exit();
	} else if (strstr($password, ' ')) {
		header("Location: ../update_password.php?error=pwdspace");
		exit();
	} else if ($password !== $pwd_repeat) {
		header("Location: ../update_password.php?error=passwordcheck");
		exit();
	} else {
		$sql = "SELECT `password` FROM `users` WHERE `user_id` = :userid";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(":userid", $user_id);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		$passCheck = password_verify($pwd_current, $result['password']);
		$count = $stmt->rowCount();
		if ($passCheck == false) {
			header("Location: ../update_password.php?error=wrongpwd");
			exit();
		} else {
			$sql = "UPDATE `users` SET `password` = ?";
			$hashed =  password_hash($password, PASSWORD_DEFAULT);
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(1, $hashed);
			$stmt->execute();

			echo "<script> window.close(); </script>";
			exit();
		}
	}
} else {
	header("Location: ../profile.php");
	exit();
}
