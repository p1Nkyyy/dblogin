<?php 
	session_start();
	include '../dbh.php';

	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['pwd']);

	$sql = "SELECT * FROM users WHERE username='$username'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$hash_pwd = $row['pwd'];
	$hash = password_verify($password, $hash_pwd);

	if ($hash == 0) {
		header("Location: ../index.php?error=notworking");
		exit();
	} else {

		$sql = "SELECT * FROM users WHERE username='$username' AND pwd='$hash_pwd'";
		$result = mysqli_query($conn, $sql);

		if (!$row = mysqli_fetch_assoc($result)) {
			echo "Your username or password is incorrect";
		} else {
			$_SESSION['id'] = $row['uid'];
			$_SESSION['username'] = $row['username'];
			$_SESSION['firstname'] = $row['firstname'];
			$_SESSION['lastname'] = $row['lastname'];
			$_SESSION['profileimg'] = $row['profileimg'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['AuthCode'] = $row['AuthCode'];
			$_SESSION['authenticated'] = $row['authenticated'];
		}

		header("Location: ../index.php");
}