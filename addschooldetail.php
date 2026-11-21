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
	margin-left:30px;
}
h1{
	text-align:center;
	padding:20px;
	color:white;
	font-size:20px;
}
.register{
	background:rgba(0,0,0,.2);
	box-shadow:5px 4px 43px #000;
	width:25%;
	margin:0px 0px 0px 430px;
	color:white;
	font-size:18px;
	padding:20px;
	border-radius:10px;
	position:absolute;
	top:230px;
	left:400px;
}
#register{
	margin-left:50px;
}
label{
	color:white;
	font-family:sans-sarif;
	font-size:18px;
	font-style:italic;
}
#name{
	width:300px;
	border:none;
	border-radius:3px;
	outline:0;
	padding:7px;
	background-color:#d1d1d1;
}
#num{
	width:300px;
	padding:7px;
	border:none;
	border-radius:3px;
	outline:0;
	background-color:#d1d1d1;
}
#sub{
	width:100px;
	padding:7px;
	font-size:16px;
	font-family:sans-sarif;
	font-style:italic;
	font-weight;:600;
	border:none;
	border-radius:3px;
	outline:0;
}
#input
{
	width:200px;
	padding:7px;
	font-size:14px;
	font-family:sans-sarif;
	font-style:italic;
	font-weight;:400;
	border:none;
	border-radius:3px;
	outline:0;
}
</style>
</head>
<body>
<img src="logo.JPG" id="logo" width="100%"; height="100";>
<div class="menu">
<ul>
   <li><a>Manage School</a>
     <ul>
	    <li><a href="addschooldetail.php">Add</a></li>
	    <li><a href="updateschooldetail.php">Update</a></li>
	 </ul>
    </li>
	<li><a href="requestemployee.php">Request Employee</a></li>
     <li><a>View</a>
     <ul>
	    <li><a href="assignedemp.php">Assigned Employee</a></li>
	    <li><a href="vwstatus.php">Status</a></li>
	 </ul>
    </li>
	<li><a href="schoolcomplain.php">Give Complain</a></li>
   <li><a>Setting</a>
     <ul>
	    <li><a href="logout.php">Logout</a></li>
	    <li><a href="Schoolcp.php">Change Password</a></li>
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
   
   <div class="register">
<h1> Add School Detail </h1>
<form method="POST" id="register" action="addschooldetail.php" onsubmit="return validateForm()">
<label> School Name:</label><br>
<input type="text" name="sname" id="name" placeholder="Enter SchoolName" value=""pattern="[a-zA-Z\s]{3,100}" required xmoz-errormessage="Please Enter Letter Only Above 3 characters"><br><br>
<label> Telephone:</label><br>
<input type="tel" name="tnum" id="num" placeholder="Enter TelephoneNumber" value="" pattern="^\d{10}$" required="Please Enter 10 digits"><br><br>

<label> School Location:</label><br>
<input type="text" name="slocation" id="name" placeholder="Enter SchoolLocation" value=""pattern="[a-zA-Z\s]{3,100}" required xmoz-errormessage="Please Enter Letter Only Above 3 characters"><br><br>

<label> Number of Teacher in School:</label><br>
<input type="text" name="nteacher" id="name" placeholder="Enter Number of Teacher" value="" min="1" max="2000" required="Please Enter the number b/n 1 and 2000"><br><br>

<label> Number of Student in School:</label><br>
<input type="text" name="nstudent" id="name" placeholder="Enter Number of Student" value="" min="1" max="20000" required="Please Enter the number b/n 1 and 20000"><br><br>

<input type="submit" value="Submit" id="sub" name="save">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="reset" value="Reset" id="sub"/><br><br><br>
 <?php 
 if(isset($_POST['save'])){
$schoolName=($_POST['sname']);
$Telephone=($_POST['tnum']);
$schoolLocation=($_POST['slocation']);
$numofTeacher=($_POST['nteacher']);
$numofStudent=($_POST['nstudent']);
$q=mysqli_query($con, "insert into school(SchoolName, Telephone, SchoolLocation, NumberofTeacher, NumberofStudent) values('$schoolName','$Telephone', '$schoolLocation', '$numofTeacher','$numofStudent')");
if($q){echo"Registration Successfully";}
else{echo"Registration failed try again!";}
  }
  ?>
</form>
</div>
 <?php
  if(!isset($_SESSION['username'])){
  header("Location:Menu.php");
  }
  elseif($_SESSION['type']!=='School'){
  header("Location:Menu.php");
  }
?>
 </body>
   </html>