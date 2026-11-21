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
<?php
$sql="SELECT * FROM apply";
$result = mysqli_query($con, $sql);
    if(!$result){
    die("no new information".mysql_error());
    }
	        echo"<br><br><br>";							 
			echo"<h3 align='center'>Applicant Registration</h3>";
			echo"<table align='center' width='750px' height='50px'  border='2'>";
			echo"<tr><th><b>Full Name</b></th><th><b>Age</b></th><th><b>Phone Number</b></th><th><b>Address</b></th><th><b>Home Town</b></th><th><b>Year of Graduation</b></th><th><b>Experience</b></th><th><b>Sex</b></th><th><b>Upload File</b></th><th><b>Delete</b></th></tr>";
			while($row1 = mysqli_fetch_array($result)){	
			$PhoneNO=$row1['PhoneNO'];
			$files=$row1['UploadFile'];
			echo"<tr>";
			echo"<tr><td>".$row1['FullName']."</td>";
			echo"<td>".$row1['Age']."</td>";
			echo"<td>".$row1['PhoneNO']."</td>";
			echo"<td>".$row1['Address']."</td>";
			echo"<td>".$row1['HomeTown']."</td>";
			echo"<td>".$row1['YearofGrat']."</td>";
			echo"<td>".$row1['Experience']."</td>";
			echo"<td>".$row1['Sex']."</td>";
            echo "<td>" ."<a href='images/$files'>Download</a>"."</td>";	
            echo "<td>" . '<a class="button_red" href= "Deleteregistration.php?PhoneNO='.$PhoneNO.'"><img src = "images/dete.jpg" width="40" 
			height="40"></img></a>' . "</td>";			
			echo"</tr>";	
			}			
			echo"</table>";
		 ?>	
   </body>
   </html>