<?php
session_start();

if (isset($_POST['upload'])) {
	$conn = new PDO("mysql:host=localhost;dbname=camagru;", "root", "admins");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


	$user_id = $_SESSION['userId'];
	$image = base64_encode($_POST['upload']);

	try{
		$sql = "INSERT INTO `images` (`image_src`, `user_id`) VALUES (?, ?)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(1, $image);
		$stmt->bindParam(2, $user_id);
		$stmt->execute();

		header("Location: ../editor.php");
		exit();

	} catch (PDOException $e)
	{
		echo $e->getMessage();
	}
}


?>