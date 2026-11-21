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
	margin-left:40px;
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
	width:30%;
	margin:0px 0px 0px 430px;
	color:white;
	font-size:18px;
	padding:20px;
	border-radius:10px;
	position:absolute;
	top:220px;
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
#date{
	width:300px;
	border:none;     
	border-radius:3px;
	outline:0;
	padding:7px;
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
<h1> Employee Requistation Form </h1>
<form method="POST" name="myForm" id="register" action="requestemployee.php" onsubmit="return validateForm()">
<label> Reqistation Date:</label><br>
<input type="date" Id='date' name="date" size=20 required x-moz-errormessage="Enter requisition date" title="Please Enter Valid Registration Date"><br><br>
<label> Reqistation Number:</label><br>
<input type="number" name="Rno" id="rno" value="" min="0" max="2000" required x-moz-errormessage="Enter requisition number" title="Please Enter Valid Requestation Number Between 0 and 2000"><br><br>
<label> School Name:</label><br>
<input type="text" name="sname"  id="name" value=""pattern="[a-zA-Z\s]{3,100}"  required x-moz-errormessage="Enter the required school name" title="Please Enter Valid School Name Above 3 Character"><br><br>
<label> Type of Position:</label><br>
<input type="text" name="pos"  id="pos"  placeholder="eg.Teacher,Doctor" value=""pattern="[a-zA-Z\s]{3,100}" required xmoz-errormessage="Please Enter Letter Only Above 3 characters"title="Please Enter Valid Type of Position Above 3 Character"><br><br>
<label> Department:</label><br>
<input type="text" name="department"  id="name" value=""pattern="[a-zA-Z\s]{3,100}" required xmoz-errormessage="Please Enter Letter Only Above 3 characters" title="Please Enter Valid Department Above 3 Character"><br><br>
<label> Educational Level:</label><br>
<input type="text" name="edu_level"  id="name" value="" pattern="[a-zA-Z\s]{3,100}" required x-moz-errormessage="Enter the required education level" title="Please Enter Valid Education Level Above 3 Character"><br><br>
<label> Quantity:</label><br>
<input type="number" name="quantity"  id="name"  value="" min="1" max="100" required="Please Enter the number b/n 1 and 100" title="Please Enter Valid Requestation Number Between 1 and 100"><br><br>
<label> Term of Employment:</label><br>
<select id="name" name="termof"  required x-moz-errormessage="select term of employe" title="Please Select Valid Term of Employment" size="1">
<option value=""></option>
<option>Permanent</option>
<option>Temporary</option>
<option>Contract</option>
</select><br><br>
<label> Sex:</label><br>
<select id="name" name="sex"  required x-moz-errormessage="please select sex type" title="Please Select Valid Sex" size="1">
<option value=""></option>
<option>Male</option>
<option>Female</option>
<option>Both</option>
</select><br><br>

<input type="submit" value="Submit" id="sub" name="send">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="reset" value="Reset" id="sub"/><br><br>
<?php
 if(isset($_POST['send'])){
$ReqDate=($_POST['date']);
$ReqNo=($_POST['Rno']);
$SchoolName=($_POST['sname']);
$Position=($_POST['pos']);
$Department=($_POST['department']);
$EdnLevel=($_POST['edu_level']);
$Quantity=($_POST['quantity']);
$TermofRequ=($_POST['termof']);
$Sex=($_POST['sex']);
$q=mysqli_query($con, "insert into requistation(RequistationDate, RequistationNumber,SchoolName, TypeofPosition, Department, EducationLevel,Quantity, TermofEmployee, Sex ) 
values('$ReqDate','$ReqNo','$SchoolName', '$Position','$Department','$EdnLevel', $Quantity, '$TermofRequ','$Sex')");
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