<?php
 session_start();
 require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Welcome </title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#ccc">
  <header>
    <nav>
      
    </nav>
  </header>

   <div class="main-wrapper">
      <center>
        <h1>PataKeja Management System</h1>
        <h3></h3>
        <img src="img/patakeja_logo.png" class="robot"/>

       </center>

      <form class="myform" action="customer_login.php" method="post">
          <label><b>Username:</label><br>
          <input name="username" type="text" class="inputvalues" placeholder="Type your Username" required/><br>
          <label><b>Password:</label><br>
          <input name="password" type="password" class="inputvalues" placeholder="Type your password" required/><br>
          <input name="login" type="submit" id="login_btn" value="Login"/><br>
          <a href="customer_signup.php"><input type="button" id="register_btn" value="Register"/></a>

      </form>
      <?php
      if (isset($_POST['login']))
      {
        # code...
        $username=$_POST['username'];
        $password=$_POST['password'];

        $query="select * from customer WHERE username='$username' AND password='$password'";

        $query_run = mysqli_query($con, $query);
        if(mysqli_num_rows ($query_run)>0)
        {
          # code...
          //valid
          $_SESSION ['username']= $username;
          header('location:../index.php');
        }
        else
        {
          # code...
          //invalid
          echo '<script type="text/javascript"> alert("Invalid credentials.")</script>';
        }
      }

      ?>
   </div>
</body>
</html>
