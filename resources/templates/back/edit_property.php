<?php


if (isset($_GET['id'])) {
  # code...
  $query = query("SELECT * FROM houses WHERE house_id = " . escape_string($_GET['id']). " ");
  confirm($query);

  while ($row = fetch_array($query)) {
    # code...
    $house_title = escape_string($row['house_title']);
    $house_category_id = escape_string($row['house_category_id']);
    $house_location_id = escape_string($row['house_location_id']);
    $house_price = escape_string($row['house_price']);
    $house_reservation_fee = escape_string($row['house_reservation_fee']);
    $quantity = escape_string($row['quantity']);
    $house_description = escape_string($row['house_description']);
    $short_desc = escape_string($row['short_desc']);
    $house_image = escape_string($row['house_image']);
  }

  edit_property(); 
}

?>
<div class="col-md-12">

<div class="row">
<h1 class="page-header">
   Edit Property Details
</h1>
</div> 

<form action="" method="post" enctype="multipart/form-data">

<div class="col-md-8">

<div class="form-group">
    <label for="product-title">Property Title </label>
        <input type="text" name="house_title" class="form-control" value="<?php //echo $house_title; ?>">
       
    </div>


    <div class="form-group">
           <label for="product-title">Property Description</label>
      <textarea name="house_description" id="" cols="30" rows="10" class="form-control"><?php // echo $house_description;?></textarea>
    </div>

    <div class="form-group row">

      <div class="col-xs-3">
        <label for="product-price">Property Price</label>
        <input type="number" name="house_price" class="form-control" size="60">
      </div>
    </div>

    <div class="form-group row">

      <div class="col-xs-3">
        <label for="product-price">Reservation Fee</label>
        <input type="number" name="house_reservation_fee" class="form-control" size="60">
      </div>
    </div>

     <div class="form-group">
           <label for="product-title">Short Description</label>
      <textarea name="short_desc" id="" cols="30" rows="2" class="form-control"></textarea>
    </div>

</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">

     <!-- Property Categories-->

    <div class="form-group">
         <label for="product-title">Property Category</label>
        <select name="house_category_id" id="" class="form-control">
            <option value="">Select Category</option>

            <?php show_categories_add_page(); ?>

        </select>


</div>

   <!-- Property Units-->

    <div class="form-group">
         <label for="product-title">Property Units</label>
         <input type="number" class="form-control" name="quantity">

    </div>

    <div class="form-group">
      <label for="product-title">Property Location</label>
         <select name="house_location_id" id="" class="form-control">
            <option value="">Select Location</option>

            <?php

              get_location_in_admin();


              ?>
           
         </select>
    </div>

    <!-- Property Image -->
    <div class="form-group">
        <label for="product-title">Property Image</label>
        <input type="file" name="house_image">
      
    </div>

     <div class="form-group">
        <input type="submit" name="edit" class="btn btn-primary btn-lg" value="Edit">
    </div>


</aside>
<!--SIDEBAR-->
   
</form>
