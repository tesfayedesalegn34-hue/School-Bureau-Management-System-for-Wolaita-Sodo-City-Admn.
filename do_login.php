<?php 
session_start();
$con=mysqli_connect('localhost', 'root', '', 'multi_user');
if(isset($_POST['login'])){
$username=($_POST['username']);
$password=($_POST['password']);
$q=mysqli_query($con,"select * from user where username='$username' AND password='$password'");
$row=mysqli_fetch_array($q);
$type=$row['role'];
$isexist=mysqli_query($con,"select * from user where username='$username' AND password='$password'");
$check_user=mysqli_num_rows($isexist);
if($check_user==1){
	$_SESSION["type"]=$row['role'];
	$_SESSION["username"]=$row['username'];
if($type=="Admin"){
	header("Location:Admin.php");
}
elseif($type=="Manager"){
	header("Location:Manager.php");
}
elseif($type=="School"){
	header("Location:School.php");
}

elseif($type=="Employee"){
	 header("Location:Employee.php");
}
}
else{
	echo '<strong><font color="black">invalid username or password!</font> </Strong>';
	echo' <meta content="5;Menu.php" http-equiv="refresh" />';
}
}
?>