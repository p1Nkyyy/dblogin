<?php
include 'dbh.php';
include 'header.php';

if (!empty($_POST)) {
		$fn = $_POST['authenticated'];
		$uid = $_SESSION['id'];
		$update = "UPDATE users SET authenticated = '1' WHERE uid = $uid";
		$result = mysqli_query($conn, $update);
		if ($result) {
			$_SESSION['authenticated'] = 1;
		} else {
			var_dump(mysqli_error($conn));
		}
	}
?>