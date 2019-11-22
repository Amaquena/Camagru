<?php
if (isset($_POST['submit-comment'])) {
	session_start();
	try {
		include "../config/database.php";
		$msg = htmlspecialchars($_POST['comment']);
		$userid = $_SESSION['userId'];
		$image_id = $_POST['img-id'];
		$loc = $_POST['loc'];

		$sql = "INSERT INTO `comments` (`comment`,`user_id`,`image_id`) VALUES (?, $userid, $image_id);";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(1, $msg);
		$stmt->execute();

		header("Location: " . $loc);
		exit();
	} catch (PDOException $e) {
		echo $e->getMessage();
		exit();
	}
} else if (isset($_POST['submit-like'])) {
	session_start();
	try {
		include "../config/database.php";
		$loc = $_POST['loc'];
		$image_id = $_POST['img-id'];
		$likes = $_POST['submit-like'];

		$sql = "INSERT INTO `likes` (`like`,`image_id`) VALUES ($likes, $image_id);";
		$stmt = $conn->prepare($sql);
		$stmt->execute();

		header("Location: " . $loc);
		exit();
	} catch (PDOException $e) {
		echo $e->getMessage();
		exit();
	}
} else {
	header("Location: ../gallery.php?page=1");
	exit();
}
