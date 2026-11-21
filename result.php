<?php
session_start();
?>
<html>
<head>
<title>Result</title>
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
input[type="tel"]{
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
<div class="box">
   <form method="POST" action="result.php" name="myForm" onsubmit="return validateForm()">
   <h1>Result</h1>
   <input type="tel" name="result"  pattern="^\d{10}$" required="Please Enter 10 digits" placeholder="Enter Your Mobile Number">
   <input type="submit" name="search" value="Go">
   </form>
   </div>
   <?php
$con=mysqli_connect('localhost', 'root', '', 'multi_user');
if(isset($_POST['search'])){
$MobileNumber=($_POST['result']);

$sql = "select * from postresult where MobileNumber='$MobileNumber'";
$result = mysqli_query($con, $sql);
	$result = mysqli_query($con, $sql);
    if(!$result){
    die("no new information".mysql_error());
    }
    // output data of each row
     $row1=mysqli_fetch_array($result);
	        echo "<br><br><br><br><br><br><br><br><br><br><br>";
			echo"<table align='center' width='500px' height='370px'>";
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
	?>
   </body>
   </html>