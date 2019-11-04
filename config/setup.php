<?php

try {

	$conn = new PDO("mysql:host=localhost", "root", "admins");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create database
	$sql = "CREATE DATABASE IF NOT EXISTS camagru;";
	$conn->exec($sql);
	$conn = null;

	// create users table
	include 'database.php';
	$sql = "CREATE TABLE IF NOT EXISTS `users` (
		`user_id` INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
		`username` TINYTEXT NOT NULL,
		`email` TINYTEXT NOT NULL,
		`password` TINYTEXT NOT NULL,
		`pp_src` TINYTEXT NOT NULL,
		`verified` BIT DEFAULT 0 NOT NULL
		);";
	$conn->exec($sql);
	$conn = null;

	// create image table
	include 'database.php';
	$sql = "CREATE TABLE IF NOT EXISTS `images`(
		`image_id` INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
		`image_src` TINYTEXT NOT NULL,
		`user_id` INT(11),
		FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`)
		);";
	$conn->exec($sql);
	$conn = null;

	// create comment table
	include 'database.php';
	$sql = "CREATE TABLE IF NOT EXISTS `comments`(
		`comment_id` INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
		`comment` TEXT NOT NULL,
		`user_id` INT(11),
		`image_id` INT(11),
		FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`),
		FOREIGN KEY (`image_id`) REFERENCES `images`(`image_id`)
		);";
	$conn->exec($sql);
}
catch(PDOException $e) {
    	echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>