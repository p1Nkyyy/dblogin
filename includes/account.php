<?php include 'header.php'; ?>

	<?php 
		if (isset($_SESSION['firstname'])) {
			echo $_SESSION['username'];
			echo $_SESSION['firstname'];
			echo $_SESSION['lastname'];
		} else {
			echo "You are not logged in!";
		}
	 ?>