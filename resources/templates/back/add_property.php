<div class="col-md-12">

<div class="row">
<h1 class="page-header">
   Add Property
</h1>
</div>
        <?php add_property(); ?>       
<form action="" method="post" enctype="multipart/form-data">


<div class="col-md-8">

<div class="form-group">
    <label for="product-title">Property Title </label>
        <input type="text" name="house_title" class="form-control">
       
    </div>


    <div class="form-group">
           <label for="product-title">Property Description</label>
      <textarea name="house_description" id="" cols="30" rows="10" class="form-control"></textarea>
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
        <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Publish">
    </div>


</aside>
<!--SIDEBAR-->
   
</form>
