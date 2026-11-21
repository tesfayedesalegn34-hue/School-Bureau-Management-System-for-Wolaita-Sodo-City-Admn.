<?php
include("connect1.php");
$username=$_POST['username'];
$password=$_POST['password'];

$mysql_qry="SELECT * FROM login WHERE 	username= '{$username}' AND password= '{$password}';";
$result= mysql_query($mysql_qry);
if (mysqli_num_rows($result)>0){
	
echo"Login Successfully";

}
else{
	echo "Login Faild Please Enter Correct User Name and Password";
}
	?>