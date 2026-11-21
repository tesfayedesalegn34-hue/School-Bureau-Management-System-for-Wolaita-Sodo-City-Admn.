<?php
session_start();
$con=mysqli_connect('localhost', 'root', '', 'multi_user');
?>
<html>
<head>
<title>WSSBMS</title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body id="contianer" style="padding:0px;">
<div id="bod">
<img src="logo.JPG" id="logo">
<div class="menu">
<ul>
   <li><a href="Menu.php">Home</a></li>
   <li><a>Services</a>
     <ul>
	    <li><a href="vacancy.php">Vacancy</a></li>
	    <li><a href="registration.php">Apply</a></li>
	    <li><a href="result.php">Result</a></li>
	 </ul>
    </li>
     <li><a>About Us</a>
     <ul>
	    <li><a href="abtbr.php">Bureau</a></li>
	    <li><a href="abttm.php">Team</a></li>
	 </ul>
    </li>
   <li><a href="contact.php">Contact Us</a></li>
   <li><a href="help.php">Help</a></li>
   </ul>
   </div>
   <div class="login">
   <form action="Menu.php" method="POST" onsubmit="return validateForm()">
   <img src="login.png" id="loginimg"/>
   <b>Login</b>
   <input type="text" name="username" value="" pattern="[a-zA-Z0-9\s]{3,100}" required xmoz-errormessage="please enter the username at least 3 char" placeholder="Username" id="username"/>
   <input type="password" name="password" value="" pattern="[a-zA-Z0-9\s]{3,100}" required xmoz-errormessage="please enter the password at above 3" placeholder="Password" id="password"/>
   <input type="submit" name="login" value="LOGIN" id="login" />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="forgotpassword.php"> Forgot Password </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   </form>
   <?php 
if(isset($_POST['login'])){
$username=($_POST['username']);
$password=($_POST['password']);
$q=mysqli_query($con,"select * from user where username='$username' AND password='$password'");
$row=mysqli_fetch_array($q);
$type=$row['UserType'];
$isexist=mysqli_query($con,"select * from user where username='$username' AND password='$password'");
$check_user=mysqli_num_rows($isexist);
if($check_user==1){
	$_SESSION["type"]=$row['UserType'];
	$_SESSION["username"]=$row['username'];
if($type=="Admin"){
	header("Location:Admin.php");
}
elseif($type=="Manager"){
	header("Location:Manager.php");
}
elseif($type=="School"){
	header("Location:School.php");
}

elseif($type=="Employee"){
	 header("Location:Employee.php");
}
}
else{
	echo '<strong><font color="green" size="5">invalid username or password!</font></Strong>';
	echo' <meta content="10;Menu.php" http-equiv="refresh" />';
}
}
?>
   </div>
   </div>
   </body>
   </html>
	 