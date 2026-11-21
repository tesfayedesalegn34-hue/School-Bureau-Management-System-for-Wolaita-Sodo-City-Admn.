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
	padding:10px;
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
	top:220px;
	left:390px;
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
   <div class="register">
<h1> Post Result Form </h1>
<form method="POST" name="myForm" id="register" action="postresult.php" onsubmit="return validateForm()">
<label> First Name:</label><br>
<input type="text" name="Fname" id="name" value="" pattern="[a-zA-Z]{3,100}" required xmoz-errormessage="Please Enter Letter Only Above 3 characters" placeholder="Enter FirstName"><br><br>
<label> Middle Name:</label><br>
<input type="text" name="Mname" id="name" placeholder="Enter MiddleName" value=""pattern="[a-zA-Z]{3,100}" required xmoz-errormessage="Please Enter Letter Only Above 3 characters"><br><br>
<label> Last Name:</label><br>
<input type="text" name="Lname" id="name" placeholder="Enter Lastname" value=""pattern="[a-zA-Z]{3,100}" required xmoz-errormessage="Please Enter Letter Only Above 3 characters"><br><br>
<label> Mobile Number:</label><br>
<input type="tel" name="MNum" id="name" placeholder="Enter MobileNumber" value="" pattern="^\d{10}$" required="Please Enter 10 digits"><br><br>
<label> Average Point:</label><br>
<input type="number" name="Avept" id="name" placeholder="Enter AveragePoint" value="" min="0" max="100" required="Please Enter the number b/n 0 and 100"><br><br>
<label> Status:</label><br>
<select id="name" name="status"  required x-moz-errormessage="please select status" size="1">
<option value=""></option>
<option>Passed</option>
<option>Reserved</option>
<option>Failed</option>
</select><br><br>
<label> Placement:</label><br>
<input type="text" name="placement" id="name" placeholder="Enter Placement" value="" pattern="[a-zA-Z]{3,100}" required xmoz-errormessage="Please Enter Letter Only Above 3 characters"><br><br>
&nbsp;&nbsp;<input type="submit" value="Submit" id="sub" name="post">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="reset" value="Reset" id="sub">
   <?php
 if(isset($_POST['post'])){
$FirstName=($_POST['Fname']);
$MiddleName=($_POST['Mname']);
$LastName=($_POST['Lname']);
$MobileNumber=($_POST['MNum']);
$AveragePoint=($_POST['Avept']);
$Status=($_POST['status']);
$Placement=($_POST['placement']);
$q=mysqli_query($con, "insert into postresult(FirstName, MiddleName, LastName, MobileNumber, AveragePoint, Status, Placement) values('$FirstName', '$MiddleName', '$LastName', 
'$MobileNumber', '$AveragePoint', '$Status', '$Placement')");
if($q){echo"Registration Successfully";}
else{echo"Registration failed try again!";}
  }
?>
</form>
</div>
   </body>
   <?php
  if(!isset($_SESSION['username'])){
  header("Location:Menu.php");
  }
  elseif($_SESSION['type']!=='Manager'){
  header("Location:Menu.php");
  }
   ?>
   </html>