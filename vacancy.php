<?php
session_start();
  $con=mysqli_connect('localhost', 'root', '', 'multi_user');
?> 
<html>
<head>
<title>Vacancy</title>
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
#mn{
	width:100%;
	margin-left:auto;
	margin-right:auto;
}
</style>
</head>
<body>
<div id="mn">
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
      <?php
  $sql="SELECT * FROM postvacancy ORDER BY PostDate DESC;";
	$result = mysqli_query($con, $sql);
    if(!$result){
    die("no new information".mysql_error());
    }
    // output data of each row
     while($row1 = mysqli_fetch_array($result))
{
			echo"<table id='eee' align='center' width='500px' height='370px'>";
			echo"<tr><td></td><td align='right'>";
			echo "<u><font face='times new roman' size='3'><b>Post Date:-&nbsp;&nbsp;</b>".$row1['PostDate']."</u></font>"."</td></tr>";
			echo"<tr>";
			echo"<td><b>Type Of Postion:</b></td>";
			echo'<td>';
			echo $row1['Position']."</td></tr>";
			echo"<td><b>Department:</b></td>";
			echo'<td>';
			echo $row1['Department']."</td></tr>";			
			echo"<td><b>Educational Level:</b></td>";
			echo'<td>';
			echo $row1['EdnLevel']."</td></tr>";
			echo"<td><b>CGPA:</b></td>";									
			echo'<td>';
			echo $row1['CGPA']."</td></tr>";		
			echo"<td><b>Experience:</b></td>";									
			echo'<td>';
			echo $row1['Experience']."</td></tr>";						
			echo"<td><b>Salary:</b></td>";
			echo'<td>';
			echo $row1['Salary']."</td></tr>";								
			echo"<td><b>Quantity:</b></td>";									
			echo'<td>';
			echo $row1['Quantity']."</td></tr>";
			echo"<td><b>Term Of Employee:</b></td>";
			echo'<td>';
			echo $row1['TermofReq']."</td></tr>";			
			echo"<td><b>Sex:</b></td>";
			echo'<td>';
			echo $row1['Sex']."</td></tr>";						
			echo"<td><b>Age:</b></td>";
			echo'<td>';
			echo $row1['Age']."</td></tr>";
			echo"<td><b>Start Date:</b></td>";
			echo'<td>';
			echo $row1['RegStartDate']."</td></tr>";
			echo"<br><br><br>";
			echo"<td><b>End Date:</b></td>";
			echo'<td>';
			echo $row1['RegEndDate']."</td></tr>";
			echo"</table>";
}
?> 
</dv>
   </body>
   </html>