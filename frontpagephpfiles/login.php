<?php
  include "connection.php";
  include "navbar.php";
  
?>
<!DOCTYPE html>
<html>
<head>

  <title>login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  
  <style type="text/css">
    section
    {
      margin-top: -20px;
    }
    .box1
      {
          height: 500px;
          width: 450px;
          background-color: black;
          margin: 0px auto;
          opacity: .7;
          color: white;
          padding: 20px;
      }
label
{
  font-size: 16px ;
  font-weight: 550;
}

  </style>   
</head>
<body>
<section>
  <div class="log_img">
   <br>
    <div class="box1">
        <h1 style="text-align: center; font-size: 35px;">Library Management System</h1>
        <h1 style="text-align: center; font-size: 25px;">User Login Form</h1><br>
      <form  name="login" action="" method="POST">
        <b><p style="padding-left: 50px; font-size: 15px; font-weight: 700;">
          Login As:
        </p></b>
        <input style="margin-left: 50px; width: 18px;" type="radio" name="user" id="admin" value="admin">
        <label>Admin</label>
        <input style="margin-left: 50px; width: 18px;" type="radio" name="user" id="student" value="student">
        <label>User</label>
        <input style="margin-left: 50px; width: 18px;" type="radio" name="user" id="staff" value="staff">
        <label>Staff</label>

        
        <div class="login">
          <input class="form-control" type="text" name="username" placeholder="Username" required=""> <br>
          <input class="form-control" type="password" name="password" placeholder="Password" required=""> <br>
          <input class="btn btn-default" type="submit" name="submit" value="Login" style="color: black; width: 70px; height: 30px"> 
        </div>
      
      <p style="color: white; padding-left: 15px;">
        <br><br>
        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
       &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp New to this website?<a style="color: white;" href="registration.php">Sign Up</a>
      </p>
    </form>
    </div>
  </div>
</section>

  <?php

    if(isset($_POST['submit']))
    {
      if($_POST['user']== 'student')
      { 
          $count=0;
      $res=mysqli_query($db,"SELECT * FROM `student` WHERE username='$_POST[username]' && password='$_POST[password]';");
      $count=mysqli_num_rows($res);

      if($count==0)
      {
        ?>
          <div class="alert alert-danger" style="width: 600px; margin-left: 370px; background-color: #de1313; color: white">
            <strong>The username and password doesn't match</strong>
          </div>    
        <?php
      }
      else
      {
        $_SESSION['login_user'] = $_POST['username']; 

        ?>
          <script type="text/javascript">
            window.location="person/profile.php"
          </script>
        <?php
      }
      }
      elseif ($_POST['user']== 'staff') {
      $count=0;
      $res=mysqli_query($db,"SELECT * FROM `staff` WHERE username='$_POST[username]' && password='$_POST[password]';");
      $count=mysqli_num_rows($res);

      if($count==0)
      {
        ?>
              <!--
              <script type="text/javascript">
                alert("The username and password doesn't match.");
              </script> 
              -->
          <div class="alert alert-danger" style="width: 600px; margin-left: 370px; background-color: #de1313; color: white">
            <strong>The username and password doesn't match</strong>
          </div>    
        <?php
      }
      else
      {
        $_SESSION['login_user'] = $_POST['username']; 

        ?>
          <script type="text/javascript">
            window.location="staff/profile.php"
          </script>
        <?php
      }



        
      }


    else
      {$count=0;
      $res=mysqli_query($db,"SELECT * FROM `admin` WHERE username='$_POST[username]' && password='$_POST[password]';");
      $count=mysqli_num_rows($res);

      if($count==0)
      {
        ?>
          <div class="alert alert-danger" style="width: 600px; margin-left: 370px; background-color: #de1313; color: white;">
            <strong>The username and password doesn't match</strong>
          </div>    
        <?php
      }
      else
      {
        $_SESSION['login_user'] = $_POST['username']; 

        ?>
          <script type="text/javascript">
            window.location="admin/profile.php"
          </script>
        <?php
      }
    }
    }

  ?>

</body>
</html>