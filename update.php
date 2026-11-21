<?php
session_start();
 $con=mysqli_connect('localhost', 'root', '', 'multi_user');
 $sql="Update school SET SchoolName='$_POST[sname]', Telephone='$_POST[tnum]', SchoolLocation='$_POST[slocation]', NumberofTeacher='$_POST[nteacher]', NumberofStudent='$_POST[nstudent]' Where id='$_POST[id]'";

if (!mysqli_query($con,$sql))
{
die('Error: ' . mysqli_error($con));
}
else{
echo "Record Updated Succesfully";
header("Refresh:5; url=updateschooldetail.php");
}
?>