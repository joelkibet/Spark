<?php require_once("../../resources/config.php");?>
<?php include(TEMPLATE_BACK . "/header.php"); ?>


<div class="col-md-12">
<div class="row">
<h1 class="page-header">
   All Orders

</h1>
</div>

<div class="row">
<table class="table table-hover">
    <thead>

      <tr>
           <th>S.N</th>
           <th>Title</th>
           <th>Photo</th>
           <th>Quantity</th>
           <th>Invoice Number</th>
           <th>Reservation Date</th>
           <th>Status</th>
      </tr>
    </thead>
    <tbody>
        <tr>
            <td>21</td>
            <td>Bedsitter</td>

            <td><img src="http://placehold.it/62x62" alt=""></td>
            <td>2 units</td>
            <td>456464</td>
            <td>Jun 2018</td>
           <td>Completed</td>
        </tr>
        

    </tbody>
</table>
</div>

</div>
            <!-- /.container-fluid -->
</div>
        <!-- /#page-wrapper -->
<?php include(TEMPLATE_BACK . "/footer.php"); ?>
