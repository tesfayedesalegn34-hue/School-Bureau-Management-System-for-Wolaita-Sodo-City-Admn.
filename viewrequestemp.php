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
	width:200px;
	height:40px;
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
	margin-left:150px;
}
</style>
</head>
<body>
<img src="logo.JPG" id="logo" width="100%"; height="100";>
<div class="menu">
<ul>
   <li><a>Post</a>
     <ul>
	    <li><a href="postvacancy.php">Vacancy</a></li>
	    <li><a href="postresult.php">Result</a></li>
	 </ul>
    </li>
     <li><a>View</a>
     <ul>
	    <li><a href="viewregistration.php">Registration</a></li>
		<li><a href="viewrequestemp.php">Request Employee</a></li>
	    <li><a href="vwempcomplain.php">Employee Complain</a></li>
		 <li><a href="vwschoolcomplain.php">School Complain</a></li>
	 </ul>
    </li>
	     <li><a>Manage Employee</a>
     <ul>
	    <li><a href="manageemployee.php">Add</a></li>
	    <li><a href="searchemployee.php">Seach</a></li>
	 </ul>
    </li>
   <li><a>Setting</a>
     <ul>
	    <li><a href="logout.php">Logout</a></li>
	    <li><a href="Managercp.php">Change Password</a></li>
	 </ul>
    </li>
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
   </div><br><br>
  <?php
  if(!isset($_SESSION['username'])){
  header("Location:Menu.php");
  }
  elseif($_SESSION['type']!=='Manager'){
  header("Location:Menu.php");
  }
   ?>
   <?php
  $sql="SELECT * FROM requistation";
	$result = mysqli_query($con, $sql);
    if(!$result){
    die("no new information".mysql_error());
    }
    // output data of each row
     while($row1 = mysqli_fetch_array($result))
{
	        echo"<br><br><br>";
			echo"<table id='eee' align='center' width='300px' height='220px'>";
			echo"<tr><td></td><td align='right'>";
			echo"<tr>";
			echo"<td><b>Requistation Date:</b></td>";
			echo'<td>';
			echo $row1['RequistationDate']."</td></tr>";
			echo"<td><b>Requistation Number:</b></td>";
			echo'<td>';
			echo $row1['RequistationNumber']."</td></tr>";	
			echo"<td><b>School Name:</b></td>";
			echo'<td>';
			echo $row1['SchoolName']."</td></tr>";				
			echo"<td><b>Type of Position:</b></td>";
			echo'<td>';
			echo $row1['TypeofPosition']."</td></tr>";
			echo"<td><b>Department:</b></td>";									
			echo'<td>';
			echo $row1['Department']."</td></tr>";		
			echo"<td><b>Education Level:</b></td>";									
			echo'<td>';
			echo $row1['EducationLevel']."</td></tr>";						
			echo"<td><b>Quantity:</b></td>";
			echo'<td>';
			echo $row1['Quantity']."</td></tr>";								
			echo"<td><b>Term of Employee:</b></td>";
			echo'<td>';
			echo $row1['TermofEmployee']."</td></tr>";			
			echo"<td><b>Sex:</b></td>";
			echo'<td>';
			echo $row1['Sex']."</td></tr>";						
			echo"</table>";
}
?> 
   </body>
   </html>