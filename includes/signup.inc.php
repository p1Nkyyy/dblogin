<?php 
	session_start();
	include '../dbh.php';

	$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['pwd']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$profileimg = mysqli_real_escape_string($conn, $_POST['profileimg']);
	$authenticationCode = mysqli_real_escape_string($conn, $_POST['AuthCode']);

	if(empty($firstname)) {
		header("Location: ../signup.php?error=empty");
		exit();
	}
	if(empty($email)) {
		header("Location: ../signup.php?error=empty");
		exit();
	}
	if(empty($lastname)) {
		header("Location: ../signup.php?error=empty");
		exit();
	}
	if(empty($username)) {
		header("Location: ../signup.php?error=empty");
		exit();
	}
	if(empty($password)) {
		header("Location: ../signup.php?error=empty");
		exit();
	}  else {
		$sql = "SELECT uid FROM users WHERE username='$username'";
		$result = mysqli_query($conn, $sql);
		$usernameCheck = mysqli_num_rows($result);
			if($usernameCheck > 0)  {
			header("Location: ../signup.php?error=username");
			exit(); 
	} else {
			$authCode = substr(md5(uniqid(mt_rand(), true)) , 0, 8);
			$hashpwd = password_hash($password, PASSWORD_DEFAULT);
			$sql = "INSERT INTO users (firstname, lastname, email, username, pwd, authCode) VALUES ('$firstname', '$lastname', '$email', '$username', '$hashpwd', '$authCode')";

			$result = mysqli_query($conn, $sql);

			header("Location: ../index.php");
		}
	}