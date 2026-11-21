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
h1{
	text-align:center;
    margin:0 0 10px;
    padding:0;
    color:#fff;
    font-size:24px;
   }
.box{
	background:rgba(0,0,0,.2);
	box-shadow:5px 4px 43px #000;
	position:absolute;
	top:40%;
	left:17%;
	width:500px;
	transform:translate(-50%, -50%);
}
input{
	position:relative;
	display:inline-block;
	font_size:20px;
	box-sizing:border-box;
	transition:.5s;
}
input[type="tel"]{
	background:#fff;
	width:340px;
	height:50px;
	border:none;
	outline:none;
	padding:0 25px;
	border-radius:25px 0 0 25px;
}
input[type="submit"]{
	position:relative;
	left:-5px;
	border-radius:0 25px 25px 0;
	width:150px;
	height:50px;
	border:none;
	outline:none;
	cursor:pointer;
}
input[tppe="submit"]:hover{
	background:#ff5722;
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
   <div class="box">
   <form method="POST" action="searchemployee.php" name="myForm" onsubmit="return validateForm()">
   <h1>Employe Record</h1>
   <input type="tel" name="result" value="" pattern="^\d{10}$" required="Please Enter 10 digits" placeholder="Enter Your Mobile Number">
   <input type="submit" name="search" value="Go">
   </form>
   </div>
   <?php
if(isset($_POST['search'])){
$PhoneNo=($_POST['result']);

$sql = "select * from addemployee where PhoneNo='$PhoneNo'";
$result = mysqli_query($con, $sql);
	$result = mysqli_query($con, $sql);
    if(!$result){
    die("no new information".mysql_error());
    }
    // output data of each row
     $row1=mysqli_fetch_array($result);
	        echo "<br><br><br><br><br><br><br><br><br><br><br>";
			echo"<table align='center' width='500px' height='470px'>";
			echo"<tr>";
			echo"<td><b>FirstName:</b></td>";
			echo'<td>';
			echo $row1['FirsName']."</td></tr>";
			echo"<td><b>MiddleName:</b></td>";
			echo'<td>';
			echo $row1['MiddleName']."</td></tr>";			
			echo"<td><b>LastName:</b></td>";
			echo'<td>';
			echo $row1['LastName']."</td></tr>";
			echo"<td><b>Birth Date:</b></td>";									
			echo'<td>';
			echo $row1['BirthDate']."</td></tr>";		
			echo"<td><b>Nationality:</b></td>";									
			echo'<td>';
			echo $row1['Nationality']."</td></tr>";						
			echo"<td><b>Region:</b></td>";
			echo'<td>';
			echo $row1['Region']."</td></tr>";								
			echo"<td><b>Zone:</b></td>";									
			echo'<td>';
			echo $row1['Zone']."</td></tr>";
			
			echo"<td><b>Woreda:</b></td>";
			echo'<td>';
			echo $row1['Woreda']."</td></tr>";
			echo"<td><b>Kebele:</b></td>";
			echo'<td>';
			echo $row1['Kebele']."</td></tr>";			
			echo"<td><b>PhoneNo:</b></td>";
			echo'<td>';
			echo $row1['PhoneNo']."</td></tr>";
			echo"<td><b>Sex:</b></td>";									
			echo'<td>';
			echo $row1['Sex']."</td></tr>";		
			echo"<td><b>Age:</b></td>";									
			echo'<td>';
			echo $row1['Age']."</td></tr>";						
			echo"<td><b>Education Level:</b></td>";
			echo'<td>';
			echo $row1['edu_level']."</td></tr>";								
			echo"<td><b>Contact Person:</b></td>";									
			echo'<td>';
			echo $row1['ContactPerson']."</td></tr>";
			echo"</table>";
	}
	?>
   </body>
   </html>