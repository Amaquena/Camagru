<?php
if (isset($_POST['login-submit'])) {
	require 'config.php';

	$mailuid = $_POST['mailuid'];
	$password = $_POST['pwd'];

	if (empty($mailuid) || empty($password)) {
		header("Location: ../index.php?error=emptyfields");
		exit();
	} else {
		try {
			$sql = "SELECT * FROM `users` WHERE `username`= :mailuid OR `email` = :mailuid";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(":mailuid", $mailuid);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			$passCheck = password_verify($password, $result['password']);
			if (!$result)
			{
				header("Location: ../index.php?error=nouser");
				exit();
			}
			if ($passCheck == false) {
				header("Location: ../index.php?error=wrongpwd");
				exit();
			} else if ($passCheck == true) {
				session_start();
				$_SESSION['userId'] = $result['user_id'];
				$_SESSION['username'] = $result['username'];
				$_SESSION['active'] = $result['active'];
				header("Location: ../main.php");
				exit();
			} else {
				header("Location: ../index.php?error=wrongpwd");
				exit();
			}
		} catch (PDOException $e) {
			header("Location: ../index.php?error=sqlerror");
			exit();
		}
	}
}
else if (isset($_POST['logout-submit']))
{
	session_start();
	session_unset();
	header("Location: ../index.php");
	exit();
}
else if (isset($_POST['guest-login-submit']))
{
	require 'dbh.inc.php';

	$mailuid = $_POST['mailuid'];
	$password = $_POST['pwd'];

	if (empty($mailuid) || empty($password)) {
		header("Location: ../main.php?guest=guest&error=emptyfields");
		exit();
	} else {
		try {
			$sql = "SELECT * FROM `users` WHERE `username`= :mailuid OR `email` = :mailuid";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(":mailuid", $mailuid);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			$passCheck = password_verify($password, $result['password']);
			if (!$result)
			{
				header("Location: ../main.php?guest=guest&error=nouser");
				exit();
			}
			if ($passCheck == false) {
				header("Location: ../main.php?guest=guest&error=wrongpwd");
				exit();
			} else if ($passCheck == true) {
				session_start();
				$_SESSION['userId'] = $result['user_id'];
				$_SESSION['username'] = $result['username'];
				$_SESSION['active'] = $result['active'];
				header("Location: ../main.php");
				exit();
			} else {
				header("Location: ../main.php?eguest=guest&error=wrongpwd");
				exit();
			}
		} catch (PDOException $e) {
			header("Location: ../main.php?guest=guest&error=sqlerror");
			exit();
		}
	}
}
else
{
	header("Location: ../main.php?guest=guest");
	exit();
}