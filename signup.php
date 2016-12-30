<?php include 'header.php'; ?>

	<?php 

		$url = "http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];

		if(strpos($url, "error=empty") !== false) {
			echo "You left a field empty!";
		}

		elseif(strpos($url, "error=username") !== false) {
			echo "The username is already taken.";
		}

		if (isset($_SESSION["id"])) {
			echo "You are already logged in!";
		} else {
			?>
			<form action="includes/signup.inc.php" method="POST" class="signup">
			Fornavn
				<input type="text" name="firstname" placeholder="Firstname">
			Etternavn
				<input type="text" name="lastname" placeholder="Lastname">
			Email
				<input type="text" name="email" placeholder="Email">
			Brukernavn
				<input type="text" name="username" placeholder="username">
			Passord
				<input type="password" name="pwd" placeholder="password">
				<button action="submit">Sign up!</button>
			</form>
				<?php
		}
	 ?>
</body>
</html>