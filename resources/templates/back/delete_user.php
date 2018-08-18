<?php
 require_once("../../config.php");

// Check if got the id from the GET REQUEST.
 if (isset($_GET['id'])) {
 	# code...
 	$query = query("DELETE FROM users WHERE user_id = " . escape_string($_GET['id']) . " ");
 	confirm($query);

 	set_message("User deleted");
 	redirect("../../../public/admin/index.php?users");

 } else{

 	redirect("../../../public/admin/index.php?users");
 }


?>

