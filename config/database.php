<?php
$DB_DSN =  "camagru";
$DB_USER = "root";
$DB_PASSWORD = "admins";

try {
	// $conn = new PDO("mysql:host=localhost;dbname=camagru;", "root", "admins");
	$conn = new PDO("mysql:host=localhost;dbname=". $DB_DSN .";", $DB_USER , $DB_PASSWORD);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// insert data into the users table of the database using PDO
	//$stmt = $conn->prepare("INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?,?,?)");
	//varables in order as in the prepare statement
	//$stmt->execute([$?,$?,$?]);

	// Update table $? = varable placement
	//$stmt = $conn->prepare("UPDATE user SET uidUsers where idUsers=1");
	//$stmt->execute([$?]);

	// Delete from a table
	//$stmt = $conn->("DELETE FROM users WHERE idUsers=1");
	//$stmt->execute();

	//Get data from users table
	//$stmt = $conn->prepare("SELECT uidUsers, email FROM users");
	//$stmt->execute();
	//while ($data = $stmt->fetch())
	//	echo $data['uidUser'] . "->" . $data['email'] . "<br>";
} catch (PDOException $e) {
	die("Connection failed: " . $e->getMessage());
}
