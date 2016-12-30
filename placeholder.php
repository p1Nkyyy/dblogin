<?php include 'header.php';
	  include 'dbh.php';
	if (!empty($_POST)) {
		$fn = $_POST['firstname'];
		$ln = $_POST['lastname'];
		$un = $_POST['username'];
		$uid = $_SESSION['id'];
		$update = "UPDATE users SET firstname = '$fn', lastname = '$ln' WHERE uid = $uid";
		$result = mysqli_query($conn, $update);
		if ($result) {
			$_SESSION['firstname'] = $fn;
			$_SESSION['lastname'] = $ln;
		} else {
			var_dump(mysqli_error($conn));
		}
	}
?>

<div class="wrap">
	<div class="account">
		<?php
			if (isset($_SESSION['firstname'])) {
				echo "<b>Brukernavn</b>: ";
				echo $_SESSION['username'], "<br>";
				echo "<b>Fornavn</b>: ";
				echo $_SESSION['firstname'], "<br>";
				echo "<b>Etternavn</b>: ";
				echo $_SESSION['lastname'], "<br>";
				echo "<b>Email: </b>";
				echo $_SESSION['email'];
				echo $_SESSION['AuthCode'];
				?>

				<img src="images/<?php echo $_SESSION['profileimg'] ?>">

				<form action="upload.php" method="post" enctype="multipart/form-data" class="signup">
				    Velg et profilbilde:
				    <input type="file" name="fileToUpload" id="fileToUpload" accept="image/gif, image/jpeg, image/png">
				    <input type="submit" value="Last opp profilbilde" name="submit">
				</form>

				<form method="POST" class="signup">
				Endre fornavn:
					<input type="text" name="firstname" placeholder="Fornavn" value="<?php echo $_SESSION['firstname'] ?>">
				Endre etternavn:
					<input type="text" name="lastname" placeholder="Etternavn" value="<?php echo $_SESSION['lastname'] ?>">
					<button action="submit" id="oppdater">Oppdater</button>
				</form>

				<form action="email.php" method="POST" class="signup">
				<button action="submit" type="submit" value="Send test-email">Send test-email</button>
				</form>
				<?php
			} else {
				echo "You are not logged in!";
			}
		 ?>
		 </div>
	</div>