<?php 
 $con=mysqli_connect('localhost', 'root', '', 'multi_user');
$FullName=($_POST['FullName']);
$Age=($_POST['Age']);
$PhoneNO=($_POST['PhoneNO']);
$Address=($_POST['Address']);
$HomeTown=($_POST['HomeTown']);
$YearofGrat=($_POST['YearofGrat']);
$Experience=($_POST['Experience']);
$q=mysqli_query($con,"insert into apply(FullName, Age, PhoneNO, Address, HomeTown, YearofGrat, Experience) values('$FullName', '$Age', '$PhoneNO', '$Address', '$HomeTown', '$YearofGrat', '$Experience')");
if($q){echo"Registration Successfully!!";}
else{echo"Registration failed try again!";}
?>