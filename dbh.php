<?php 
	$conn = mysqli_connect('localhost', 'root', 'root', 'usermgmt');

	if(!$conn) {
		die("Connection error: ".mysqli_connect_error());
	}
 ?>