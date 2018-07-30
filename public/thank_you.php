<?php require_once("../resources/config.php");?>
<?php include(TEMPLATE_FRONT .DS. "header.php");?>

<?php
  
  if (isset($_GET['tx'])) {
    // Performing a check for params from paypal.
    $amount = $_GET['amt'];
    $currency = $_GET['cc'];
    $transaction = $_GET['tx'];
    $status = $_GET['st'];

    // Creating a query and inserting the info in the database
    $query = query("INSERT INTO reservation (reservation_amount, reservation_transaction, reservation_status, reservation_currency)
      VALUES('{$amount}','{$currency}','{$transaction}','{$status}')");

    confirm($query);
    
    reports();
    //session_destroy();

  } else {
    
    redirect("index.php");

  }
  


?>
    <!-- Page Content starts here-->
  <div class="container">

    <h1 class="text-center">THANK YOU FOR USING OUR WEBSITE. VISIT US AGAIN!</h1>

  </div><!--Main Content ends here-->

  <?php include(TEMPLATE_FRONT .DS. "footer.php");?>
