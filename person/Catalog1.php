<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Catalog</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
		.srch
		{
			padding-left: 800px;
		}

		body {
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
  color: #f1f1f1;
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
	color: white;
	width: 300px;
	height: 50px;
	background-color: #00544c;
	
}
.container
{
	height: 630px;
	background-color: black;
	opacity: .8;
	color: white;
}
body {
		background-image: url("images/999.jpg");
		background-repeat: no-repeat;
	  	font-family: "Lato", sans-serif;
	  	transition: background-color .5s;
}
.scroll
{
  width: 100%;
  height: 500px;
  overflow: auto;

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
                    echo "<h3>Welcome Back  </br>to the  Library</h3>";
                   

                ?>
            </div>
            <br>
 <div class="h"><a href="Catalog1.php">Catalog</a></div>
 <div class="h"><a href="Catalog.php">Borrow Request</a></div>
  <div class="h"><a href="book_request.php">Request Status</a></div>
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
<div class="container">
    <h1 style="text-align: center;">Catalog for this Library</h1>
	<!-- ___________________Search bar______________-->

	<div class="srch">
		  <form class="navbar-form" method="post" name="form1">
		    <input class="form-control" type="text" name="search" placeholder="search Name..." required="">
		    <button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
		    <span class="glyphicon glyphicon-search"></span>
		    </button>
		  </form>
	 </div>
	<?php

		if(isset($_POST['submit']))
		{
			$q=mysqli_query($db,"SELECT * FROM books WHERE Name LIKE '%$_POST[search]%' ");

			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No book found. Try Again!";
			}
			else
			{
			echo "<div class='scroll'>";
			echo "<table class='table table-bordered'>";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Name";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
				echo "<th>"; echo "Quantity";  echo "</th>";
				echo "<th>"; echo "catagory";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
				echo "<td>"; echo $row['Id']; echo "</td>";
				echo "<td>"; echo $row['Name']; echo "</td>";
				echo "<td>"; echo $row['Authors']; echo "</td>";
				echo "<td>"; echo $row['Edition']; echo "</td>";
				echo "<td>"; echo $row['Status']; echo "</td>";
				echo "<td>"; echo $row['Quantity']; echo "</td>";
				echo "<td>"; echo $row['Catagory']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
			}
		}
			/*______if the button is not pressed___*/
		else
		{

		$res=mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`name` ASC;");
			echo "<div class='scroll'>";
			echo "<table class='table table-bordered' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Name";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
				echo "<th>"; echo "Quantity";  echo "</th>";
				echo "<th>"; echo "catagory";  echo "</th>";
			echo "</tr>";	


			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				echo "<td>"; echo $row['Id']; echo "</td>";
				echo "<td>"; echo $row['Name']; echo "</td>";
				echo "<td>"; echo $row['Authors']; echo "</td>";
				echo "<td>"; echo $row['Edition']; echo "</td>";
				echo "<td>"; echo $row['Status']; echo "</td>";
				echo "<td>"; echo $row['Quantity']; echo "</td>";
				echo "<td>"; echo $row['Catagory']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
		}
	?>
</div>
</body>
</html>