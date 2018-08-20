<?php require_once("../resources/config.php");?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body background="logo/background.jpg">
<header>
	<nav>

		<div class="main-wrapper">
			
			<div class="nav-login">
				<form class="" action="" method="POST">
					<input type="text" name="uid" placeholder="Username/email" required>
					<input type="password" name="pwd" placeholder="Password" required>
					<button type="submit" name="submit">Login</button>
				</form>
				<?php client_login(); ?>
				<a href="signup.php">Sign up</a>
			</div>
			
		</div>
	</nav>
</header>