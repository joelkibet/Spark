<?php add_category(); ?>
        <div id="page-wrapper">

            <div class="container-fluid">

            

            

<h1 class="page-header">
  Property Categories

</h1>


<div class="col-md-4">
    
    <form action="" method="post">
    
        <div class="form-group">
            <label for="category-title">Title</label>
            <input name="cat_title" type="text" class="form-control">
        </div>

        <div class="form-group">
            
            <input name="add_category" type="submit" class="btn btn-primary" value="Add Category">
        </div>      


    </form>


</div>


<div class="col-md-8">

    <table class="table">
            <thead>

        <tr>
            <th>id</th>
            <th>Title</th>
            <th>Delete Cat</th>
        </tr>
            </thead>


    <tbody>
        <?php display_cats_in_admin(); ?>
    </tbody>

        </table>

</div>



                













            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
