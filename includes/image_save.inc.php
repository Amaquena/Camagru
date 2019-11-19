<?php
session_start();

if (isset($_POST['upload'])) {
	$conn = new PDO("mysql:host=localhost;dbname=camagru;", "root", "root");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


	$user_id = $_SESSION['userId'];
	$img = base64_encode($_POST['upload']);

	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	// $data = based64_encode($img);
	echo $img;
	// try{
	// 	$sql = "INSERT INTO `images` (`image_src`, `user_id`) VALUES (?, ?)";
	// 	$stmt = $conn->prepare($sql);
	// 	$stmt->bindParam(1, $image);
	// 	$stmt->bindParam(2, $user_id);
	// 	$stmt->execute();

	// 	header("Location: ../editor.php");
	// 	exit();

	// } catch (PDOException $e)
	// {
	// 	echo $e->getMessage();
	// }
}
