<?php require_once("../resources/config.php");?>
<?php include_once "client_header.php"; ?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Welcome to PataKeja</h2>
		<h3></h3>
		<h4 class="bg-success text-center"><?php //display_message(); ?></h4>
		<form class="signup-form" action="" method="POST">
				

			<input type="text" name="first" placeholder="First Name" required>
			<input type="text" name="last" placeholder="Last Name" required>
			<input type="text" name="phone" placeholder="Phone Number" required>
			<input type="email" name="email" placeholder="Email" required>
			<input type="text" name="uid" placeholder="Username" required>
			<input type="password" name="pwd" placeholder="Password" required>
			<button type="submit" name="submit">Sign Up</button>
		</form>
		<?php client_signup(); ?>
	</div>
</section>
<?php include_once "client_footer.php"; ?>