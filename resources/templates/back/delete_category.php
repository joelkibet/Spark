<?php
 require_once("../../config.php");

// Check if got the id from the GET REQUEST.
 if (isset($_GET['id'])) {
 	# code...
 	$query = query("DELETE FROM categories WHERE cat_id = " . escape_string($_GET['id']) . " ");
 	confirm($query);

 	set_message("Category deleted");
 	redirect("../../../public/admin/index.php?categories");

 } else{

 	redirect("../../../public/admin/index.php?categories");
 }


?>