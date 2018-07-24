<?php require_once("../resources/config.php");?>

<?php include(TEMPLATE_FRONT .DS. "header.php");?>

    <!-- Page Content -->
<div class="container">

       <!-- Side Navigation -->

            <?php include(TEMPLATE_FRONT .DS. "side_nav.php");?>

<?php
 // Function to fetch properties from db based on their id
$query = query("SELECT * FROM houses WHERE house_id = " . escape_string($_GET['id']). " " );
confirm($query);

while ($row = fetch_array($query)): 


?>

<div class="col-md-9">

<!--Row For Image and Short Description-->

<div class="row">

    <div class="col-md-7">
       <img class="img-responsive" src="<?php echo $row['house_image'];?>" alt="">

    </div>

    <div class="col-md-5">

        <div class="thumbnail">
         

    <div class="caption-full">
        <h4><a href="#"><?php echo $row['house_title'];?></a> </h4>
        <hr>
        <h4 class=""><?php echo "Ksh" .$row['house_price'];?></h4>
        
        <p><?php echo $row['short_desc'];?></p>

   
    <form action="">
        <div class="form-group">
           <a href="cart.php?add=<?php echo $row['house_id']; ?>" class="btn btn-primary">Reserve Now</a>
        </div>
    </form>

    </div>
 
</div>

</div>


</div><!--Row For Image and Short Description-->


<!--Row for Tab Panel-->

<div class="row">

<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Locate property</a></li>

  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
           
<p><?php echo $row['house_description'];?></p>

    </div>
    <div role="tabpanel" class="tab-pane" id="profile">

  <div class="col-md-6">

       <h3>Property Location using Google map. </h3>


    </div>


    <div class="col-md-6">
        <h3>Add A review</h3>

     <form action="" class="form-inline">
        <div class="form-group">
            <label for="">Name</label>
                <input type="text" class="form-control" >
            </div>
             <div class="form-group">
            <label for="">Email</label>
                <input type="test" class="form-control">
            </div>

        <div>
            <h3>Your Rating</h3>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
        </div>

            <br>
            
             <div class="form-group">
             <textarea name="" id="" cols="60" rows="10" class="form-control"></textarea>
            </div>

             <br>
              <br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="SUBMIT">
            </div>
        </form>

    </div>

 </div>

 </div>

</div>


</div><!--Row for Tab Panel-->




</div> <!-- col-md-9 ends here -->

<?php endwhile; ?>

</div>
    <!-- /.container -->

   <?php include(TEMPLATE_FRONT .DS. "footer.php");?>

</body>

</html>
