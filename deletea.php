<?php
session_start();
 $con=mysqli_connect('localhost', 'root', '', 'multi_user');
 $sql="Delete from user where username='$_GET[username]'";

if (!mysqli_query($con,$sql))
{
die('Error: ' . mysqli_error($con));
}
else{
echo "Account Deleted";
header("Refresh:2; url=DisplayAccount.php");
}
?>


			