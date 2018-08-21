<?php
 require_once("../resources/config.php");
 //session_start();
 ?>
<div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="explore.php">Explore</a>
                    </li>
                     <li>
                        <a href="checkout.php">Checkout</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                    <li>
                        <a href="account.php">Account</a>
                    </li>
                    <li>
                        <a href="about_us.php">About Us</a>
                    </li>
                    <li>
                        <a href="admin"></a>
                    </li>

                </ul>
                <ul class="nav navbar-right top-nav">
                  <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $_SESSION['username'];?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                           
                            <li class="divider"></li>
                            <li>
                                <a href="customer/customer_login.php"><i class="fa fa-fw fa-power-on"></i>Create Account</a>
                            </li>
                            <li>
                                <form action="index.php" method="POST">
                                    <a href="index.php"><input type="button" name="logout" value="Log Out"></a>
                                </form>
                                <?php
                                      if(isset($_POST['logout']))
                                      {
                                        session_destroy();
                                        header('location:index.php');
                                      }
                                ?>
                               <!-- <a href="client_logout.php"><i class="fa fa-fw fa-power-off"></i> Sign Out</a> -->
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>