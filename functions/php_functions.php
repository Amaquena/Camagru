<?php

function get_user_images($coll)
{
	try {
		$conn = new PDO("mysql:host=localhost;dbname=camagru;", "root", "admins");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// include '../config/database.php';

		$user_id = $_SESSION['userId'];

		$sql = "SELECT `image_src`, `image_id` FROM `images` WHERE `user_id` = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(1, $user_id);
		$stmt->execute();

		$res = $stmt->fetchAll(PDO::FETCH_COLUMN, $coll);
		return ($res);
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
}

function get_images()
{
	try {
		$conn = new PDO("mysql:host=localhost;dbname=camagru;", "root", "admins");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		// include '../config/database.php';
		// include($_SERVER['DOCUMENT_ROOT']."../config/database.php");
		
		
		$sql = "SELECT `image_src` FROM `images` ORDER BY `image_id` ASC";
		$stmt = $conn->prepare($sql);
		$stmt->execute();

		$res = $stmt->fetchAll(PDO::FETCH_COLUMN);
		return ($res);
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
}

function get_userid_images()
{
	try {
	$conn = new PDO("mysql:host=localhost;dbname=camagru;", "root", "admins");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "SELECT username FROM `images` JOIN `users` ON users.user_id = images.user_id ORDER BY `image_id` ASC";
	$stmt = $conn->prepare($sql);
	$stmt->execute();

	$res = $stmt->fetchALL(PDO::FETCH_COLUMN);
	return($res);
	} catch (PDOException $e)
	{
		echo $e->getMessage();
		exit();
	}
}

function in_array_r($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }
    return false;
}

?>