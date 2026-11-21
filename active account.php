<?php
session_start();
 $con=mysqli_connect('localhost', 'root', '', 'multi_user');
?>
<html>
<head>
<title>WSSBMS</title>
<link rel="stylesheet" href="" type="text/css">
<style>
body{
    background:url(bkimg.jpeg) no-repeat;
	background-size:100% 700px;
	background-size:cover;
	font-family:Arial;
	color:white;	
}
ul{
	margin:0px;
	padding:0px;
	list-style:none;
}
ul li {
	float:left;
	width:250px;
	height:50px;
	background-color:black;
	opacity:.8;
	line-height:40px;
	text-align:center;
	font-size:20px;
	margin-right:1px;
}
ul li a{
	text-decoration:none;
	color:white;
	display:block;
}
ul li a:hover{
	background-color:green;
}
ul li ul li {
	display:none;
}
ul li:hover ul li {
	display:block;
}
.menu{
	margin-left:250px;
}
</style>
</head>
<body>
<img src="logo.JPG" id="logo" width="100%"; height="100";>
<div class="menu">
<ul>
   <li><a>Manage User Account</a>
     <ul>
	    <li><a href="createaccount.php">Create Account</a></li>
	    <li><a href="active account.php">Delete Account</a></li>
	 </ul>
    </li>
   <li><a href="logout.php">Logout</a></li>
      	<li><?php 
	$sql="SELECT * FROM user where username='{$_SESSION['username']}'";
	$result = mysqli_query($con, $sql);
     while($row1 = mysqli_fetch_array($result))
{
			echo"<table>";
			echo"<tr>";
			echo'<td>';
			echo $row1['FirstName']."</td>";
			echo "<td>" ."<img class='img-circle' alt='Round shape image' width='100' height='75' src='images/".$row1['Profile']."'". "</td></tr>";	
			echo"</table>";
}
?></li>
   </ul>
   </div>
                            <?php
							$sql="SELECT * FROM user";
	                        $result = mysqli_query($con, $sql);
							$row1 = mysqli_fetch_array($result);
							if(!$result){
                            die("no new information".mysql_error());
                             }
							echo"<br><br><br>";							 
							 echo"<h3 align='center'>User Account</h3>";
							 echo"<table align='center' width='250px' height='170px' border='2'>";
			echo"<tr><th><b>FirstName</b></th><th><b>MiddleName</b></th><th><b>LastName</b></th><th><b>username</b>
			</th><th><b>MobileNumber</b></th><th><b>Password</b></th><th><b>UserType</b></th><th><b>Profile</b></th></tr>";
							 while($row1 = mysqli_fetch_array($result)){	
			echo"<tr>";
			echo"<tr><td>".$row1['FirstName']."</td>";
			echo"<td>".$row1['MiddleName']."</td>";
			echo"<td>".$row1['LastName']."</td>";
			echo"<td>".$row1['username']."</td>";
			echo"<td>".$row1['MobileNumber']."</td>";
			echo"<td>".$row1['Password']."</td>";
			echo"<td>".$row1['UserType']."</td>";
			echo "<td>" ."<img class='img-circle' alt='Round shape image' width='55' height='55' src='images/".$row1['Profile']."'". "</td></tr>";
			echo"</tr>";	
			}			
			echo"</table>";
		 ?>	
   </body>
   <?php
  if(!isset($_SESSION['username'])){
  header("Location:Menu.php");
  }
  elseif($_SESSION['type']!=='Admin'){
  header("Location:Menu.php");
  }
?>
   </html>