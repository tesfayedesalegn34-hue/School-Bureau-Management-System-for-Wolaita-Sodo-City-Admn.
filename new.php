<?php
$con=mysqli_connect('localhost', 'root', '', 'multi_user');
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
	?>