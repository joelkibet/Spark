<div id="page-wrapper">

            <div class="container-fluid">

             <div class="row">

<h1 class="page-header">
   All Properties

</h1>
<h3 class="bg-success text-center"><?php display_message(); ?></h3>
<table class="table table-hover">


    <thead>

      <tr>
           <th>Report Id</th>
           <th>Reservation Id</th>
           <th>House Title</th>
           <th>Reservation Amount</th>
           
      </tr>
    </thead>
    <tbody>

        <?php get_reports(); ?>
  </tbody>
</table>

                
      </div>

  </div>
            <!-- /.container-fluid -->
 </div>