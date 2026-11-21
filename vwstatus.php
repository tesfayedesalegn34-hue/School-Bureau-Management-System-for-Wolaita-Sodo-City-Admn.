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
input[type="text"]{
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
	    <li><a href="status.php">Status</a></li>
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
   <div class="box">
   <form method="POST" action="assignedemp.php">
   <h1>View School Status</h1>
   <input type="text" name="result" value="" pattern="[a-zA-Z\s]{3,100}" placeholder="Enter Your School Name" title="Please Enter Valid School Name Above 3 Character">
   <input type="submit" name="search" value="Go">
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
    <?php
 if(isset($_POST['search'])){
$Placement=($_POST['result']);
 $sql = "select * from postresult where Placement='$Placement'";
$result = mysqli_query($con, $sql);
	$result = mysqli_query($con, $sql);
    if(!$result){
    die("no new information".mysql_error());
    }
    // output data of each row
     while($row1 = mysqli_fetch_array($result))
{
	        echo "<br><br>";
			echo"<table align='center' width='200px' height='250px'>";
			echo"<tr>";
			echo"<td><b>FirstName:</b></td>";
			echo'<td>';
			echo $row1['FirstName']."</td></tr>";
			echo"<td><b>MiddleName:</b></td>";
			echo'<td>';
			echo $row1['MiddleName']."</td></tr>";			
			echo"<td><b>LastName:</b></td>";
			echo'<td>';
			echo $row1['LastName']."</td></tr>";
			echo"<td><b>MobileNumber:</b></td>";									
			echo'<td>';
			echo $row1['MobileNumber']."</td></tr>";		
			echo"<td><b>AveragePoint:</b></td>";									
			echo'<td>';
			echo $row1['AveragePoint']."</td></tr>";						
			echo"<td><b>Status:</b></td>";
			echo'<td>';
			echo $row1['Status']."</td></tr>";								
			echo"<td><b>Placement:</b></td>";									
			echo'<td>';
			echo $row1['Placement']."</td></tr>";
			echo"</table>";
}
 }
	?>
   </html>