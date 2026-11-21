<?php
$con=mysqli_connect('localhost', 'root', '', 'multi_user');


$sql="SELECT*FROM postvacancy";

$result = mysqli_query($con, $sql);

if($result){
	
	while($row = mysqli_fetch_array($result)){
		
		$flag[]=$row;	
	}
	
	print(json_encode($flag));
}

?>