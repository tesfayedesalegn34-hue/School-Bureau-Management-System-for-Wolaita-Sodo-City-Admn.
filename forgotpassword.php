<?php
session_start();
?>
<html>
<head>
<title>Fogotpassword</title>
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
h1{
	text-align:center;
	padding:10px;
	color:white;
	font-size:20px;
}
.menu{
	margin-left:150px;
}
.register{
	background:rgba(0,0,0,.2);
	box-shadow:5px 4px 43px #000;
	width:20%;
	margin:0px 0px 0px 430px;
	color:white;
	font-size:18px;
	padding:20px;
	border-radius:10px;
	position:absolute;
	top:300px;
	left:0px;
}
#register{
	margin-left:0px;
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
</style>
</head>
<body>
<img src="logo.JPG" id="logo" width="100%"; height="100";>
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
<div class="register">
<form  method="POST" action="forgotpassword.php" id="register">
<h1>Forgotpassword</h1> 
<label> Username:</label><br>
<input type="text" name="username" id="name" placeholder="Enter U R Username" value=""pattern="[a-zA-Z0-9]{3,100}" required xmoz-errormessage="Please Enter U R Username"><br><br>

<label> Role:</label><br>
<input type="text" name="role" id="name" placeholder="Enter U R Role" value="" pattern="[a-zA-Z]{5,8}" required xmoz-errormessage="Please Enter U R Role"><br><br>
<input type="submit" name="submit" value="Search" id="sub"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="reset" value="Reset" id="sub"/><br><br>
<?php
$con=mysqli_connect('localhost', 'root', '', 'multi_user');
if(isset($_POST['submit'])){
$username =$_POST['username'];
$type=$_POST['role'];

$sql = "select password from user where username='$username' AND UserType='$type'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
 while($row = mysqli_fetch_assoc($result)) {
 echo'<strong><font color="black">Hi</font> </Strong>'.$username."<br/>";
  echo'<strong><font color="black">Your Password is </font></Strong>'.$row['password'];
echo' <meta content="10;Menu.php" http-equiv="refresh" />';
}

}
else {
    echo'<strong><font color="black">There is no password</font> </Strong>';
}
}
?>
</form>
   </div>
   </body>
   </html>