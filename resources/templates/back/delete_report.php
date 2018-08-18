<?php
 require_once("../../config.php");

// Check if got the id from the GET REQUEST.
 if (isset($_GET['id'])) {
 	# code...
 	$query = query("DELETE FROM reports WHERE report_id = " . escape_string($_GET['id']) . " ");
 	confirm($query);

 	set_message("Report Succesfully deleted");
 	redirect("../../../public/admin/index.php?reports");

 } else{

 	redirect("../../../public/admin/index.php?reports");
 }


?>