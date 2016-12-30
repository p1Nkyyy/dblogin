<?php include 'header.php'; ?>
	<?php 
		if (isset($_SESSION['id'])) {
			echo "<p>Welcome: </p>" . $_SESSION['firstname'] . " " . $_SESSION['lastname'], "<br><br>";
		} else {
			echo "You are not logged in!";
		}

		$authenticated = $_SESSION['authenticated'];
		echo $_SESSION['authenticated'];
		echo $_SESSION['AuthCode'];

		if (!$Authenticated) {
			echo "Your account is not authenticated.";
			echo '<form action="email.php" method="POST" class="signup">
				<button action="submit" type="submit" value="Send test-email">Send ny verifiserings email</button>
				</form>';
		} else {
			echo "Your account is authenticated.";
		}
	 ?>
</body>
</html>