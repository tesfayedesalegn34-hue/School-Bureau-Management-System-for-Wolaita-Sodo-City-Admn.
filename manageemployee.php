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
	height:1100px;
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
	width:35%;
	margin:0px 0px 0px 430px;
	color:white;
	font-size:18px;
	padding:20px;
	border-radius:10px;
	position:absolute;
	top:220px;
	left:300px;
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
#date{
	width:300px;
	border:none;
	border-radius:3px;
	outline:0;
	padding:7px;
	background-color:#d1d1d1;
}
#rno{
	width:300px;
	border:none;
	border-radius:3px;
	outline:0;
	padding:7px;
	background-color:#d1d1d1;
}
#pos{
	width:300px;
	border:none;
	border-radius:3px;
	outline:0;
	padding:7px;
	background-color:#d1d1d1;
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
	width:150px;
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
   <?php
  if(!isset($_SESSION['username'])){
  header("Location:Menu.php");
  }
  elseif($_SESSION['type']!=='Manager'){
  header("Location:Menu.php");
  }
   ?>
      <div class="register">
<h1> Register the Employee Form </h1>
<form method="POST" name="myForm" id="register" action="manageemployee.php" onsubmit="return validateForm()">
<label> First Name:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="fname"  id="name" value=""pattern="[a-zA-Z]{3,100}" required x-moz-errormessage="Enter the required First Name"><br><br>
<label> Middle Name:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="mname"  id="name" value=""pattern="[a-zA-Z]{3,100}" required x-moz-errormessage="Enter the required Middle Name"><br><br>
<label> Last Name:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="lname"  id="name" value=""pattern="[a-zA-Z]{3,100}" required x-moz-errormessage="Enter the required Last Name"><br><br>
<label> Birth Date:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="date" Id='date' name="birthdate" size=20 required x-moz-errormessage="Enter birth date"><br><br>
<label> Nationality:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="nationality"  id="name" value=""pattern="[a-zA-Z]{3,100}" required x-moz-errormessage="Enter the required CGPA"><br><br>
<label> Region:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="region"  id="name" value=""pattern="[a-zA-Z]{3,100}" required x-moz-errormessage="Enter the required Region"><br><br>
<label> Zone:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="zone"  id="name" value=""pattern="[a-zA-Z]{3,100}" required x-moz-errormessage="Enter the required Zone"><br><br>

<label> Woreda:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="woreda"  id="name" value=""pattern="[a-zA-Z]{3,100}" required x-moz-errormessage="Enter the required Woreda"><br><br>
<label> Kebele:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="kebele"  id="name" value=""pattern="[a-zA-Z\0-9]{3,100}" required x-moz-errormessage="Enter the required Kebele"><br><br>
<label> Phone Number:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="tel" name="phoneno"  id="name"  value="" pattern="^\d{10}$" required="Please Enter 10 digits"><br><br>
<label> Sex:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select id="name" name="sex"  required x-moz-errormessage="please select sex type" size="1">
<option value=""></option>
<option>Male</option>
<option>Female</option>
</select><br><br>
<label> Age:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="age" id="rno"  value="" min="18" max="99" required="Please Enter Above 18"><br><br>
<label> Education Level:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="edn_level" id="rno" value=""pattern="[a-zA-Z]{3,100}" required x-moz-errormessage="Enter education level"><br><br>
<label> Contact Person:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="contactperson" id="rno" value=""pattern="[a-zA-Z]{3,100}" required x-moz-errormessage="Enter conact person"><br><br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Submit" id="sub" name="send">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="reset" value="Reset" id="sub">
<?php
 if(isset($_POST['send'])){
$FirsName=($_POST['fname']);
$MiddleName=($_POST['mname']);
$LastName=($_POST['lname']);
$BirthDate=($_POST['birthdate']);
$Nationality=($_POST['nationality']);
$Region=($_POST['region']);
$Zone=($_POST['zone']);
$Woreda=($_POST['woreda']);
$Kebele=($_POST['kebele']);
$PhoneNo=($_POST['phoneno']);
$Sex=($_POST['sex']);
$Age=($_POST['age']);
$EdnLevel=($_POST['edn_level']);
$ContactPerson=($_POST['contactperson']);
$q=mysqli_query($con, "insert into addemployee(FirsName, MiddleName, LastName, BirthDate, Nationality, Region, Zone, Woreda, Kebele, PhoneNo, Sex, Age, edu_level, ContactPerson  ) 
           values('$FirsName','$MiddleName', '$LastName','$BirthDate','$Nationality', '$Region', '$Zone','$Woreda', '$Kebele','$PhoneNo', '$Sex', $Age, '$EdnLevel','$ContactPerson')");
if($q){echo"Registration Successfully";}
else{echo"Registration failed try again!";}
  }
?>
</form>
</div> 
   </body>
   </html>