<?php
$servername = "localhost";
$dbUsername = "root";
$dbpwd = "admins";
$dbName = "camagru_users";

$conn = new PDO('mysql:host=localhost;dbName', 'dbUsername', 'dbpwd');
// $conn = mysql_connect($servername, $dbUsername, $dbpwd, $dbName);
echo "www";
if (!$conn)
{
	die("Connection failed: " . mysql_connect_error());
}
?>