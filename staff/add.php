<?php
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>add record</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
		.srch
		{
			padding-left: 1000px;

		}
		
		body {
  background-image: url("images/999.jpg");
    background-repeat: no-repeat;
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #222;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: white;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
  color: white;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle
{
	margin-left: 20px;
}
.h:hover
{
	color:white;
	width: 300px;
	height: 50px;
	background-color: #00544c;
}

.book
{
    width: 400px;
    margin: 0px auto;
    color: black;
}
.form-control
{
  background-color: white;
  color: black;
  height: 40px;
}
.container
{
  height: 600px;
  background-color: black;
  opacity: .7;
  color: white;
}

	</style>


</head>
<body>
	<!--_________________sidenav_______________-->
	
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color: white; margin-left: 60px; font-size: 20px;">

                <?php
                if(isset($_SESSION['login_user']))

                { 

                    echo "Welcome to the </br>Libray Record"; 
                }
                ?>
            </div><br><br>
 <div class="h"><a href="Catalog.php">Catalog Record</a></div>
  <div class="h"><a href="add.php">Add New Record</a></div>
  <div class="h"><a href="issue_info.php">Current Borrow Record</a></div>
  <div class="h"><a href="expired.php">Expired status Record</a></div>
  <div class="h"><a href="book_request.php">Customer Status</a></div>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer; color: white;" onclick="openNav()">&#9776; open</span>
  <div class="container" style="text-align: center;">
    <h2 style="color:white; text-align: center"><b>Add New Record</b></h2>
    
    <form class="book" action="" method="post">
        
        <input type="text" name="Id" class="form-control" placeholder="Product Id" required=""><br>
        <input type="text" name="Name" class="form-control" placeholder="Product Name" required=""><br>
        <input type="text" name="Authors" class="form-control" placeholder="Authors Name" required=""><br>
        <input type="text" name="Edition" class="form-control" placeholder="Edition" required=""><br>
        <input type="text" name="Status" class="form-control" placeholder="Status" required=""><br>
        <input type="text" name="Quantity" class="form-control" placeholder="Quantity" required=""><br>
        <input type="text" name="Catagory" class="form-control" placeholder="Catagory" required=""><br>

        <button style="text-align: center;" class="btn btn-default" type="submit" name="submit">ADD</button>
    </form>
  </div>
<?php
    if(isset($_POST['submit']))
    {
      if(isset($_SESSION['login_user']))
      {
        mysqli_query($db,"INSERT INTO books VALUES ('$_POST[Id]', '$_POST[Name]', '$_POST[Authors]', '$_POST[Edition]', '$_POST[Status]', '$_POST[Quantity]', '$_POST[Catagory]') ;");
        ?>
          <script type="text/javascript">
            alert("Product has been added successfully.");
          </script>

        <?php

      }
      else
      {
        ?>
          <script type="text/javascript">
            alert("You need to login first!");
          </script>
        <?php
      }
    }
?>
</div>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "#024629";
}
</script>

</body>
