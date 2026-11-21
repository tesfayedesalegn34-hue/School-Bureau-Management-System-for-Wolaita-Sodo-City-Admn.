<?php
session_start();
 $con=mysqli_connect('localhost', 'root', '', 'multi_user');
?>
<?php
  if(!isset($_SESSION['username'])){
  header("Location:Menu.php");
  }
  elseif($_SESSION['type']!=='School'){
  header("Location:Menu.php");
  }
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
                               <?php
							$sql="SELECT * FROM school";
	                        $result = mysqli_query($con, $sql);
							$row1 = mysqli_fetch_array($result);
							if(!$result){
                            die("no new information".mysql_error());
                             }
							echo"<br><br><br>";							 
							 echo"<h3 align='center'>School Detail</h3>";
							 echo"<table align='center' width='500px' height='100px' border='2'>";
			echo"<tr><th><b>School Name</b></th><th><b>Telephone</b></th><th><b>School Location</b></th><th><b>Number of Teacher</b>
			</th><th><b>Number of Student</b></th></tr>";
							 while($row1 = mysqli_fetch_array($result)){						 
			  echo"<tr><form action=update.php method=post>";
			  echo"<td><input type=text name=sname value='".$row1['SchoolName']."'></td>";
			  echo"<td><input type=tel name=sname value='".$row1['Telephone']."'></td>";
			  echo"<td><input type=text name=sname value='".$row1['SchoolLocation']."'></td>";
			  echo"<td><input type=number name=sname value='".$row1['NumberofTeacher']."'></td>";
			  echo"<td><input type=number name=sname value='".$row1['NumberofStudent']."'></td>";
			  echo"<td><input type=hidden name=id value='".$row1['id']."'></td>";
			  echo"<td><input type=submit>";
			  echo"</tr>";	
			}			
			echo"</table>";
		 ?>
   </body>
   </html>