<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title> ADD TO CART</title>
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
	height: 600px;
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
  height: 465px;
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
                    echo "<h3>Welcome </h3>".$_SESSION['login_user'];
                   

                ?>
            </div>
            <br>

   <div class="h"><a href="Catalog.php">Catalog Record</a></div>
  <div class="h"><a href="staff_record.php">Staff Record</a></div>
  <div class="h"><a href="request.php">Request Record</a></div>
  <div class="h"><a href="issue_info.php">Current Borrow Record</a></div>
  <div class="h"><a href="expired.php">Expired status Record</a></div>
  <div class="h"><a href="book_request.php">Customer Status</a></div>
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
	<h1 style="text-align: center;">Customer Request status</h1>
	<!-- ___________________Search bar______________-->

	<div class="srch">
		  <form class="navbar-form" method="post" name="form1">
		    <input class="form-control" type="text" name="search" placeholder="search ID..." required="">
		    <button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
		    <span class="glyphicon glyphicon-search"></span>
		    </button>
		  </form>
	 </div>
		
			<?php

			


			if(isset($_POST['submit']))
					{
						$q=mysqli_query($db,"SELECT student.username,contact,issue_book.Id,approval,issue,issue_book.return FROM issue_book, student WHERE issue_book.Id LIKE '%$_POST[search]%' and issue_book.username = student.username; ");

						if(mysqli_num_rows($q)==0)
						{
							echo "Sorry! No such ID found. Try Again!";
						}
						else
						{
						echo "<div class='scroll'>";
						echo "<table class='table table-bordered' >";
						echo "<tr style='background-color: #6db6b9e6;'>";
							//Table header
							
							echo "<th>"; echo "Customer Name";	echo "</th>";
							echo "<th>"; echo "Contact";	echo "</th>";
							echo "<th>"; echo "Item Id";	echo "</th>";
							echo "<th>"; echo "Approval Status";	echo "</th>";
							echo "<th>"; echo "Issue Date";  echo "</th>";
							echo "<th>"; echo "Return Date";  echo "</th>";
							
							
						echo "</tr>";	

						while($row=mysqli_fetch_assoc($q))
						{
							echo "<tr>";
							
							echo "<td>"; echo $row['username']; echo "</td>";
							echo "<td>"; echo $row['contact']; echo "</td>";
							echo "<td>"; echo $row['Id']; echo "</td>";
							echo "<td>"; echo $row['approval']; echo "</td>";
							echo "<td>"; echo $row['issue']; echo "</td>";
							echo "<td>"; echo $row['return']; echo "</td>";
							

							echo "</tr>";
						}
					echo "</table>";
						}
					}
					/*______if the button is not pressed___*/
					else
					{
						$res=mysqli_query($db,"SELECT student.username,contact,issue_book.Id,approval,issue,issue_book.return FROM issue_book,student WHERE issue_book.username = student.username;");
						echo "<div class='scroll'>";

						echo "<table class='table table-bordered' >";
						echo "<tr style='background-color: #6db6b9e6;'>";
								//Table header
							
							echo "<th>"; echo "Customer Name";echo "</th>";
							echo "<th>"; echo "Contact";echo "</th>";
							echo "<th>"; echo "Item Id";echo "</th>";
							echo "<th>"; echo "Approval Status";echo "</th>";
							echo "<th>"; echo "Issue Date"; echo "</th>";
							echo "<th>"; echo "Return Date"; echo "</th>";
							
						echo "</tr>";	

						while($row=mysqli_fetch_assoc($res))
						{
							echo "<tr>";
							
							echo "<td>"; echo $row['username'];echo "</td>";
							echo "<td>"; echo $row['contact'];echo "</td>";
							echo "<td>"; echo $row['Id'];echo"</td>";
							echo "<td>"; echo $row['approval']; echo "</td>";
							echo "<td>"; echo $row['issue'];echo "</td>";
							echo "<td>"; echo $row['return'];echo "</td>";
							

							echo "</tr>";
						}
					echo "</table>";
						}
				?>
</div>

</body>
</html>