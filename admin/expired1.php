<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Expired List</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">

		.srch
		{
			padding-left: 830px;

		}
		.form-control
		{
			width: 300px;
			height: 40px;
			background-color: black;
			color: white;
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
.container
{
	height: 600px;
	background-color: black;
	opacity: .8;
	color: white;
}
.scroll{
  height: 500px; 
  width: 100%;
  overflow: auto;
}
th td
{
  width: 50%;
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
                    echo "Welcome to the</br>Request Record ".$_SESSION['login_user']; 
                }
                ?>
            </div><br><br>

  <div class="h"><a href="Catalog.php">Catalog Record</a></div>
  <div class="h"><a href="staff_record.php">Staff Record</a></div>
  <div class="h"><a href="request.php">Request Record</a></div>
  <div class="h"><a href="issue_info.php">Issue Information</a></div>
  <div class="h"><a href="expired.php">Expired List</a></div>
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
  <?php
  if(isset($_SESSION['login_user']))
  {
    ?>

    <div class="srch">
    <br>
    <form method="post" action="" name="form1">
      <input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
      <input type="text" name="Id" class="form-control" placeholder="Product ID" required=""><br>
      <button class="btn btn-default" name="submit" type="submit">Submit</button><br>
    </form>
  </div>

    <?php 
    if(isset($_POST['Submit']))
    {
       $var1='<p style="color:white;background-color: red ">RETURNED</p>';
       mysqli_query($db,"UPDATE issue_book SET approval = '$var1' WHERE username = '$_POST[username]' and Id='$_POST[Id]'");
    }
  }

  ?>
  <h1 style="text-align: center;">Date expired list</h1>
    <?php
    $c=0;
    if(isset($_SESSION['login_user']))
    {
      $var='<p style="color:white;background-color: red ">EXPIRED</p>';
      $sql="SELECT student.username,email,contact,books.Id,Name,Authors,approval,Edition, issue, issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.Id=books.Id WHERE issue_book.approval ='$var' ORDER BY `issue_book`.`return` ASC";
      $res= mysqli_query($db,$sql);
      echo "<div class='scroll'>";
      echo "<table class='table table-bordered' >";
      echo "<tr style='background-color: #6db6b9e6;'>";
        //Table header
        
        echo "<th>"; echo "Username";  echo "</th>";
        echo "<th>"; echo "Email";  echo "</th>";
        echo "<th>"; echo "Contact";  echo "</th>";
        echo "<th>"; echo "Product ID";  echo "</th>";
        echo "<th>"; echo "Product Name";  echo "</th>";
        echo "<th>"; echo "Authors Name";  echo "</th>";
        echo "<th>"; echo "Status";  echo "</th>";
        echo "<th>"; echo "Edition";  echo "</th>";
        echo "<th>"; echo "Issue Date";  echo "</th>";
        echo "<th>"; echo "Return Date";  echo "</th>";
        
      echo "</tr>"; 
      

      while($row=mysqli_fetch_assoc($res))
      {
        
        echo "<tr>";
        echo "<td>"; echo $row['username']; echo "</td>";
        echo "<td>"; echo $row['email']; echo "</td>";
        echo "<td>"; echo $row['contact']; echo "</td>";
        echo "<td>"; echo $row['Id']; echo "</td>";
        echo "<td>"; echo $row['Name']; echo "</td>";
        echo "<td>"; echo $row['Authors']; echo "</td>";
        echo "<td>"; echo $row['approval']; echo "</td>";
        echo "<td>"; echo $row['Edition']; echo "</td>";
        echo "<td>"; echo $row['issue']; echo "</td>";
        echo "<td>"; echo $row['return']; echo "</td>";
        
        echo "</tr>";
      }
    echo "</table>";
    }


    ?>




  </div>


</div>
</body>
</html>
