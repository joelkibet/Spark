<?php require_once("../resources/config.php");?>

<?php include(TEMPLATE_FRONT .DS. "header.php");?>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            <h1>A Warm Welcome!</h1>
            <p>PataKeja is an online platform that helps here to locate your dream home and enabling you reserve it as you await to rent or purchase the property.</p>
            </p>
        </header>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Latest Properties</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">
            <?php get_houses_in_cats();?>

        </div>
        <!-- /.row -->

      
    </div>
    <!-- /.container -->

<?php include(TEMPLATE_FRONT .DS. "footer.php");?>