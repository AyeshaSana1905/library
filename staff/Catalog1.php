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
			padding-left: 850px;

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
  height: 500px;
  overflow: auto;

  }

	</style>
</head>
<body>
<div class="container">
    <h1 style="text-align: center;">Catalog Record for Library</h1>
	<!-- ___________________Search bar______________-->

	<div class="srch">
		  <form class="navbar-form" method="post" name="form1">
		    <input class="form-control" type="text" name="search" placeholder="search books.." required="">
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
				echo "<th>"; echo "Book-Name";  echo "</th>";
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
			echo "<table class='table table-bordered' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Book-Name";  echo "</th>";
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
</body>
</html>