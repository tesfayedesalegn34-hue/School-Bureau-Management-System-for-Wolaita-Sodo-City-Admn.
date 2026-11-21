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
<title>Change password</title>
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
	margin-left:250px;
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
<form  method="POST" action="Admincp.php" id="register">
<h1>Change Password</h1>
<label> Old Password:</label><br>
<input type="Password" name="old_pass" id="name" placeholder="Enter Old Password" value=""pattern="[a-zA-Z0-9\s]{1,100}" required xmoz-errormessage="Please Enter valid password"><br><br>
<label> New Password:</label><br>
<input type="Password" name="new_pass" id="name" placeholder="Enter New Password" value=""pattern="[a-zA-Z0-9\s]{1,100}" required xmoz-errormessage="Please Enter valid password"><br><br>
<label> Confirm Password:</label><br>
<input type="Password" name="conf_pass" id="name" placeholder="Re-enter New Password" value=""pattern="[a-zA-Z0-9\s]{1,100}" required xmoz-errormessage="Please Enter valid password"><br><br>
<input type="submit" name="update" value="Update" id="sub"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="reset" value="Reset" id="sub"/><br><br>

<?php
if(isset($_POST['update'])){
$OldPassword=$_POST['old_pass'];
$NewPassword=$_POST['new_pass'];
$ConfPassword=$_POST['conf_pass'];
$sql="select * from user where password='$OldPassword' ";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    if($NewPassword!=$ConfPassword){
	       echo'  <p align="center"><font color="red" size="2"><img src="tick.png">&nbsp;&nbsp;New Password and Confirm Password does not Match! </font></p>';                                
		   echo' <meta content="10;Admincp.php" http-equiv="refresh" />';
		   }
  elseif ($NewPassword==$ConfPassword){
   $NewPassword=md5($NewPassword);
  $sql="update user set password='$NewPassword' where password='$OldPassword'";
        $result = mysqli_query($con, $sql);
		 echo'  <p align="center"><font color="black" size="2"><img width="30px" height="30px" src="tick.png">&nbsp;&nbsp;Your password has been changed successfuly!</font></p>';
         echo' <meta content="Admincp.php" http-equiv="refresh" />';  
  }
   }
else
{
 echo'  <p align="center"><font color="red" size="2"><img src="tick.png">&nbsp;&nbsp;Wrong Old password!</font></p>';
 echo' <meta content="10"Admincp.php" http-equiv="refresh" />';
}
}
?>
</form>
   </div>
   </body>
   </html>