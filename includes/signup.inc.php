<?php
if (isset($_POST['signup-submit'])) {
	require 'config.php';

	$username = $_POST['uid'];
	$email = $_POST['mail'];
	$password = $_POST['pwd'];
	$passwordRepeat = $_POST['pwd-repeat'];
	if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
		header("Location: ../signup.php?error=emptyfields&uid=" . $username . "&mail=" . $email);
		exit();
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location: ../signup.php?error=invalidmailuid");
		exit();
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: ../signup.php?error=invalidmail&uid=" . $username);
		exit();
	} else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location: ../signup.php?error=invaliduid&mail=" . $email);
		exit();
	} else if ($password !== $passwordRepeat) {
		header("Location: ../signup.php?error=passwordcheck&uid=" . $username . "&mail=" . $email);
		exit();
	} else {
		try {
			// $sql = "SELECT COUNT(*) FROM `users` Where email=:mail";
			// $stmt = $conn->prepare($sql);
			// $stmt->bindParam(":mail", $email);
			// $stmt->execute();
			// $count = $stmt->fetchColumn();
			// if ($count > 0) {
			// 	header("Location: ../signup.php?error=mailtaken&uid=" . $username);
			// 	exit();
			// } else {
			// $sql = "INSERT INTO `users` (username, email, password) VALUES (?, ?, ?)";
			// $hashed =  password_hash($password, PASSWORD_DEFAULT);
			// $stmt = $conn->prepare($sql);
			// $stmt->bindParam(1, $username);
			// $stmt->bindParam(2, $email);
			// $stmt->bindParam(3, $hashed);
			// $stmt->execute();

			$sql = "SELECT * FROM `users` WHERE email=:mail";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(":mail", $email);
			$stmt->execute();

			$result = $stmt->fetchAll();

			if (isset($result)) {
				try {
					$mail_body = '
					<p>Hi ' . $username . ',</p>
					<p>Thanks for Registration.</p>
					<p>Please Open this link to verified your email address</p>
					<p>Best Regards,<br />John Doe</p>
					';
					require_once('PHPMailer/src/PHPMailer.php');

					$mail = new phpmailer();
					$mail->IsSMTP();
					$mail->SMTPAuth = true;
					$mail->SMTPSecure = 'ssl';
					$mail->Host = 'smtp.gmail.com';
					$mail->Port = '465';
					$mail->isHTML();
					$mail->Username = 'amaquena@student.wethinkcode.co.za';
					$mail->Password = 'Twinkie2000!';
					// $mail->SetFrom = 'no-reply@student.wethinkcode.co.z';
					$mail->Subject = 'Email Verication';
					$mail->Body = 'hello';
					$mail->AddAdress($email, $username);
					$mail->SMTPDebug  = 2;
					// $mail->FromName = 'John';
					// $mail->WordWrap = 50;
					if ($mail->Send()) {
						header("Location: ../index.php?success=regisered");
						exit();
					}
				} catch (Exception $e) {
					echo $mail->ErrorInfo;
				}
			}
			// }
		} catch (PDOException $e) {
			echo $e->getMessage();
			header("Location: ../signup.php?error=sqlerror");
			exit();
		}
	}
	$conn = null;
} else {
	header("Location: ../signup.php");
	exit();
}
