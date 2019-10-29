<?php
if (isset($_POST['login-submit'])) {
	require 'dbh.inc.php';

	$mailuid = $_POST['mailuid'];
	$password = $_POST['pwd'];

	if (empty($mailuid) || empty($password)) {
		header("Location: ../index.php?error=emptyfields");
		exit();
	} else {
		try {
			$sql = "SELECT * FROM `users` WHERE `uidUsers` = :mailuid";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(":mailuid", $mailuid);
			$stmt->execute();
			$result = $stmt->fetchColumn();
			print_r($result);
			echo "hi";
		} catch (PDOException $e) {
			die("Connection failed: " . $e->getMessage());
			header("Location: ../index.php?error=sqlerror");
			exit();
		}
	}
} else {
	header("Location: ../index.php");
	exit();
}
