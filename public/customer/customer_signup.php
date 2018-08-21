<?php
   require 'dbconfig/config.php';
  //require_once("../../resources/config.php");

?>

<!DOCTYPE html>
<html>
<head>
<title>Registration </title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="background-color:#ccc">
  <header>
    <nav>

    </nav>
  </header>
   <div class="main-wrapper">
      <center>
        <h1>PataKeja Management System</h1> 
        <h2></h2>
        <img src="img/patakeja_logo.png" class="robot"/>

       </center>

      <form class="myform" action="" method="post">
          <label><b>First Name:</label><br>
          <input name="fname" type="text" class="inputvalues" placeholder="First Name" required/><br>
          <label><b>Last Name:</label><br>
          <input name="lname" type="text" class="inputvalues" placeholder="Last Name" required/><br>
          <label><b>Email:</label><br>
          <input name="email" type="email" class="inputvalues" placeholder="Email" required/><br>
          <label><b>Phone:</label><br>
          <input name="phone" type="text" class="inputvalues" placeholder="Phone Number" required/><br>
          <label><b>Username:</label><br>
          <input name="username" type="text" class="inputvalues" placeholder="Type your Username" required/><br>
          <label><b>Password:</label><br>
          <input name="password" type="password" class="inputvalues" placeholder="Your password" required/><br>
          <label><b>Confirm Password:</label><br>
          <input name="cpassword" type="password" class="inputvalues" placeholder="Confirm your password" requireds/><br>
           <input name="submit_btn" type="submit" id="signup_btn"value="Sign Up"/><br>
          <a href="customer_login.php"> <input type="button" id="back_btn"value="Back"/></a>

      </form>
      <?php
           if (isset($_POST['submit_btn']))
           {
             //echo ' <script type="text/javascript"> alert("Sign up button clicked.")</script>';
               $fname     = $_POST['fname'];
               $lname     = $_POST['lname'];
               $email     = $_POST['email'];
               $phone     = $_POST['phone'];
               $username  = $_POST['username'];
               $password  = $_POST['password'];
               $cpassword = $_POST['cpassword'];

               if ($password==$cpassword)
               {
                     $query = "select * from customer WHERE username='$username'";
                     $query_run = mysqli_query($con, $query);

                     if (mysqli_num_rows($query_run)>0)
                     {
                       // There is already a user with the same username
                       '<script type="text/javascript"> alert("User already exists... Try another username.")</script>';
                     }
                   else
                     {
                       $query = "insert into customer(fname, lname, email, phone, username, password) values('$fname','$lname','$email','$phone','$username','$password')";
                       $query_run = mysqli_query($con, $query);

                       if ($query_run)
                       {
                         echo '<script type="text/javascript"> alert("User Registered. Go to login page to login.")</script>';
                       }
                       else
                       {
                         echo '<script type="text/javascript"> alert("Error!!!.")</script>';
                       }
                     }

               }
               else
               {
                 echo '<script type="text/javascript"> alert("Password and Confirm Password does not match")</script>';
               }

           }

      ?>
   </div>
</body>
</html>
