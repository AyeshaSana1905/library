<?php
	
	include "connection.php";
	include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Profile</title>
	<style type="text/css">
		.wrapper
		{
			width: 450px;
			margin: 0 auto;
			color: white;
		}

		.srch
		{
			padding-left: 1000px;
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
	</style>
</head>
<body style="background-color: #004528;">
	<!--_________________sidenav_______________-->
	
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color: white; margin-left: 60px; font-size: 20px;">

                <?php
                if(isset($_SESSION['login_user']))

                {
                    echo "Welcome Back </br>".$_SESSION['login_user']; 
                }
                ?>
            </div><br><br>

 
  <div class="h"><a href="Catalog.php">Catalog Record</a></div>
  <div class="h"><a href="staff_record.php">Staff Record</a></div>
  <div class="h"><a href="request.php">Request Record</a></div>
  <div class="h"><a href="issue_info.php">Current Borrow Record</a></div>
  <div class="h"><a href="expired.php">Expired status Record</a></div>
  <div class="h"><a href="book_request.php">Customer Status</a></div>

</div>
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

		<div class="wrapper">
			<?php
				$q=mysqli_query($db, "SELECT * FROM admin WHERE username = '$_SESSION[login_user]';" );
			?>
			<h2 style="text-align: center;">MY PROFILE</h2>
			<div style="text-align: center;">
					Welcome to this Library 
					
					<h4>
						<?php
							echo $_SESSION['login_user'];
						?>
					</h4>
			</div>
			<?php
			$row=mysqli_fetch_assoc($q);
			echo "<b>";
				echo "<table class='table table-bordered'>";
				echo "<tr>";
					echo "<td>";
					echo "<b>FIRST NAME:</b>";
					echo "</td>";

					echo "<td>";
					echo $row['first'];
					echo "</td>";
				echo "</tr>";

				echo "<tr>";
					echo "<td>";
					echo "<b>LAST NAME:</b>";
					echo "</td>";

					echo "<td>";
					echo $row['last'];
					echo "</td>";
				echo "</tr>";

				echo "<tr>";
					echo "<td>";
					echo "<b>USERNAME:</b>";
					echo "</td>";
			
					echo "<td>";
					echo $row['username'];
					echo "</td>";
				echo "</tr>";


				echo "<tr>";
					echo "<td>";
					echo "<b>PASSWORD:</b>";
					echo "</td>";
			
					echo "<td>";
					echo $row['password'];
					echo "</td>";
				echo "</tr>";

				echo "<tr>";
					echo "<td>";
					echo "<b>EMAIL:</b>";
					echo "</td>";
			
					echo "<td>";
					echo $row['email'];
					echo "</td>";
				echo "</tr>";

				echo "<tr>";
					echo "<td>";
					echo "<b>CONTACT:</b>";
					echo "</td>";
			
					echo "<td>";
					echo $row['contact'];
					echo "</td>";
				echo "</tr>";


				echo "</table>";

			echo "</b>";
			?>
		</div>
		
	</div>

</body>
</html>