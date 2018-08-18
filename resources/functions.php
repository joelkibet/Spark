<?php
$uploads = "uploads";
//Helper functions
function last_id(){

	global $connection;
	return mysqli_insert_id($connection);
}

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
             <a class="btn btn-primary" target="_blank" href="../resources/cart.php?add={$row['house_id']}">Reserve Here</a>
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

<a href='location.php?id={$row['location_id']}'class='list-group-item'>{$row['location_title']}</a>

DELIMETER;

echo $location_links;

}
 

}

// Function to get houses from cats table in the db.
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

// Function to get houses from location table in the db.
function get_houses_in_location(){

$query = query("SELECT * FROM houses WHERE house_location_id = " . escape_string($_GET['id']). " ");
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

			// Set a session to allow the user to log in.
			$_SESSION['username'] = $username;
			//set_message("Welcome to Admin {$username}");
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

function display_reservations(){

	$query = query("SELECT * FROM reservation");
	confirm($query);

	while ($row = fetch_array($query)) {

		//Create a deleimeter do display the info below
		$reservation = <<<DELIMETER

		<tr>
			<td>{$row['reservation_id']}</td>
			<td>{$row['reservation_amount']}</td>
			<td>{$row['reservation_transaction']}</td>
			<td>{$row['reservation_currency']}</td>
			<td>{$row['reservation_status']}</td>
			<td><a class="btn btn-danger" href="../../resources/templates/back/delete_reservation.php?id={$row['reservation_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
		</tr>


DELIMETER;

echo $reservation;	

	}
}


/**************** FUNCTION TO DISPLAY IMAGE********************/
function dispaly_image($picture){
	global $uploads;

	return $uploads . DS . $picture; 
}

/**************** PROPERTIES IN ADMIM********************/

function get_property_in_admin(){

$query = query("SELECT * FROM houses");
confirm($query);

while ($row = fetch_array($query)) {

$category = display_house_category_title($row['house_category_id']);
$location = display_house_location_title($row['house_location_id']);
	
$houses = <<<DELIMETER

<tr>
    <td>{$row['house_id']}</td>
    <td>{$row['house_title']}<br><a href="index.php?edit_property&id={$row['house_id']}"><img src="{$row['house_image']}" alt=""></a></td>
    <td>{$category}</td>
    <td>{$location}</td>
    <td>{$row['house_price']}</td>
    <td>{$row['quantity']}</td>
    <td><a class="btn btn-danger" href="../../resources/templates/back/delete_property.php?id={$row['house_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
</tr>

DELIMETER;

echo $houses;
}

}

/**************** DISPLAYING CATEGORY TITLE IN ADMIM********************/

function display_house_category_title($house_category_id){

	$category_query = query("SELECT * FROM  categories WHERE cat_id = '{house_category_id}' ");
	confirm($category_query);

	while ($category_row = fetch_array($category_query)) {
		
		return $category_row['cat_title'];
	}
}

/**************** DISPLAYING LOCATION TITLE IN ADMIM********************/

function display_house_location_title($house_location_id){

	$location_query = query("SELECT * FROM  location WHERE location_id = '{house_house_id}' ");
	confirm($location_query);

	while ($location_row = fetch_array($location_query)) {
		
		return $location_row['location_title'];
	}
}



/**************** ADDING PROPERTIES IN ADMIM********************/

function add_property(){

	if (isset($_POST['publish'])) {
		# code...
		$target = "../../uploads/";

		$house_title = escape_string($_POST['house_title']);
		$house_category_id = escape_string($_POST['house_category_id']);
		$house_location_id = escape_string($_POST['house_location_id']);
		$house_price = escape_string($_POST['house_price']);
		$house_reservation_fee = escape_string($_POST['house_reservation_fee']);
		$quantity = escape_string($_POST['quantity']);
		$house_description = escape_string($_POST['house_description']);
		$short_desc = escape_string($_POST['short_desc']);
		$house_image = escape_string($_FILES['house_image']['name']);
		$image_temp_location = escape_string($_FILES['house_image']['tpm_name']);

		move_uploaded_file($image_temp_location, UPLOAD_DIRECTORY . DS . $house_image);


		

		$query = query("INSERT INTO houses(house_title, house_category_id, house_location_id, house_price, house_reservation_fee, quantity, house_description, short_desc, house_image) VALUES('{$house_title}','{$house_category_id}','{$house_location_id}','{$house_price}','{$house_reservation_fee}','{$quantity}','{$house_description}','{$short_desc}','{$house_image}') ");

		$last_id = last_id();
		confirm($query);
		set_message("New Property {$last_id} successfully added.");
		redirect("index.php?property");



			}
}

/**************** FUNCTION TO GET LOCATION FROM DB********************/

function get_location_in_admin(){

$query = query("SELECT * FROM location");
confirm($query);

while ($row = fetch_array($query)){
			
$location_options = <<<DELIMETER

 <option value="{$row['location_id']}">{$row['location_title']}</option>

DELIMETER;

echo $location_options;

}
 

}

function show_categories_add_page(){

$query = query("SELECT * FROM categories");
confirm($query);

while ($row = fetch_array($query)){
			
$category_options = <<<DELIMETER

 <option value="{$row['cat_id']}">{$row['cat_title']}</option>

DELIMETER;

echo $category_options;

}
 

}

/**************** EDITTING PROPERTIES IN ADMIM********************/

function edit_property(){

	if (isset($_POST['publish'])) {
		# code...
		$target = "../../uploads/";

		$house_title = escape_string($_POST['house_title']);
		$house_category_id = escape_string($_POST['house_category_id']);
		$house_location_id = escape_string($_POST['house_location_id']);
		$house_price = escape_string($_POST['house_price']);
		$house_reservation_fee = escape_string($_POST['house_reservation_fee']);
		$quantity = escape_string($_POST['quantity']);
		$house_description = escape_string($_POST['house_description']);
		$short_desc = escape_string($_POST['short_desc']);
		$house_image = escape_string($_FILES['house_image']['name']);
		$image_temp_location = escape_string($_FILES['house_image']['tpm_name']);

		move_uploaded_file($image_temp_location, UPLOAD_DIRECTORY . DS . $house_image);

		$query = "UPDATE houses SET ";
		$query .= "house_title = '{$house_title}', ";
		$query .= "house_category_id = '{$house_category_id}', ";
		$query .= "house_location_id = '{$house_location_id}', ";
		$query .= "house_price = '{$house_price}', ";
		$query .= "house_reservation_fee = '{$house_reservation_fee}', ";
		$query .= "quantity = '{$quantity}', ";
		$query .= "house_description = '{$house_description}', ";
		$query .= "short_desc = '{$short_desc}', ";
		$query .= "house_image  = '{$house_image} ' ";
		$query .= "WHERE house_id" . escape_string($GET['id']);




		confirm($query);
		set_message("Property successfully updated.");
		redirect("index.php?property");



			}
}
/**************** CATEGORIES IN ADMIM********************/
function display_cats_in_admin(){

	$category_query = query("SELECT * FROM categories");
	confirm($category_query);

	while ($row = fetch_array($category_query)) {
		# code...
		$cat_id = $row['cat_id'];
		$cat_title = $row['cat_title'];

		$category = <<<DELIMETER

        <tr>
            <td>{$cat_id}</td>
            <td>{$cat_title}</td>
            <td><a href = "../../resources/templates/back/delete_category.php?id={$row['cat_id']}">Delete</a></td>
        </tr>

DELIMETER;

echo $category;

		
	}
}

function add_category(){

	if (isset($_POST['add_category'])) {
		# code...
		$cat_title = escape_string($_POST['cat_title']);

		$insert_cat = query("INSERT INTO categories (cat_title) VALUES('{$cat_title}') ");
		confirm($insert_cat);
		redirect("index.php?categories");
	}
}

/****************ADMIN USERS ********************/

function display_users(){
	$user_query = query("SELECT * FROM users");
	confirm($user_query);

	while ($row = fetch_array($user_query)) {
		# code...
		$user_id = $row['user_id'];
		$username = $row['username'];
		$email = $row['email'];
		$password= $row['password'];

		$user = <<<DELIMETER

        <tr>
            <td>{$user_id}</td>
            <td>{$username}</td>
            <td>{$email}</td>
            <td><a href = "../../resources/templates/back/delete_user.php?id={$row['user_id']}">Delete</a></td>
        </tr>

DELIMETER;

echo $user;

		
	}

}




?>