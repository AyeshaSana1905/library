<?php
	
	session_start();

?>


<!DOCTYPE html>
<html>
<head>
	<title>
		Online Library Management System
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<style type="text/css">
	nav
	{
		float: right;
		word-spacing: 30px;
		padding: 20px;
		margin-top: 15px;
	}
	nav li 
	{
		display: inline-block;
		line-height: 80px;
		margin-top: -100px;
	}


	*{
		margin: 0;
		padding:0;
	}

	#vanta-canvas{
		width: 100%;
		height: 100vh;
	}

	header
{
    height: 55px;
    width: 1399px;
    background-color: #4D0303;
}
section
{
    height:650px;
    width: 1399px;
    background-color: black;
}


.box
{
    height: 300px;
    width: 450px;
    background-color: black;
    margin: 70px auto;
    opacity: 0.8;
    color: white;
    padding-left: 150px;  

a {
	color: white;
}



</style>
</head>


<body>

	<div class="wrapper">
		<header >
		<div class="logo">
			<!--<img src="images/9.jpg">-->
			<h1 style="color: white; margin-top: 32px;">ONLINE LIBRARY MANAGEMENT SYSTEM</h1>
		</div>

			<?php
			if(isset($_SESSION['login_user']))

			  {
				  	?>
				  	<nav>
						<ul>
							<li><a href="index.php">HOME</a></li>
							<li><a href="profile.php">PROFILE</a></li>
							<li><a href="logout.php">LOGOUT</a></li>
							<li><a href="Feedback.php">FEEDBACK</a></li>
						</ul>
					</nav>
					<?php

			  }
			  else
			  {
			  	?>
			  		<nav>
						<ul>
							<li><a href="index.php">HOME</a></li>
							<li><a href="Catalog1.php">CATALOG</a></li>
							<li><a href="login.php">LOGIN</a></li>
							<li><a href="registration.php">SIGN-UP</a></li>
							<li><a href="Feedback.php">FEEDBACK</a></li>
						</ul>
					</nav>
					<?php

			  }

			?>
		</header>
		<section id="animation">
			<!-- background scripts -->
			  <script src="js/grayscale.min.js"></script>
			    <script src="js/three.r95.min.js"></script>
			  <script src="js/vanta.net.min.js"></script>
			  <script>
			  VANTA.NET({
			  el: "#animation",
			  mouseControls: true,
			  touchControls: true,
			  minHeight: 200.00,
			  minWidth: 200.00,
			  scale: 1.00,
			  scaleMobile: 1.00,
			  color: 0xe31d1d,
			  backgroundColor: 0x0
			  })
			  </script>
			  <!-- END ANIMATION AND BANNER -->


		<div>
-->

			<br><br><br>


			<div class="box">
				<br><br><br><br>
				<a href="#" style="text-align: center; font-size: 70px;  text-decoration: none;position: relative; top: -32px; left: -26px;">WELCOME</a><br><br>
				<a href="#" style="text-align: center;font-size: 45px;  text-decoration: none;position: relative; top: -32px; left: -46px;">TO SANA's LIBRARY </a><br><br>
				<a href="#" style="text-align: center;font-size: 22px;  text-decoration: none; position: relative; top: -32px; left: -22px;"> The safest and easiest way to connect with</br></br>&nbsp &nbsp &nbsp &nbsp your desired collection of books. </a><br>

			</div>
		</div>
		</section>
	</div>
	<?php
		include "footer.php";
		?>
</body>

</html>