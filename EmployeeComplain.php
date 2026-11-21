   <?php
 $con=mysqli_connect('localhost', 'root', '', 'multi_user');
$FullName=($_POST['FullName']);
$Email=($_POST['Email']);
$PhoneNumber=($_POST['PhoneNumber']);
$WorkPlace=($_POST['WorkPlace']);
$Postion=($_POST['Postion']);
$Subject=($_POST['Subject']);
$Complain=($_POST['Complain']);
$q=mysqli_query($con, "insert into empcomplain(FullName, Email, PhoneNumber, WorkPlace, Postion, Subject, Complain) 
values('$FullName','$PhoneNumber', '$Email', '$WorkPlace', '$Postion', '$Subject', '$Complain')");
if($q){echo"Your Complain is Successfully Registered";}
else{echo"Registration failed try again!";}
?>