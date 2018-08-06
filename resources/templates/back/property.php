
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
           <th>House Id</th>
           <th>Title</th>
           <th>Price</th>
           <th>Units</th>
      </tr>
    </thead>
    <tbody>

        <?php get_property_in_admin(); ?>
  </tbody>
</table>











                
                 


             </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
