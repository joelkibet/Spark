<?php require_once("../resources/config.php");?>
<?php require_once("cart.php");?>

<?php include(TEMPLATE_FRONT .DS. "header.php");?>

<?php
if (isset($_SESSION['house_1'])) {
  # code...
  //echo $_SESSION['house_1'];
  //echo $_SESSION['property_total'];
}

?>


    <!-- Page Content -->
    <div class="container">


<!-- /.row --> 

<div class="row">

      <h4 class="text-center bg-danger" > <?php display_message(); ?> </h4>
      <h1>Reserve Property</h1>

<form action="">
    <table class="table table-striped">
        <thead>
          <tr>
           <th>Property</th>
           <th>Reservation Fee</th>
           <th>Available Units</th>
           <th>Rent Per Month</th>
     
          </tr>
        </thead>
        <tbody>
          <?php cart(); ?>
        </tbody>
    </table>
</form>



<!--  ***********CART TOTALS*************-->
            
<div class="col-xs-4 pull-right ">
<h2>Reservation Totals</h2>

<table class="table table-bordered" cellspacing="0">

<tr class="cart-subtotal">
<th>Properties:</th>
<td><span class="amount">
  <?php
    echo isset($_SESSION['property_units']) ? $_SESSION['property_units'] : $_SESSION['property_units'] = "0";
  ?>
</span></td>
</tr>
<tr class="shipping">
<th>Property and Handling</th>
<td>Not Reserved</td>
</tr>

<tr class="order-total">
<th>Reservation Total</th>
<td><strong><span class="amount">Ksh
  <?php
    echo isset($_SESSION['property_total']) ? $_SESSION['property_total'] : $_SESSION['property_total'] = "0";
  ?>
</span></strong> </td>
</tr>


</tbody>

</table>

</div><!-- CART TOTALS-->


 </div><!--Main Content-->

  <?php include(TEMPLATE_FRONT .DS. "footer.php");?>
