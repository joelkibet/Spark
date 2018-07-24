<?php require_once("../resources/config.php");?>

<?php

if (isset($_GET['add'])) {
   
    $query = query("SELECT * FROM houses WHERE house_id=" . escape_string($_GET['add']). " ");
    confirm($query); // Ensure no error in the query sent.

    // Pulling the info fro the table(houses/properties)
    while ($row =  fetch_array($query)) {

        // Display only the property quantity in the db.
        if ($row['quantity'] != $_SESSION['house_' . $_GET['add']]) {
            
            $_SESSION['house_' . $_GET['add']] +=1;
            redirect("checkout.php");

        } else {

            set_message("We only have " . $row['quantity'] . " " ."{$row['house_title']}". " available");
            redirect("checkout.php");
        }
    }

   //$_SESSION['house_' . $_GET['add']] +=1;
   //redirect("index.php"); 

}

if (isset($_GET['remove'])) {
    # code...
    $_SESSION['house_' . $_GET['remove']]--;

    if ($_SESSION['house_' . $_GET['remove']] < 1) {
        
        unset($_SESSION['property_total']);
        unset($_SESSION['quantity']);

        redirect("checkout.php");

    } else {
        
        redirect("checkout.php");
    }
    

}

if (isset($_GET['delete'])) {

    $_SESSION['house_' . $_GET['delete']] = '0';

    unset($_SESSION['property_total']);
    unset($_SESSION['quantity']);

    redirect("checkout.php");


}

function cart(){

    $total = 0;
    $quantity = 0;

    //PayPal variables
    $item_name = 1;
    $item_number = 1;
    $amount = 1;
    $quantity = 1;

   foreach ($_SESSION as $name => $value) {

    if ($value > 0) {
         
        // Getting the product id using subtr.(Extracting the id from the session.)
        if (substr($name, 0, 6) == "house_") {

        $length = strlen($name);
        $id = substr($name, 6 , $length);
            
        $query = query("SELECT * FROM houses WHERE house_id = " . escape_string($id). " ");
        confirm($query);

        while ($row = fetch_array($query)) {

        $sub = $row['house_price']*$value;
        $reservation = $row['house_reservation_fee']*$value;
        $quantity +=$value;

        $houses = <<<DELIMETER

            <tr>
                <td>{$row['house_title']}</td>
                <td>{$reservation}</td>
                <td>{$value}</td>
                <td>{$sub}</td>
                <td><a class='btn btn-warning' href="cart.php?remove={$row['house_id']}"><span class='glyphicon glyphicon-minus'></span></a>             
                    <a class='btn btn-success' href="cart.php?add={$row['house_id']}"><span class='glyphicon glyphicon-plus'></span></a>
                    <a class='btn btn-danger' href="cart.php?delete={$row['house_id']}"><span class='glyphicon glyphicon-remove'></span></a>
                </td>
                
            </tr>

              <input type="hidden" name="item_name_{$item_name}" value="{$row['house_title']}">
              <input type="hidden" name="item_number_{$item_number}" value="{$row['house_id']}">
              <input type="hidden" name="amount_{$amount}" value="{$row['house_reservation_fee']}">
              <input type="hidden" name="quantity_{$amount}" value="{$value}">
DELIMETER;

echo $houses;

//Incrementing the values
    $item_name++;
    $item_number++;
    $amount++;
    $quantity++;

                 }

                 $_SESSION['property_total'] = $total += $reservation;
                 $_SESSION['quantity'] +=$value;
            
            }
         }

    }
function show_paypal() {

    if (isset($_SESSION['quantity']) && $_SESSION['quantity'] >=1) {
       
    $paypal_button = <<<DELIMETER

        <input type="image" name="upload"
    src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
    alt="PayPal - The safer, easier way to pay online">

DELIMETER;

    return $paypal_button;
    }

}
 
}


?>
