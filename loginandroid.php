<?php 
$con=mysqli_connect('localhost', 'root', '', 'multi_user');
$username=($_POST['username']);
$Password=($_POST['Password']);
$sql="select * from user where username='$username' AND Password='$Password'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
	
echo"Login Successfully";

}
else{
	echo "Login Faild Please Enter Correct User Name and Password";
}

	?>