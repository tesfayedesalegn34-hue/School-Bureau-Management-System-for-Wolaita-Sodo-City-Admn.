<?php
session_start();
$con=mysqli_connect('localhost', 'root', '', 'multi_user');
?>
<?php
  if(!isset($_SESSION['username'])){
  header("Location:Menu.php");
  }
  elseif($_SESSION['type']!=='Admin'){
  header("Location:Menu.php");
  }
?>
<html>
<head>
<title>WSSBMS</title>
<link rel="stylesheet" href="" type="text/css">
<script>
        function validateForm() {
            var fname = document.forms["CreateForm"]["fname"].value;
            var mname = document.forms["CreateForm"]["mname"].value;	
            var lname = document.forms["CreateForm"]["lname"].value;
            var mobilenum = document.forms["CreateForm"]["mobilenum"].value;
            var username = document.forms["CreateForm"]["username"].value;
            var password = document.forms["CreateForm"]["password"].value;
            var roll = document.forms["CreateForm"]["roll"].value;
            var status = document.forms["CreateForm"]["status"].value; 
            if (fname == null || fname == "") {
                alert("Please enter the First Name.");
                return false;
                } 
            if (mname == null || mname == "") {
                alert("Please enter the Middle Name.");
                return false;
            } 		
            if (lname == null || lname == "") {
                alert("Please enter the Last Name.");
                return false;
                } 
            if (mobilenum == null || mobilenum == "") {
                alert("Please enter the Mobile Number.");
                return false;
            } 	
            if (mobilenum.length<10) {
                alert("Phone number should be minimum 10 digits.");
                return false;
            }			
            if (username == null || username == "") {
                alert("Please enter the username.");
                return false;
                } 
            if (password == null || password == "") {
                alert("Please enter the password.");
                return false;
            }
            if (roll == null || roll == "") {
                alert("Please select UserType.");
                return false;
                } 
            if (status == null || status == "") {
                alert("Please select Status.");
                return false;
            }
        } 
</script>
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
	margin-left:250px;
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
	top:160px;
	left:490px;
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
   <li><a>Manage User Account</a>
     <ul>
	    <li><a href="createaccount.php">Create Account</a></li>
	    <li><a href="DisplayAccount.php">Display Account</a></li>
	 </ul>
    </li>
   <li><a>Setting</a>
     <ul>
	    <li><a href="logout.php">Logout</a></li>
	    <li><a href="Admincp.php">Change Password</a></li>
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
<h1> Create user </h1>
<form method="POST" name="CreateForm" id="register" action="createaccount.php" enctype="multipart/form-data" onsubmit="return validateForm()">
<label> First Name:</label><br>
<input type="text" name="fname" id="name" placeholder="Enter First Name" value=""pattern="[a-zA-Z]{3,100}" required xmoz-errormessage="Please Enter Letter Only Above 3 characters"><br><br>
<label> Middle Name:</label><br>
<input type="text" name="mname" id="name" placeholder="Enter Middle Name" value=""pattern="[a-zA-Z]{3,100}" required xmoz-errormessage="Please Enter Letter Only Above 3 characters"><br><br>
<label> Last Name:</label><br>
<input type="text" name="lname" id="name" placeholder="Enter Last Name" value=""pattern="[a-zA-Z]{3,100}" required xmoz-errormessage="Please Enter Letter Only Above 3 characters"><br><br>
<label> Mobile Number:</label><br>
<input type="tel" name="mobilenum" id="num" placeholder="Enter MobileNumber" value="" pattern="^\d{10}$" required="Please Enter 10 digits"><br><br>
<label> Username:</label><br>
<input type="text" name="username" id="name" placeholder="Enter Username" value=""pattern="[a-zA-Z0-9\s]{1,100}" required xmoz-errormessage="Please Enter valid username"><br><br>
<label> Password:</label><br>
<input type="password" name="password" id="name" placeholder="Enter password" value=""pattern="[a-zA-Z0-9\s]{1,100}" required xmoz-errormessage="Please Enter valid password"><br><br>
<label> Role:</label><br>
<select name="roll" id="name" required xmoz-errormessage="Please select required format"><option value="" selected > Select role </option>
<option value="Admin">ADMIN<option><br>
<option value="Manager">Manager<option><br>
<option value="School">School<option><br>
<option value="Employee">Employee<option></select><br><br>
<label> Image:</label><br>
<input type="file" name="fileToUpload" id="input" accept="images/" value="" required>
<input type="hidden" name="size" value="1000000"/><br><br>
<input type="submit" value="Submit" id="sub" name="registration_btn">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="reset" value="Cancel" id="sub"><br><br>
<?php 
 if(isset($_POST['registration_btn'])){
$FirstName=($_POST['fname']);
$MiddleName=($_POST['mname']);
$LastName=($_POST['lname']);
$username=($_POST['username']);
$MobileNumber=($_POST['mobilenum']);
$Password=($_POST['password']);
$type=($_POST['roll']);
$target_file = $_FILES['fileToUpload']['name'];
$target = "images/".basename($target_file);
$q=mysqli_query($con, "insert into user(FirstName, MiddleName, LastName, username, MobileNumber, Password, UserType,Profile) values('$FirstName', '$MiddleName', '$LastName', '$username',
'$MobileNumber', '$Password', '$type', '$target_file')");
if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target)) {
  		 echo"Registered Successfully!";
	
  	}else{
  		$msg = "Failed to register Please Try Again";
  	}
  }
  ?>
</form>
</div> 
   </body>
   </html>