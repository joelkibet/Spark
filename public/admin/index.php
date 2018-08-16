<?php require_once("../../resources/config.php");?>
<?php include(TEMPLATE_BACK . "/header.php"); ?>

<?php
if (!isset($_SESSION['username'])) {
    # code...
    redirect("../../public");
}


?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small></small>
                        </h1>
                    </div>


                </div>
                <!-- /.row -->

                 <?php

                    if ($_SERVER['REQUEST_URI'] == "/patakeja/public/admin/" || $_SERVER['REQUEST_URI'] == "/patakeja/public/admin/index.php" ) {
                        
                        include(TEMPLATE_BACK . "/admin_content.php");
                    }

                    if (isset($_GET['reservations'])) {
                        # code...
                        include(TEMPLATE_BACK . "/reservations.php");
                    }

                    if (isset($_GET['property'])) {
                        # code...
                        include(TEMPLATE_BACK . "/property.php");
                    }
                    
                    if (isset($_GET['add_property'])) {
                        # code...
                        include(TEMPLATE_BACK . "/add_property.php");
                    }

                    if (isset($_GET['edit_property'])) {
                        # code...
                        include(TEMPLATE_BACK . "/edit_property.php");
                    }

                    if (isset($_GET['categories'])) {
                        # code...
                        include(TEMPLATE_BACK . "/categories.php");
                    }


                   // echo $_SERVER['REQUEST_URI'];
                ?>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include(TEMPLATE_BACK . "/footer.php"); ?>
