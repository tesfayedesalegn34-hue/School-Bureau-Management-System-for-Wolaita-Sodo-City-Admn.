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
	width:34%;
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
	width:160px;
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
<h1> Vacancy Post Form </h1>
<form method="POST" name="myForm" id="register" action="postvacancy.php" onsubmit="return validateForm()">
<label> Post Date:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="date" Id='date' name="postdate" size=20 required x-moz-errormessage="Enter vacancy post date"><br><br>
<label> Type of Position:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="pos"  id="pos" value=""pattern="[a-zA-Z\s]{3,100}" required xmoz-errormessage="Please Enter Letter Only Above 3 characters" placeholder="eg.Teacher,Doctor"><br><br>
<label> Department:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="department"  id="name" value=""pattern="[a-zA-Z\s]{3,100}" required xmoz-errormessage="Please Enter Letter Only Above 3 characters"><br><br>
<label> Educational Level:</label>&nbsp;&nbsp;&nbsp;
<input type="text" name="edu_level"  id="name" value=""pattern="[a-zA-Z\s]{3,100}" required x-moz-errormessage="Enter the required education level"><br><br>
<label> CGPA:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="gpa"  id="name" value="" required x-moz-errormessage="Enter the required CGPA"><br><br>
<label> Experience Year:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="experience"  id="name" value=""pattern="[a-zA-Z0-9\s]{1,100}" required x-moz-errormessage="Enter the required experience year"><br><br>
<label> Salary:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="number" name="salary"  id="name"  value="" min="500" max="10000" required="Please Enter the number b/n 500 and 10000"><br><br>

<label> Quantity:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="number" name="quantity"  id="name" value="" min="1" max="100" required="Please Enter the number b/n 1 and 100"><br><br>
<label> Term of Employment:</label>&nbsp;&nbsp;
<select id="name" name="termof"  required x-moz-errormessage="select term of employe" size="1">
<option value=""></option>
<option>Permanent</option>
<option>Temporary</option>
<option>Contract</option>
</select><br><br>
<label> Sex:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select id="name" name="sex"  required x-moz-errormessage="please select sex type" size="1">
<option value=""></option>
<option>Male</option>
<option>Female</option>
<option>Both</option>
</select><br><br>
<label> Age:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="age" id="rno"  required x-moz-errormessage="Enter Age"><br><br>
<label> Registration Start Date:</label>
<input type="date" Id='date' name="startDate" size=20 required x-moz-errormessage="Enter registration start date"><br><br>
<label> Registration End Date:</label>
<input type="date" Id='date' name="endDate" size=20 required x-moz-errormessage="Enter registration end date"><br><br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Submit" id="sub" name="send">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="reset" value="Reset" id="sub">
<?php
 if(isset($_POST['send'])){
$PostDate=($_POST['postdate']);
$Position=($_POST['pos']);
$Department=($_POST['department']);
$EdnLevel=($_POST['edu_level']);
$CGPA=($_POST['gpa']);
$Experience=($_POST['experience']);
$Salary=($_POST['salary']);
$Quantity=($_POST['quantity']);
$TermofReq=($_POST['termof']);
$Sex=($_POST['sex']);
$Age=($_POST['age']);
$RegStartDate=($_POST['startDate']);
$RegEndDate=($_POST['endDate']);
$q=mysqli_query($con, "insert into postvacancy(PostDate, Position, Department, EdnLevel, CGPA, Experience, Salary, Quantity, TermofReq, Sex, Age, RegStartDate, RegEndDate  ) 
           values('$PostDate','$Position', '$Department','$EdnLevel','$CGPA', $Experience, '$Salary','$Quantity', '$TermofReq','$Sex', $Age, '$RegStartDate','$RegEndDate')");
if($q){echo"Vacancy Registered Successfully";}
else{echo"Registration failed try again!";}
  }
?>
</form>
</div>
   </body>
   </html>