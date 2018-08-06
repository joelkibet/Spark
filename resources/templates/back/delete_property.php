<?php
 require_once("../../config.php");

// Check if got the id from the GET REQUEST.
 if (isset($_GET['id'])) {
 	# code...
 	$query = query("DELETE FROM houses WHERE house_id = " . escape_string($_GET['id']) . " ");
 	confirm($query);

 	set_message("Property deleted");
 	redirect("../../../public/admin/index.php?property");

 } else{

 	redirect("../../../public/admin/index.php?property");
 }


?>