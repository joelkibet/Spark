<?php
 require_once("../../config.php");

// Check if got the id from the GET REQUEST.
 if (isset($_GET['id'])) {
 	# code...
 	$query = query("DELETE FROM reservation WHERE reservation_id = " . escape_string($_GET['id']) . " ");
 	confirm($query);

 	set_message("Reservation deleted");
 	redirect("../../../public/admin/index.php?reservations");

 } else{

 	redirect("../../../public/admin/index.php?reservations");
 }


?>