<?php

//Helper functions

function set_message($msg){

	if (!empty($msg)) {
		
		$_SESSION['message'] = $msg;

	} else {	

		$msg = "";
	}
	
}

function display_message(){

	if (isset($_SESSION['message'])) {
		
		echo $_SESSION['message'];
		unset($_SESSION['message']);  
	}
}


function redirect($location){

	header("location: $location");

}
function query($sql){

	global $connection;
	return mysqli_query($connection, $sql);
}

// to confirm that there are no querry errors
function confirm($result){

	global $connection;

	if (!$result) {
		die("QUERY FAILED" . mysqli_error($connection));
	}
}

// Function to prevent sql injection
function escape_string($string){

	global $connection;
	return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result){

	global $connection;
	return mysqli_fetch_array($result);
}

/****************FRONT END FUNCTIONS********************/

// Getting houses/property  from the db

function get_houses(){

$query = query("SELECT * FROM houses");
confirm($query);

while ($row = fetch_array($query)) {
	
$houses = <<<DELIMETER

<div class="col-sm-4 col-lg-4 col-md-4">
    <div class="thumbnail">
        <a href= "item.php?id={$row['house_id']}"><img src="{$row['house_image']}" alt=""></a>
        <div class="caption">
            <h4 class="pull-right">Ksh {$row['house_price']}</h4>
            <h4><a href="item.php?id={$row['house_id']}">{$row['house_title']}</a>
            </h4>
            <p>Visit our site and find your dream home from vast range of available properties.</p>
             <a class="btn btn-primary" target="_blank" href="cart.php?add={$row['house_id']}">Reserve Here</a>
        </div>
        

    </div>
</div>

DELIMETER;

echo $houses;
}

}

// Function to get house categories and display them on the home page.
function get_categories(){

$query = query("SELECT * FROM categories");
confirm($query);

while ($row = fetch_array($query)){
			
$category_links = <<<DELIMETER

<a href='category.php?id={$row['cat_id']}'class='list-group-item'>{$row['cat_title']}</a>

DELIMETER;

echo $category_links;

}
 

}


// Function to get house location and display them on the home page.
function get_location(){

$query = query("SELECT * FROM location");
confirm($query);

while ($row = fetch_array($query)){
			
$location_links = <<<DELIMETER

<a href='category.php?id={$row['cat_id']}'class='list-group-item'>{$row['cat_title']}</a>

DELIMETER;

echo $location_links;

}
 

}

function get_houses_in_cats(){

$query = query("SELECT * FROM houses WHERE house_category_id = " . escape_string($_GET['id']). " ");
confirm($query);

while ($row = fetch_array($query)) {
	
$houses = <<<DELIMETER

<div class="col-sm-4 col-lg-4 col-md-4">
    <div class="thumbnail">
        <a href= "item.php?id={$row['house_id']}"><img src="{$row['house_image']}" alt=""></a>
        <div class="caption">
            <h4 class="pull-right">Ksh {$row['house_price']}</h4>
            <h4><a href="item.php?id={$row['house_id']}">{$row['house_title']}</a>
            </h4>
            <p>Choose a plan, buy or rent</p>
             <a class="btn btn-primary" target="_blank" href="item.php?id={$row['house_id']}">See details</a>
        </div>
        

    </div>
</div>

DELIMETER;

echo $houses;
}

}


//Getting properties for explore page
function get_houses_in_explore(){

$query = query("SELECT * FROM houses");
confirm($query);

while ($row = fetch_array($query)) {
	
$houses = <<<DELIMETER

<div class="col-sm-4 col-lg-4 col-md-4">
    <div class="thumbnail">
        <a href= "item.php?id={$row['house_id']}"><img src="{$row['house_image']}" alt=""></a>
        <div class="caption">
            <h4 class="pull-right">Ksh {$row['house_price']}</h4>
            <h4><a href="item.php?id={$row['house_id']}">{$row['house_title']}</a>
            </h4>
            <p>Check out our latest properties.</p>
             <a class="btn btn-primary" target="_blank" href="item.php?id={$row['house_id']}">Reserve Here</a>
        </div>
        

    </div>
</div>

DELIMETER;

echo $houses;
}

}

// Function to login the user

function login_user(){

	if (isset($_POST['submit'])) {

		$username = escape_string($_POST['username']);
		$password = escape_string($_POST['password']);

		$query = query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' ");
		confirm($query); // check for query errors

		// Check the number of rows queried from the db or if it found sth in the db(row count)
		if (mysqli_num_rows($query) == 0 ) {

			set_message("Your Password or Username is wrong!!");
			redirect("login.php");
		}else{

			redirect("admin");
		}

	}

}

// Function to send message by users.
function send_message(){

	if (isset($_POST['submit'])) {
		
		$to       =  "emailaddress@gmail.com";
		$name     =  $_POST['name'];
		$email    =  $_POST['email'];
		$subject  =  $_POST['subject'];
		$message  =  $_POST['message'];

		$headers = "From: {$name} {$email }"; // Taking the senders name & email.

		$result  = mail($to, $subject, $message, $headers);

		if (!$result) {
			set_message("Sorry we could not send your message");
		} else {
			set_message("Your message was sent.");
		}
		


	}
}
/****************BACK END FUNCTIONS********************/



?>