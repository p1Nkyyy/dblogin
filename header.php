<?php 
	session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login system</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
</head>
<body>

	<header>
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="placeholder.php">My account</a></li>

				<?php 
					if (isset($_SESSION['id'])) {
						echo "<form action='includes/logout.inc.php'>
							<button>Log out!</button>
							</form>";
					} else {
						echo "<form action='includes/login.inc.php' method='POST'>
								<input type='text' name='username' placeholder='Username'>
								<input type='password' name='pwd' placeholder='Password'>
								<button type='submit'>Login</button>
							</form>"; 
					}
				?>

				<li><a href="signup.php">Sign up</a></li>
			</ul>
		</nav>
	</header>