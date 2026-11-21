<?php
session_start();
 $con=mysqli_connect('localhost', 'root', '', 'multi_user');
 $sql="Delete from apply where PhoneNO='$_GET[PhoneNO]'";

if (!mysqli_query($con,$sql))
{
die('Error: ' . mysqli_error($con));
}
else{
echo "Deleted successfully";
header("Refresh:2; url=Deleteregistration.php");
}
?>